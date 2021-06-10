<?php


class TestApiCest
{
    public function createUserData(\FunctionalTester $I)
    {
        $userData = [
            'email' => 'madikenz@gmail.com',
            'owner' => 'itsmadikezhebayev',
            'job' => 'merck',
            'name' => 'MadiKen',
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost('human', $userData);
        $I->canSeeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson(['status' => 'ok']); 
    } 

    
    public function changeUserData(\FunctionalTester $I)
    {
        $user_id = $I->grabResponse();
        $I->sendPut('/human', [
            'email' => 'chelseafc@chelsea.com',
            'owner' => 'itsmadikezhebayev',
            'job' => 'msd',
            'name' => 'Maadi',
        ]);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->seeResponseContainsJson(['nModified' => '1']); 
        $I->sendGet('people?owner=itsmadikenzhebayev');  
    } 
    
    
public function deleteUserData(\FunctionalTester $I)
    {
        $user_id = $I->grabResponse();
        $I->sendDelete('/people', $userId);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['deletedCount' => '1']);
        $I->sendGet('people?owner=itsmadikenzhebayev');
        $I->dontSeeResponseContainsJson(['owner' => 'itsmadikenzhebayev']);
    }
}
