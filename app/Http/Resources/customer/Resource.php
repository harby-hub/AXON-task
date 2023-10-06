<?php namespace App\Http\Resources\customer; class Resource extends \Illuminate\Http\Resources\Json\JsonResource {
    public function toArray( \Illuminate\Http\Request $request ) : array {
        return [
            'Country' => $this -> Country ,
            'phone'   => $this -> phone   ,
            'Status'  => filter_var( $this -> Status , FILTER_VALIDATE_BOOLEAN )  ,
        ] ;
    }
}
