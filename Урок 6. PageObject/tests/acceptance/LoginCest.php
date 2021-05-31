<?php

use Page\Acceptance\Login_POM;
class LoginCest
{
    public function loginPage(AcceptanceTester $I)
    {
        $login_POM = new Login_POM($I);
        $I->amOnPage(Login_POM::$URL); 
        $I->fillField(Login_POM::$loginInput, Login_POM::USERNAME);
        $I->fillField(Login_POM::$passwordInput, Login_POM::PASSWORD);
        $I->click(Login_POM::$loginButton); 
        $I->waitForElementVisible(Login_POM::$errorMessage);
        $login_POM->clickOnErrorMessage();
        $I->seeElement(Login_POM::$isErrorMessageClosed);
    }
}
