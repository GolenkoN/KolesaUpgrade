<?php
namespace Helper;

use Faker\Factory;
use FunctionalTester;

/**
 * class for base helper to tests
 */
class BaseHelper extends \Codeception\Module
{
    /**
    * init Faker function in one place
    * @param $locale
    */
    public function callFaker($locale = 'en_US')
    {
        $faker = Factory::create($locale);

        return $faker;
    }
}
