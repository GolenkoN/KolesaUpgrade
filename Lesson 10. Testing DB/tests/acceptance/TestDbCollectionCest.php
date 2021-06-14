<?php
use Helper\BaseHelper;
use Page\Acceptance\snapPage;

class TestDbCollectionCest extends AcceptanceTester
{
    public const NUMBER = 10;    
    public $data;
    public $users;

    public function _before(AcceptanceTester $I)
    {
       //С помощью цикла и фейкера создаем 10 пользователй, и проверяем их наличие в бд
        for($i = 1; $i<=self::NUMBER; $i++) {
            $faker = $I->callFaker();
    
            $this->data = [
                "job" => $faker->jobTitle,
                "superhero" => $faker->boolean(),
                "skill" => $faker->word,
                "email" => $faker->email,
                "name" => $faker->name,
                "DOB" => $faker->date("Y-m-d"),
                "avatar" => $faker->imageUrl(),
                "canBeKilledBySnap" => $faker->boolean(),
                "created_at" => $faker->date("Y-m-d"),
                "owner" => 'itsmadikenzhebayev',
            ];
    
            $I -> haveInCollection('people', $this->data);
            $I -> seeInCollection('people',$this->data);

            $user = $I->grabFromCollection('people', $this->data);
            array_push($this->users, $user);
                       
        }
    }

    // Проверка на наличие пользваотелей на странице, после чего удаление со значением killedBySnap
    public function snapKillTest(AcceptanceTester $I)
    {
       
        $I -> amOnPage(snapPage::$URL);
        //проверяем отображение каждого юзера
        foreach($this->users as $value) {
            $I -> see($value ['name']);
        }  
        $I -> click(snapPage::$snapButton);
        $I->wait(10);
        //создаем две переменные для храрения данных тех кто должен быть улдален а кто нет(killedBySnap == true || false)
        $usersTrueSnap = array(); 
        $usersFalseSnap = array();
        //перебираем массив и собираем тех кого должны удалить а кого не должны удалять
        foreach($this->users as $snapCondition) {
        if ($snapCondition['canBeKilledBySnap']== true)
         {
            array_push($this->usersTrueSnap, $snapCondition);
         }  else  {
            array_push($this->usersFalseSnap, $snapCondition);}   
        }

        //проверка что те кто должныв удалиться - удадлены
        foreach($this->usersTrueSnap as $value) {
        $I -> dontSee($value ['name']);
        }
        //проверка что те кто не должны удалится - сохранены
        foreach($this->usersFalseSnap as $value) {
            $I -> see($value ['name']);
        }
        //проверка если данные удалены
        $I->dontSeeInCollection('people', $this->usersTrueSnap);}
}