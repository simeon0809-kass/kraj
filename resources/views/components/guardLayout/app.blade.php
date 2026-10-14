<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'Општина Идризово' }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="font-montserrat">
  
        {{ $slot }}

        <script src="https://kit.fontawesome.com/1f151a12c7.js" crossorigin="anonymous"></script>
        @livewireScripts
    </body>
</html>
