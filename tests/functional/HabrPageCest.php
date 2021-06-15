<?php

class HabrPageCest
{
    public function visitHabrPage(FunctionalTester $I)
    {
        $I->amOnPage('');
        $I->click('a[href="https://habr.com/ru/flows/develop"]');
    }
}
