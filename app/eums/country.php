<?php namespace App\eums; enum country : string {
    case Cameroon   = "Cameroon"   ;
    case Ethiopia   = "Ethiopia"   ;
    case Morocco    = "Morocco"    ;
    case Mozambique = "Mozambique" ;
    case Uganda     = "Uganda"     ;
    public function Expression( ) : string {
        return match( $this ) {
            country::Cameroon   => '\(237\)\ ?[2368]\d{7,8}$' ,
            country::Ethiopia   => '\(251\)\ ?[1-59]\d{8}$'   ,
            country::Morocco    => '\(212\)\ ?[5-9]\d{8}$'    ,
            country::Mozambique => '\(258\)\ ?[28]\d{7,8}$'   ,
            country::Uganda     => '\(256\)\ ?\d{9}$'         ,
        };
    }
    public static function toArray( ) : Array {
        return array_combine( self::names( ) , self::values( ) );
    }
    public static function names( ) : Array {
        return array_column( self::cases( ) , 'name' );
    }
    public static function values( ) : Array {
        return array_column( self::cases( ) , 'value' );
    }
}
