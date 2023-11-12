<?php

namespace App\Livewire;

use App\Models\Server;
use Livewire\Component;

class Counter extends Component
{
    public $id;
    public $title = 'The counter';
    public $count = 1;
    public $nome;
    public $currentServer = [];

    public function save()
    {
        dd($this);
    }

    public function editServer($server)
    {
        $this->currentServer = $server;
    }

    public function render()
    {
        $servers = Server::all();

        return view('livewire.counter')
            ->with([
                'servers' => $servers,
                'id' => $this->id
            ])
            ->title('Counter!');


    }
}
