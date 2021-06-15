<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Faker\Factory;

class BaseHelper extends \Codeception\Module
{
    public function callFaker($locale = 'en_US'){
        $faker = Factory::create($locale);
        return $faker;
    }
}
