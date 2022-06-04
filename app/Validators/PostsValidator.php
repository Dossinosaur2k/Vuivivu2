<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PostsValidator.
 *
 * @package namespace App\Validators;
 */
class PostsValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:191',
            'category' => 'required',
            'title' => 'required|max:191',
            'content' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:5048'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:191',
            'category' => 'required',
            'title' => 'required|max:191',
            'content' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:5048'
        ],
    ];
}
