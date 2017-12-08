<?php
declare(strict_types=1);

namespace Core\Email\MailDelivery;

use Core\Model\Read;

/**
 * Модель для коннекта
 */
class SmtpConnectionInfo
{
    /** @var string */
    private $host;

    /** @var int */
    private $port;

    /** @var array */
    private $user;

    /**
     * Constructor.
     *
     * @param array $connectInfo
     * @param array $sender
     */
    public function __construct($connectInfo, $sender)
    {
        $this->host = $connectInfo['host'];
        $this->port = $connectInfo['port'];

        $this->user = $sender;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @return array
     */
    public function getUser(): array
    {
        return $this->user;
    }
}
