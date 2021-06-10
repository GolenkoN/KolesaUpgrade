<?php

class QuickViewTheProductCest
{
    $seacrhBoxCss = 'input[id="search_query_top"]';
    $searchBoxXpath = '//*[@id="search_query_top"]';
    $clickSearchButtonCss = 'button[name="submit_search"]';
    $clickSearchButtonXpath = '//button[@name="submit_search"]';
    $clickOnQuickViewSectionCss = 'a[class="quick-view"]';
    $clickOnQuickViewSectionXpath = '//ul[@id="homefeatured"]//li[2]//a[@class="quick-view"]';
    $blouseProductCSS = 'body[id="product"]';
    $blouseProductXpath = '//*[@id="product"]';
    $blouseTextAssertCss = 'h1[itemprop="name"]';
    $blouseTextAssertXpath = '//body[@id="product"]//h1';


    public function quickViewTheProduct(AcceptanceTester $I)
    {
        $I->amOnPage(''); //переходим на страницу
        $I->fillField('#search_query_top', 'blouse'); //вводим текст для поиска продукта
        $I->click('#searchbox > button'); // подтверждаем поиск нажатием кнопки
        $I->moveMouseOver( '#center_column > ul > li > div > div.left-block > div > a.product_img_link > img' ); //сдвигаем курсор мыши на окно с продуктом для того чтобы появилась надпись quick view
        $I->waitForElementVisible('a[class="quick-view"]'); //пока надпись не появится
        $I->click('a[class="quick-view"]'); //нажимаем на quick view
        $I->switchToIFrame("fancybox-frame1622045875192"); // переключаемся на iframe
        $I->seeElement('body[id="product"]'); // в окне quick view в первую очкеред прояверяем что объект это блузка 
        $I->waitForText('Blouse', '#product > div > div > div.pb-center-column.col-xs-12.col-sm-4 > h1') //а уже потом проверяем по самому тексту продукта
    }
}
