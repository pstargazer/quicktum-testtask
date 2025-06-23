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
        $bracket_start_count = 0;
        $bracket_end_count = 0;
        // счетчик для парности и порядка строк (вложенность)
        $unclosed = 0;

        for ($i = 0; $i < strlen($input); $i++) {
            switch($input[$i]) {
                case $this->bracket_start:
                    $bracket_start_count += 1;
                    $unclosed += 1;
                    break;
                    
                case $this->bracket_end:
                    // если } перед {
                    if ($unclosed == 0) return false;
                    $bracket_end_count += 1;
                    $unclosed -= 1;
                    break;

                default:
                    break;
            }
        }
        // echo $unclosed;
        if ($bracket_start_count === $bracket_end_count && $unclosed == 0) return true;

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