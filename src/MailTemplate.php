<?php
declare(strict_types=1);

namespace Core\Email\MailDelivery;

abstract class MailTemplate
{
    /** @var array Данные для шаблона */
    private $variables = [];

    /**
     * Устанавливает данные для шаблона
     *
     * @param array $variables Данные для шаблона
     */
    public function setVariables(array $variables): void
    {
        $this->variables = $variables;
    }

    /**
     * Возвращает данные для шаблона
     *
     * @return array Данные для шаблона
     */
    public function getVariables(): array
    {
        return $this->variables;
    }
}
