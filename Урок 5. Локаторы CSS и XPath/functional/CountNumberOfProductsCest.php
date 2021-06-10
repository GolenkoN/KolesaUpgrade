<?php

class CountNumberOfProductsCest
{
    $searchForTheProductCss = '#search_query_top';
    $searchForTheProductXpath = '//*[@id="search_query_top"]';
    $clickSearchButtonCss = '#searchbox';
    $clickSearchButtonXpath = '//*[@id="searchbox"]/button';
    $assertTheNumberOfElementsCss = 'div[class="product-container"]';
    $assertTheNumberOfElementsXpath = '//div[@class="product-container"]';
    
    public function checkTheNumberOfTheProducts(FunctionalTester $I)
    {
        $I->amOnPage('');
        $I->fillField('#search_query_top', 'Printed dress');
        $I->click('#searchbox > button');
        $I->seeNumberOfElements('div[class="product-container"]', 5);
    }
}
