<?php

use Core\Validator;

it('validates a string', function() {
    expect(Validator::string('foobar'))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();
    expect(Validator::string(''))->toBeFalse();
});

it('validates a string with a minimum length', function() {
  expect(Validator::string('foobar', 10))->toBeFalse();
});

it('validates an email', function() {
  expect(Validator::email('test@example.com'))->toBeTrue();
  expect(Validator::email('some@dom'))->toBeFalse();
});