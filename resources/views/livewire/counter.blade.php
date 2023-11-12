<div>
    @php $title = "Counter"; @endphp

    <h1>{{ $count }}</h1>

    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Description</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
        @foreach ($servers as $server)
            <tr wire:key="{{ $server->id }}">
                <td>{{ $server->id }}</td>
                <td>{{ $server->description }}</td>
                <td><button wire:click="editServer({{ $server }})"> Edit </button></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <form wire:submit="save">
        <label for="title">Description:</label>
        <input type="hidden" name="id" wire:model="currentServer.id">
        <input type="text" name="description" wire:model="currentServer.description">
        <button type="submit">Save</button>
    </form>

    <div>

        @php  $initialLabel = 'teste' @endphp
        <br>
        <livewire:input label="Nome" type="text"/>
        <br>

        <br>
        <livewire:input :label="$initialLabel" type="text"/>
        <br>
        {{ $nome }}

        Current Server:
        <br>
        {{ json_encode($currentServer, JSON_PRETTY_PRINT) }}
    </div>

    @php
        $data = [
            0 => ['id' => 1, 'name' => 'Fernando'],
            1 => ['id' => 2, 'name' => 'FernandoFF']
        ];
    @endphp

    <livewire:global.table :data="$data" :headers="['Id', 'Lad']"/>

</div>
