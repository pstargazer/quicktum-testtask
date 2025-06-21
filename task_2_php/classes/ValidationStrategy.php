<?php

namespace Classes;

interface ValidationStrategy {
    /**
     * Валидация строки
     *
     * @param string $input
     * @return boolean
     */
    public function isValid(string $input): bool;

    /**
     * Вернуть какой то отклик пользователю
     *
     * @param boolean $isValidated
     * @return string
     */
    public function getValidationMessage(bool $isValidated): void;
}
