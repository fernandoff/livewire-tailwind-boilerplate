<?php

namespace App\Livewire;

use App\Models\Server;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Renderless;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use Livewire\WithPagination;

#[Title('Servers')]
class Servers extends Component
{
    use WithPagination;

    public $currentAction;
    public $currentServer = [];
    public $serversCount = 0;
    public $status;

    public $observation;

    #[Url()]
    public $search;

    #[Renderless]
    public function debug()
    {
        dump(
            [
                'this' => $this,
                'servers' => $this->getServers()
            ]);
    }

    #[Computed()]
    public function getServers()
    {
        sleep(2);
        $data = Server::query();

        if(!empty($this->search)){
            $data->where('description', 'like', '%' . $this->search . "%");
        }

        $data = $data->paginate(5);

        $this->serversCount = $data->count();
        return $data;
    }

    public function save()
    {
        if(empty($this->currentServer)){
            $this->js("alert('Empty Server for saving')");
            return;
        }

        sleep(1);

        $result = Server::updateOrCreate(
            [
                'id' => $this->currentServer['id'] ?? null
            ],
            [
                'ip' => $this->currentServer['ip'] ?? 0,
                'description' => $this->currentServer['description'] ?? ""
            ]
        );

        if($result->wasRecentlyCreated){
            $this->status = "Server created successfully";
        } else{
            $this->status = "Server edited successfully";
        }

        $this->dispatch('server-created', data: $this->currentServer);
        $this->newServer();
    }

    public function getServersCount()
    {
        $this->skipRender();
        return $this->getServers()->count();
    }

    public function editServer($server)
    {
        $this->currentServer = $server;
    }

    public function deleteServer($serverId)
    {
        Server::destroy($serverId);
        $this->newServer();
    }

    public function duplicateServer($server)
    {
        $this->currentServer = $server;
        $this->currentServer['id'] = null;
    }

    public function render()
    {
        $this->currentAction = "Saving......";

        return view('livewire.servers');
    }

    public function newServer()
    {
        $this->status = "";
        $this->currentServer = [];
    }

    public function alert()
    {
        $this->skipRender();
        return $this->js("alert('alertaaaa')");
    }

}
