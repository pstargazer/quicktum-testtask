<?php

namespace Classes;

use Classes\ValidationStrategy;

class BracketsValidator implements ValidationStrategy 
{
    public $bracket_start, $bracket_end;

    /**
     * Конструктор
     *
     * @param string $input
     * @param string $bracket_start
     * @param string $bracket_end
     */
    public function __construct(string $input, $bracket_start, $bracket_end) {
        $this->bracket_start = $bracket_start;
        $this->bracket_end = $bracket_end;
        
        $validation_result = $this->isValid($input);
        $this->getValidationMessage($validation_result);
    }

    /**
     * Валидация строки
     *
     * @param string $input
     * @return boolean
     */
    public function isValid(string $input): bool
    {
        $bracket_start_count = mb_substr_count($input, $this->bracket_start);
        $bracket_end_count = mb_substr_count($input, $this->bracket_end);

        if($bracket_start_count === $bracket_end_count) return true;

        return false;
    }

    /**
     * Вернуть отклик пользователю
     *
     * @param boolean $isValidated
     * @return string
     */
    public function getValidationMessage(bool $isValidated): void
    {
        $message = $isValidated ? "Успешно!\n" : "Ошибка! Проверьте свой код.\n";
        echo $message;
    }
}