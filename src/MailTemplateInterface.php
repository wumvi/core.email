<?php
declare(strict_types = 1);

namespace Core\Email;

/**
 * Интерфейс модели письма
 */
interface MailTemplateInterface
{
    /**
     * Получаем шаблон письма
     * @return string Шаблон
     */
    public function getTplName(): string;

    /**
     * Получаем заголовк письма
     *
     * @return string Заголовок
     */
    public function getSubject(): string;

    /**
     * Получаем email кому посылаем письмо
     *
     * @return string Email
     */
    public function getUserEmail(): string;

    /**
     *
     *
     * @param array $list
     */
    public function setVariables(array $list): void;

    /**
     *
     *
     * @return array
     */
    public function getVariables(): array;
}
