
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('images/Logo.png') }}" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>  {{ $title }}  
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

        <body class="bg-black -900 text-white font-sans">

            <x-homeheader> {{ $title }} </x-homeheader>

            <main>
                <div class="w-full"> 
                    {{ $slot }} 
                </div>
            </main>
            
        </body>


</html>

