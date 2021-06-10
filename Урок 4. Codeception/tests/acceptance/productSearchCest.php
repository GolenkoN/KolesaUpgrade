<?php

class productSearchCest
{
    public function quickViewTheProduct(AcceptanceTester $I)
    {
        $I->amOnPage(''); //переходим на страницу
        $I->moveMouseOver( '#homefeatured > li:nth-child(2) > div > div.left-block > div > a.product_img_link > img' ); //сдвигаем курсор мыши на окно с продуктом для того чтобы появилась надпись quick view
        $I->waitForElementVisible('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view'); //пока надпись не появится
        $I->click('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view'); //нажимаем на quick view
        $I->switchToIFrame('iframe.fancybox-iframe'); // переключаемся на iframe
        $I->waitForElementVisible('#product'); // после нажатия quick view дожидаемся появления окна с продуктом
        $I->waitForText('Blouse', 10, 'h1[itemprop="name"]'); //а уже потом проверяем по тексту что продукт необходимый нам
    }
}
