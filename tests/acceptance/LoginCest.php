<?php

use Page\Acceptance\Login_POM;
class LoginCest
{
    public function loginPage(AcceptanceTester $I)
    {
        $login_POM = new Login_POM($I);
        $I->amOnPage(Login_POM::$URL); 
        $I->fillField(Login_POM::$loginInput, Login_POM::USERNAME); // вводим логин
        $I->fillField(Login_POM::$passwordInput, Login_POM::PASSWORD);//вводим пароль
        $I->click(Login_POM::$loginButton); //кнопка авторизации
        $I->waitForElementVisible(Login_POM::$errorMessage);//проверяем сообщение об ошибке
        $login_POM->clickOnErrorMessage();//закрываем сообщение об ошибке
        $I->seeElement(Login_POM::$isErrorMessageClosed);//проверяем что сообщение об ошибке закрыто
    }
}
