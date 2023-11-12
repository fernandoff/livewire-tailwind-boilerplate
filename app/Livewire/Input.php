<?php

namespace App\Livewire;

use Livewire\Component;

class Input extends Component
{
    public $type = 'text';
    public $label = '';

    public function render()
    {
        return <<<'HTML'
        <div>
            <hr>
            <label>{{ $label }}</label>
            <input type="{{ $type }}">
        </div>
        HTML;
    }
}
