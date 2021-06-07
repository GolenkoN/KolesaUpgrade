<?php
namespace Page\Acceptance;

/**
 * Класс PageObject для создания переменных с локаторами
 */
class wishList_POM
{
    public const USERNAME = 'makeyo@mail.ru';//заданное зачение для логина, которое присвоено переменной
    public const PASSWORD = '28091995';//заданное значение пароля, которое присвоено переменной
    public static $url = '';
    public static $loginButton = 'a[class="login"]';
    public static $enterLogin = 'input[id="email"]';
    public static $enterPassword = 'input[id="passwd"]';
    public static $submitLogin = 'button[id="SubmitLogin"]';
    public static $homePage = 'a[class="home"]';
    public static $wishListButton = '#wishlist_button';
    public static $closeWishListNotifBtn = '#product > div.fancybox-overlay.fancybox-overlay-fixed > div > div > a';
    public static $closeProductWindowBtn = 'a[title="Close"]';
    public static $myAccount = '#header > div.nav > div > div > nav > div:nth-child(1) > a';
    public static $wishListSection = 'a[href="http://automationpractice.com/index.php?fc=module&module=blockwishlist&controller=mywishlist"]';
    public static $addProduct = '#homefeatured > li:nth-child(%s) > div > div.left-block > div > a.product_img_link > img';
    public static $quickView = '//*[@id="homefeatured"]/li[%s]/div/div[1]/div/a[2]';
    public static $numberOfProducts = 'td[class="bold align_center"]';
    public static $logoutButton = 'a[class="logout"]';
    public static $removeWishList = 'i[class="icon-remove"]';
}
