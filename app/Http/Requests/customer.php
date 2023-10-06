<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Validation\Rule;
use \Illuminate\Validation\Rules\Enum;

class customer extends FormRequest {
    public function rules( ) : array {
        return [
            'Status'  => [ Rule::in( [ true , false , 0 , 1 , '0' , '1' , "true" , "false" ] ) ] ,
            'Country' => [ new Enum( \App\eums\country::class ) ] ,
        ];
    }
}
