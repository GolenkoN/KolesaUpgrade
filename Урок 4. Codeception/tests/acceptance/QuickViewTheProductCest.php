<?php

class QuickViewTheProductCest
{
    
    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('');
        $I->fillField('#search_query_top', 'blouse');
        $I->click('#searchbox > button');
        $I->moveMouseOver( '#center_column > ul > li > div > div.left-block > div > a.product_img_link > img' );
        $I->wait(5);
        $I->click('a[class="quick-view"]');
        $I->see('Blouse');
    }
        


}
