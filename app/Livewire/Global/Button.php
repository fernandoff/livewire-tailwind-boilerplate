<?php

namespace App\Livewire\Global;

use Livewire\Component;

class Button extends Component
{
    public $text = "Global Button - Set text property";

    public $type = "button";

    public $eventId = 1;

    public function render()
    {
        return <<<'HTML'
        <div>
            <button
            x-on:click="$dispatch('click-{{ $eventId }}')"
            type="{{ $type }}"
            style="background: #1a9818; padding: 5px 10px; border-radius: 5px"
            class="text-white font-bold">
                {{ $text }}
            </button>
        </div>
        HTML;
    }
}
