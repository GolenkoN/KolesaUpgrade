<?php
namespace Tests\Acceptance;
use Page\Acceptance\TheHabrPage_POM;
use Codeception\Example;

class TheHabrPageCest
{
    /**
     * @param Example $data
     * @dataProvider getListOfSections
     * Функция goToWebPage для работы со страницой Хабр
     */
     public function goToWebPage(\AcceptanceTester $I, Example $data)
    {
        $I->amOnPage('');
        $I->click(sprintf(TheHabrPage_POM::$clickOnSection, $data['clickOnSection']));
        $I->seeInCurrentUrl($data['url']);
    }
      
     /**
      * Функция по принципу Data Provider, где мы заносим значения для выполнения селектора clickOnSection, и массив randomList для получения случайного значения
      */
     protected function getListOfSections(){
            $randomList = [
            ['clickOnSection' => 'Разработка', 'url' => 'develop'],
            ['clickOnSection' => 'Администрирование', 'url' => 'admin'],
            ['clickOnSection' => 'Дизайн', 'url' => 'design'],
            ['clickOnSection' => 'Менеджмент', 'url' => 'management'],
            ['clickOnSection' => 'Маркетинг', 'url' => 'marketing'],
            ['clickOnSection' => 'Научпоп', 'url' => 'popsci']
            ];
        shuffle($randomList);
        return array_slice($randomList, 0, 2);
        }
}
