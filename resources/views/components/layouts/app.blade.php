<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page' }}</title>
        @vite('resources/css/app.css')
    </head>
    <body>

        <div class="relative flex flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-6 px-6">
            <h1 class="text-red-700 text-3xl font-bold">
                Tailwind is here!!!
            </h1>

            <div class="p-5">

                <livewire:global.header />

                <livewire:global.menu />

                {{ $slot }}

                <x-modal name="test">
                    @slot('title')
                        Tha taitol
                    @endslot

                    @slot('body')
                        bodyyyyyahhhh
                    @endslot
                </x-modal>

                <x-modal name="test2">
                    @slot('title')
                        Tha taitol 222
                    @endslot

                    @slot('body')
                        bodyyyyyahhhh 2222
                    @endslot
                </x-modal>

                <button
                    x-data
                    x-on:click="$dispatch('open-modal', {name: 'test'})"
                    class = "px-3 py-1 bg-teal-500 text-white rounded"
                >
                    Open Modal 1
                </button>

                <button
                    x-data
                    x-on:click="$dispatch('open-modal', {name: 'test2'})"
                    class = "px-3 py-1 bg-teal-500 text-white rounded"
                >
                    Open Modal 2
                </button>

            </div>

        </div>
    </body>
</html>
