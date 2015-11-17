<?php
/**
 * Created by PhpStorm.
 * User: Italo
 * Date: 29/10/2015
 * Time: 13:00
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{
    protected $rules = [

        'project_id' => 'required|integer',
        'title' => 'required|max:255',
        'note' => 'required',

    ];

}