<?php
namespace Tests\Acceptance;
use Page\Acceptance\RegistrationForm_POM;
use Faker\Factory;
use Helper\CustomFakerProvider;

/**
 * Класс для заполнения формы
 */
class RegistrationFormCest
{
    /**
     * Функция для заполнения формы
     */
    public function fillRegistrationForm(\AcceptanceTester $I)
    {
        /**
         * объявление переменной из библиотеки фейкера, и также объявление кастомного фейкера
         */
        $faker = Factory::create();
        $faker->addProvider(new CustomFakerProvider($faker));
        
        /**
         * присваивание переменным для фейковых данных значений из библиотеки
         */
        $firstName = $faker->firstName;
        $lastName = $faker->lastName;
        $email = $faker->email;
        $phoneNumber = $faker->phoneNumber;
        $streetAddress = $faker->streetAddress;
        $city = $faker->city;
        $state = $faker->state;
        $postalCode = $faker->postcode;
        $firstNameCard = $faker->firstName;
        $lastNameCard = $faker->lastName;
        $creditCardNumber = $faker->getBankCardNumber();
        $securityCode = $faker->getSecurityCode();
        $countryCard = $faker->country;
        
        /**
         * Выполнение действий по заполнению формы
         */
        $I->amOnPage(RegistrationForm_POM::$URL);
        $I->fillField(RegistrationForm_POM::$firstName, $firstName);
        $I->fillField(RegistrationForm_POM::$lastName, $lastName);
        $I->fillField(RegistrationForm_POM::$email, $email);
        $I->fillField(RegistrationForm_POM::$phoneNumber, $phoneNumber);
        $I->fillField(RegistrationForm_POM::$streetAddress, $streetAddress);
        $I->fillField(RegistrationForm_POM::$city, $city);
        $I->fillField(RegistrationForm_POM::$state, $state);
        $I->fillField(RegistrationForm_POM::$postalCode, $postalCode);
        $I->click(RegistrationForm_POM::$paymentMethod);
        $I->fillField(RegistrationForm_POM::$firstNameCard, $firstNameCard);
        $I->fillField(RegistrationForm_POM::$lastNameCard, $lastNameCard);
        $I->fillField(RegistrationForm_POM::$creditCardNumber, $creditCardNumber);
        $I->fillField(RegistrationForm_POM::$securityCode, $securityCode);
        $I->waitForElementVisible(RegistrationForm_POM::$expirationMonth);
        $I->click(RegistrationForm_POM::$selectedExpirationMonth);
        $I->waitForElementVisible(RegistrationForm_POM::$expirationYear);
        $I->click(RegistrationForm_POM::$selectedExpirationYear);
        $I->fillField(RegistrationForm_POM::$streetAddressCard, $streetAddress);
        $I->fillField(RegistrationForm_POM::$cityCard, $city);
        $I->fillField(RegistrationForm_POM::$stateCard, $state);
        $I->fillField(RegistrationForm_POM::$postalCodeCard, $postalCode);
        $I->waitForElementVisible(RegistrationForm_POM::$country);
        $I->click(RegistrationForm_POM::$selectedCountry);
        $I->click(RegistrationForm_POM::$clickRegister);
        $I->waitForText('Good job');
    }
}