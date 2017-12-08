<?php
declare(strict_types=1);

namespace Core\Email;

/**
 * Отправка письма пользователю
 * @see https://github.com/swiftmailer/swiftmailer
 * @see http://swiftmailer.org/
 */
class MailDelivery
{
    /** @var ServerInfo*/
    private $serverInfo;

    /** @var SmtpConnectionInfo Настройки запроа */
    private $smtp;

    /**
     * Constructor.
     *
     * @param SmtpConnectionInfo $smtp
     * @param ServerInfo $serverInfo
     */
    public function __construct(SmtpConnectionInfo $smtp, ServerInfo $serverInfo)
    {
        $this->smtp = $smtp;
        $this->serverInfo = $serverInfo;
    }

    /**
     * @param string $name
     *
     * @return SenderUser
     */
    public function makeMailUser(string $name): SenderUser
    {
        return new SenderUser($this->smtp->getUser()[$name]);
    }

    /**
     * Передаёт сформированные данные SMTP серверу
     *
     * @param SenderUser $from Модель пользователя
     * @param MailTemplateInterface $email Модель шаблона
     */
    public function send(SenderUser $from, MailTemplateInterface $email): void
    {
        $tplDir = $this->serverInfo->getSiteRoot() . $this->serverInfo->getTplDir() . '/';
        $htmlCode = @file_get_contents($tplDir . $email->getTplName() . '.html');
        $variables = $email->getVariables();
        $variables['host'] = $this->serverInfo->getHostName();

        foreach ($variables as $key => $val) {
            $htmlCode = str_replace('{{' . $key . '}}', $val, $htmlCode);
        }

        $transport = new \Swift_SmtpTransport($this->smtp->getHost(), $this->smtp->getPort());
        $mailer = new \Swift_Mailer($transport);
        $message = new \Swift_Message($email->getSubject());

        $message->setFrom([$from->getEmail() => $from->getName()])
            ->setTo($email->getUserEmail())
            ->setBody($htmlCode, 'text/html');

        //$msgId = $message->generateId();
        //$message->setId($msgId);
        $mailer->send($message, $failures);
    }
}
