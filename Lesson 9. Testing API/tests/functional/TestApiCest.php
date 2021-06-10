<?php
use Helper\BaseHelper;

class TestApiCest
{
    /**
     * group test1
     * Функция по созданию пользователя
     */
    public function createUserData(\FunctionalTester $I)
    {
        //Инициализируем данные с помощью фейкера
        $owner = $I->callFaker()->userName.'itsmadikenzhebayev';
        $name = $I->callFaker()->lastName;
        $email = $I->callFaker()->email;
        $job = $I->callFaker()->company;
        $userData = [
            'owner' => $owner,
            'name' => $name,
            'email' => $email,
            'job' => $job,
        ];
        //отправляем запрос post и проверяем что все успешно
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost('human', $userData);
        $I->canSeeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson(['status' => 'ok']); 
    } 

    
    /**
     * group test2
     * Функция для измнеения данных пользователя
     */
    public function changeUserData(\FunctionalTester $I)
    {
        $owner = $I->callFaker()->userName.'itsmadikenzhebayev';
        $name = $I->callFaker()->lastName;
        $email = $I->callFaker()->email;
        $job = $I->callFaker()->company;
        $userData = [
            'owner' => $owner,
            'name' => $name,
            'email' => $email,
            'job' => $job,
        ];
        //помещаем в переменную данные из ответа которые мы получили(нужен id) и с помощью decode проверяем содекржит ли он нужный ответ, и после ычего забираем id если да
        $I->sendGet('people', ['owner' => $owner]);
        $apiResponse = $I->grabResponse();
        $user_id = [json_decode($apiResponse, true), '_id'];
        //обновляем данные и проверяем кол-во изменений
        $urlPut = 'human?_id=';
        $I->sendPut($urlPut.$user_id, ['name' => $I->callFaker()->$name]);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson(['nModified' => '1']);   
    } 
    
    /**
     * group test3
     * Функция по удалению пользователя
     */
    public function deleteUserData(\FunctionalTester $I)
    {
        $owner = $I->callFaker()->userName.'itsmadikenzhebayev';
        $name = $I->callFaker()->lastName;
        $email = $I->callFaker()->email;
        $job = $I->callFaker()->company;
        $userData = [
            'owner' => $owner,
            'name' => $name,
            'email' => $email,
            'job' => $job,
        ];
        $I->sendGet('people', ['owner' => $owner]);
        $apiResponse = $I->grabResponse();
        $user_id = [json_decode($apiResponse, true), '_id'];
        $urlDelete = 'human?_id=';
        $I->sendGet('people', ['owner' => $owner]);
        //Удаляем пользовтеля и проверяем кол-во удалений и действтилеьно ли удалился с помощью get
        $I->sendDelete($urlDelete.$user_id);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson(['deletedCount' => '1']);
        $I->sendGet('people', ['owner' => $owner]);
        $I->seeResponseContainsJson();
    }
}
