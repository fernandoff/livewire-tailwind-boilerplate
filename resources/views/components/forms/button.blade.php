@props(['type', 'extraClass', 'function'])

@php

    switch ($function ?? ''){
         case 'save':
             $color = "bg-green-600";
             break;

        case 'new':
            $color = "bg-blue-600";
            break;

        case 'edit':
            $color = "bg-blue-500";
            break;

        case "delete":
            $color = "bg-red-600";
            break;

        default:
            $color = "bg-violet-600";
    }

    if(empty($slot) || strlen($slot) == 0) $content = ucfirst($function ?? '----');

@endphp

<button
    type="{{ $type ?? 'button' }}"
    class="{{ $color }} rounded px-2 py-1 text-white {{ $extraClass ?? '' }}"
    {{ $attributes }}
>
    {{ $content }}
</button>
