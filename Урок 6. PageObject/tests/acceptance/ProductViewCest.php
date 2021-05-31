<?php

use Page\Acceptance\searchPage_POM;
use Page\Acceptance\checkProductRow_POM;

class ProductViewCest
{
    public function productSearch(AcceptanceTester $I)
    {
        $I->amOnPage(searchPage_POM::$URL); 
        $I->fillField(searchPage_POM::$enterProductName, searchPage_POM::PRODUCT_NAME); //заполняем поле поиска
        $I->click(searchPage_POM::$searchButton); //нажимаем кнопку поиска
        $I->seeElement(checkProductRow_POM::$gridView); //проверяем что у нас список в grid формате
        $I->waitForElement(checkProductRow_POM::$checkIfProductsInGridRow); //проверяем что у нас продукты в grid формате
        $I->click(checkProductRow_POM::$switchToList); //переходим на формат list
        $I->waitForElement(checkProductRow_POM::$checkIfProductsInListRow); //проверяем что продукты в list формате
    }
}
