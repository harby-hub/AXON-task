<!DOCTYPE html>
<html lang="{{ str_replace( '_' , '-' , app( ) -> getLocale( ) ) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> laravel </title>

        @vite( [ 'resources/css/app.css' ] )
        <script> window.Global = @json( [
            'country' => \App\eums\country::names( ) ,
            'url'     => \Illuminate\Support\Facades\URL::route( 'phone' )
        ] ) </script>

        </head>
    <body>

        <div id="Application"></div>
        @vite( [ 'resources/js/app.ts' ] )

    </body>
</html>