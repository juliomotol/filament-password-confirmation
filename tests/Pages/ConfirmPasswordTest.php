<?php

use JulioMotol\FilamentPasswordConfirmation\Pages\ConfirmPassword;
use JulioMotol\FilamentPasswordConfirmation\Tests\Fixtures\UserFactory;
use Livewire\Livewire;

use function Pest\Laravel\actingAs;

beforeEach(fn () => actingAs(UserFactory::new()->createOne()));

it('can render confirm password', function () {
    Livewire::test(ConfirmPassword::class)->assertSuccessful();
});

it('can confirm password', function () {
    Livewire::test(ConfirmPassword::class)
        ->fillForm(['password' => 'password'])
        ->call('confirm')
        ->assertHasNoErrors();
});

it('throws error on invalid password', function () {
    Livewire::test(ConfirmPassword::class)
        ->fillForm(['password' => 'invalid'])
        ->call('confirm')
        ->assertHasFormErrors();
});
