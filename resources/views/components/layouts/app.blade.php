<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Titleaaa' }}</title>
        @vite('resources/css/app.css')
    </head>
    <body>

        <div class="relative flex flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-6 px-6">
            <h1 class="text-3xl font-bold">
                Tailwind is here!
            </h1>

            <div class="p-5">

                <livewire:global.header />

                <livewire:global.menu />

                {{ $slot }}

            </div>

        </div>
    </body>
</html>
