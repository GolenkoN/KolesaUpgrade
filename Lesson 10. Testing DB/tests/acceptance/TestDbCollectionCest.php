<?php
use Helper\BaseHelper;
use Page\Acceptance\snapPage;

class TestDbCollectionCest extends AcceptanceTester
{
    public const NUMBER = 10;    
    public $data;
    public $users = array();

    /**
     * Функция для создания пользователей
     */
    public function _before(AcceptanceTester $I)
    {
       //С помощью цикла и фэйкера создаем 10 пользователей
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
    
            //Проверяем их наличие в бд
            $I -> haveInCollection('people', $this->data);
            $I -> seeInCollection('people', $this->data);
            
            //забираем данные и кладем их в массив
            $user = $I->grabFromCollection('people', $this->data);
            array_push($this->users, $user);
        }
    }

    /**
     * Функция для удаления пользователей со значением 'canBeKilledBySnap'=true
     */
    public function deleteUsersBySnap(AcceptanceTester $I)
    {
       $I -> amOnPage(snapPage::$URL);
        
        //проверяем отображение каждого пользователя через перебор массива
        foreach($this->users as $value) {
            $I->see($value ['name']);
        }  
        $I->click(snapPage::$snapButton);//удаляем пользователей
        $I->wait(10); //сделал 10 секунд, так как иногда при 5 секундах он отрабатывает, а иногда нет
        
        //Объявляем две переменные для хранения пользователей (killedBySnap == true || false)
        $usersTrueSnap = array(); 
        $usersFalseSnap = array();
        
        //перебираем массив и собираем тех кого должны удалить, а кого должны оставить (killedBySnap == true || false)
        foreach($this->users as $snapCondition) {
        if ($snapCondition['canBeKilledBySnap']== true)
         {
            array_push($this->usersTrueSnap, $snapCondition);
         }  else  {
            array_push($this->usersFalseSnap, $snapCondition);}   
         }

        //Проверка на то, что нет пользователей с snapCondition['canBeKilledBySnap']== true)
        foreach($this->usersTrueSnap as $value) {
        $I -> dontSee($value ['name']);
        }
        //Проверка на то, что есть пользователи с snapCondition['canBeKilledBySnap']== false)
        foreach($this->usersFalseSnap as $value) {
            $I -> see($value ['name']);
        }
        //Проверка на то, что пользователи удалились из бд
        $I->dontSeeInCollection('people', $this->usersTrueSnap);
        }
}