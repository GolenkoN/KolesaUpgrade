<?php
use Page\Acceptance\wishList_POM;

class wishListCest
{
    public const EXPECTED_NUMBER = 2;

    /**
     * Функция _before для выполнения действий по входу в учетную запись
     */
    public function _before(\AcceptanceTester $I){
        $I->amOnPage(wishList_POM::$url); 
        $I->click(wishList_POM::$loginButton);
        $I->fillField(wishList_POM::$enterLogin, wishList_POM::USERNAME);
        $I->fillField(wishList_POM::$enterPassword, wishList_POM::PASSWORD);
        $I->click(wishList_POM::$submitLogin);
        $I->click(wishList_POM::$homePage);
    }
    
    /**
     * Функция для создания списка избранных товаров, и проверки количества
     */
    public function createWishList(\Step\Acceptance\wishListStep $I)
    {
        $I->addProductToWishList();
        $I->waitForElementVisible(wishList_POM::$myAccount);
        $I->click(wishList_POM::$myAccount);
        $I->waitForElementVisible(wishList_POM::$wishListSection);
        $I->click(wishList_POM::$wishListSection);
        $sum = 0;
        $numberOfProducts = $I->grabTextFrom(wishList_POM::$numberOfProducts);
        $sum += $numberOfProducts;
        $I->assertEquals(self::EXPECTED_NUMBER, $sum, 'in progress');
        $I->see('2', wishList_POM::$numberOfProducts);
    }

    /**
     * Функция _after для выполнения действий по удалнию списка избранных товаров и выхода из учетной записи
     */
    public function _after(\AcceptanceTester $I){
        $I->click(wishList_POM::$removeWishList);
        $I->acceptPopup();
        $I->waitForElementVisible(wishList_POM::$logoutButton);
        $I->click(wishList_POM::$logoutButton);
        $I->wait(5);
    }
}
