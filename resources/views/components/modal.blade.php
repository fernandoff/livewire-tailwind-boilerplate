@props(['name', 'title'])
<div
    x-data="{ show : false, name : '{{ $name }}'}"
    x-show="show"
    x-on:open-modal.window="show = ($event.detail.name === name)"
    x-on:close-modal.window="show = false"
    x-on:keydown.escape.window="show = false"
    class="fixed z-50 inset-0"
    style="display: none"
>
    {{-- Gray Background --}}
    <div class="fixed inset-0 bg-black opacity-70" x-on:click="show=false"></div>

    {{-- Modal Body --}}
    <div
        class="bg-white rounded m-auto fixed inset-0 max-w-2xl" style="max-height: 500px">
        <div> {{ $title ?? '' }} </div>
        <div> {{ $body ?? '' }} </div>
    </div>



</div>
