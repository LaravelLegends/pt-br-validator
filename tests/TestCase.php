<?php

namespace Tests;

use Orchestra\Testbench\TestCase as TestbenchTestCase;
use ValidatorDocs\ServiceProvider;

abstract class TestCase extends TestbenchTestCase
{
    /**
     * Load package service provider
     */
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }
}
