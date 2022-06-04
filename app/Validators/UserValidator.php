<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:8|max:255',
            'password_confirmation' => 'required',
            'role' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:5048'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'image' => 'mimes:png,jpg,jpeg|max:5048'
            // 'role' => 'required'
        ],
    ];
}
