<?php

namespace App\Livewire\Global;

use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        return <<<'HTML'
            <div>
                <hr>
                Header
                <hr>
            </div>
        HTML;

    }
}
