<?php
namespace Helper;

use Faker\Factory;
use FunctionalTester;

/**
 * class for base helper to tests
 */
class BaseHelper extends \Codeception\Module
{
    public function callFaker($locale = 'en_US')
    {
        $faker = Factory::create($locale);

        return $faker;
    }
}
