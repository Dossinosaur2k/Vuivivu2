<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class AdsValidator.
 *
 * @package namespace App\Validators;
 */
class AdsValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:191',
            'url' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:5048',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:191',
            'url' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:5048'
        ],
    ];
}
