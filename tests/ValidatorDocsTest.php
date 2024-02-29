<?php

use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

uses(TestCase::class);

test('it_should_check_cellphone_rule', function () {
    $correct = Validator::make(
        ['test1' => '98899-4444', 'test2' => '9800-1936'],
        ['test1' => 'cellphone', 'test2' => 'cellphone']
    );

    $incorrect = Validator::make(
        ['test1' => '900-1926'],
        ['test1' => 'cellphone']
    );

    expect($correct->passes())->toBeTrue();

    expect($incorrect->fails())->toBeTrue();
});
