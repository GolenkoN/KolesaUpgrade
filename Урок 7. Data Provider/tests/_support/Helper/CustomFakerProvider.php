<?php
namespace Helper;
use Faker\Provider\Base;

/**
 * Класс для создания кастомного фейкера
 */
class CustomFakerProvider extends Base
{
 
 
 /**
 * Функция для генерации случайных данных с использованием кастомного фейкера для номера карты
 */
    protected $bankCardNumber = [
        '42768440',
        '32002316',
        '23008745',
        '64821299'
    ];
    public function getBankCardNumber()
    {
        return sprintf(
            '%d%d%d%d',
            $this->bankCardNumber[array_rand($this->bankCardNumber)],
            random_int(100, 999),
            random_int(100, 999),
            random_int(100, 999),
            random_int(100, 999)
        );
    }

 
 /**
 * Функция для генерации случайных данных с использованием кастомного фейкера для CCV
 */
    protected $bankSecurityCode = [
        '1',
        '3',
        '2',
        '6'
    ];
    public function getSecurityCode()
    {
        return sprintf(
            '%d%d%',
            $this->bankSecurityCode[array_rand($this->bankSecurityCode)],
            random_int(100, 999),
            random_int(100, 999),
            random_int(100, 999),
            random_int(100, 999)
        );
    }
}