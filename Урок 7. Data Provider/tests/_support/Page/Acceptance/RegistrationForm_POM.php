<?php
namespace Page\Acceptance;

/**
 * PageObject класс для хранения селекторов, присвоенных к переменным для их объявления в FillFormCest.php
 */
class RegistrationForm_POM
{
 public static $URL = '';
 public static $firstName = 'input[id=firstName]';
 public static $lastName = 'input[id=lastName]';
 public static $email = 'input[id="input_38"]';
 public static $phoneNumber = 'input[id="phoneNumber"]';
 public static $streetAddress = 'input[id="address"]';
 public static $city = 'input[id="city"]';
 public static $state = 'input[id="state"]';
 public static $postalCode = 'input[id="postal"]';
 public static $paymentMethod = 'input[id="input_32_paymentType_credit"]';
 public static $firstNameCard = 'input[id="input_32_cc_firstName"]';
 public static $lastNameCard = 'input[id="input_32_cc_lastName"]';
 public static $creditCardNumber = 'input[id="input_32_cc_number"]';
 public static $securityCode = 'input[id="input_32_cc_ccv"]';
 public static $expirationMonth = 'select[id="input_32_cc_exp_month"]';
 public static $selectedExpirationMonth = 'option[value="March"]';
 public static $expirationYear = 'select[id="input_32_cc_exp_year"]';
 public static $selectedExpirationYear = 'option[value="2022"]';
 public static $streetAddressCard = 'input[id="input_32_addr_line1"]';
 public static $cityCard = 'input[id="input_32_city"]';
 public static $stateCard = 'input[id="input_32_state"]';
 public static $postalCodeCard = 'input[id="input_32_postal"]';
 public static $country = 'select[id="input_32_country"]';
 public static $selectedCountry = 'option[value="Czech Republic"]';
 public static $clickRegister = 'button[id="input_36"]';
}
