<?php
/**
 * Created by PhpStorm.
 * User: Italo
 * Date: 29/10/2015
 * Time: 13:00
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ClienteValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|max:255',
        'responsible' => 'required|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
    ];

} 