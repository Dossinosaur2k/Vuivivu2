<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class CategoriesValidator.
 *
 * @package namespace App\Validators;
 */
class CategoriesValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|string|max:255',
            'description' => 'required|max:255',
        ],
    ];
}
