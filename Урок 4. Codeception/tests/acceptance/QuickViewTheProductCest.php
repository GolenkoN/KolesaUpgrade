<?php

class QuickViewTheProductCest
{
    public function quickViewTheProduct(AcceptanceTester $I)
    {
        $I->amOnPage(''); //переходим на страницу
        $I->moveMouseOver( '#homefeatured > li:nth-child(2) > div > div.left-block > div > a.product_img_link > img' ); //сдвигаем курсор мыши на окно с продуктом для того чтобы появилась надпись quick view
        $I->waitForElementVisible('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view'); //пока надпись не появится
        $I->click('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view'); //нажимаем на quick view
        $I->switchToIFrame('iframe.fancybox-iframe'); // переключаемся на iframe
        $I->waitForElementVisible('body[class="product product-2 product-blouse category-7 category-blouses hide-left-column hide-right-column content_only lang_en"]'); // в окне quick view в первую очкеред прояверяем что объект это блузка 
        $I->waitForText('Blouse', 'h1[itemprop="name"]'); //а уже потом проверяем по самому тексту продукта
    }
}
