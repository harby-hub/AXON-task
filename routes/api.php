<?php
\Illuminate\Support\Facades\Route::get( '/phone' , [ \App\Http\Controllers\country::class , 'index' ] ) -> name( 'phone' );
