<?php namespace App\Http\Controllers; class country extends Controller{
    public function index( \App\Http\Requests\customer $request ) {
        $query = \App\Models\customer::query( ) -> select( [ 'phone' ] ) -> groupBy( 'id' ) ;
        $query -> selectRaw( "CASE
            WHEN phone REGEXP '\(237\)\ ?[2368]\d{7,8}$' THEN 'true'
            WHEN phone REGEXP '\(251\)\ ?[1-59]\d{8}$'   THEN 'true'
            WHEN phone REGEXP '\(212\)\ ?[5-9]\d{8}$'    THEN 'true'
            WHEN phone REGEXP '\(258\)\ ?[28]\d{7,8}$'   THEN 'true'
            WHEN phone REGEXP '\(256\)\ ?\d{9}$'         THEN 'true'
            ELSE 'false'
        END as Status" );
        $query -> selectRaw( 'CASE
            WHEN phone Like "(237)%" THEN "Cameroon"
            WHEN phone Like "(251)%" THEN "Ethiopia"
            WHEN phone Like "(212)%" THEN "Morocco"
            WHEN phone Like "(258)%" THEN "Mozambique"
            WHEN phone Like "(256)%" THEN "Uganda"
            ELSE "none"
        END as Country' );
        if ( $request -> has( 'Country' ) ) $query -> Having( 'Country' , [ $request -> get( 'Country' ) ] ) ;
        if ( $request -> has( 'Status'  ) ) $query -> Having( 'Status' , [ $request -> get( 'Status'  ) ] ) ;
        return new \App\Http\Resources\customer\Collection( $query -> paginate( 15 , 'page' ) ) ;
    }
}