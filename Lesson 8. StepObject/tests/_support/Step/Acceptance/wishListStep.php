<?php
namespace Step\Acceptance;
use Page\Acceptance\wishList_POM;

/**
 * Класс с функцией по добавлению товаров в список избранных
 */
class wishListStep extends \AcceptanceTester
{
    public const EXPECTED_NUMBER = 2;
    
    public function addProductToWishList(){
        $I = $this;
        
        for($i = 1; $i <= self::EXPECTED_NUMBER; $i++){
            $I->moveMouseOver(sprintf(wishList_POM::$addProduct, $i));
            $I->waitForElementVisible(sprintf(wishList_POM::$quickView, $i)); 
            $I->click(sprintf(wishList_POM::$quickView, $i)); 
            $I->switchToIFrame('iframe.fancybox-iframe'); 
            $I->wait(5); //пришлось вместо waitForElementVisible добавить просто wait, так как сайт глючит и через раз принимает мой локатор
            $I->click(wishList_POM::$wishListButton);
            $I->waitForElementVisible(wishList_POM::$closeWishListNotifBtn);
            $I->click(wishList_POM::$closeWishListNotifBtn);
            $I->switchToIFrame();
            $I->click(wishList_POM::$closeProductWindowBtn);
            }
        }
}