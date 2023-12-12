<div class="w-100 mt-2">

    <span>Total Servers: <span x-text="$wire.serversCount"></span></span>
    <span>{{ $status }}</span>

    <div class="mt-2 relative shadow-md sm:rounded-lg p-2">

        <x-forms.input-text name="search" wire:model.live.debounce.500ms="search"  inline>
            Search&nbsp;
        </x-forms.input-text>

        <br>

        <table class="text-sm text-gray-700 uppercase gb-gray-50">
            <thead>
            <tr>
                <td class="w-[4rem] ">Ip</td>
                <td class="w-[8rem] ">Description</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach ($this->getServers as $server)
                <tr wire:key="$server->id">
                    <td class="px-3 py-1">{{ $server->ip }}</td>
                    <td>{{ $server->description }}</td>
                    <td>
                        <button x-on:click="$wire.currentServer = {{ $server }}; $wire.currentAction='Editing...'" class="ml-3 text-white py-1 px-3 rounded bg-green-400">Edit<button/>

                        <button wire:confirm="Are you sure you want to delete this post?" wire:click="deleteServer({{ $server->id }})" class="ml-2 text-white py-1 px-2 rounded bg-red-500">Delete<button/>

                        <button wire:click="duplicateServer({{ $server }})" class="ml-2 text-white py-1 px-2 rounded bg-indigo-600">Duplicate<button/>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">
                    <br>
                    {{ $this->getServers->links('vendor.livewire.custom-pagination') }}
                </td>

            </tr>
            </tbody>
        </table>
    </div>


    <br><hr><br>

    <form wire:submit="save">
        <input type="hidden" name="id" wire:model="currentServer.id">

        <x-forms.input-text name="ip" wire:model="currentServer.ip" class="mb-3"/>

        <x-forms.input-text name="description" wire:model="currentServer.description" class="mb-3"/>

        <x-forms.input-text name="observation" wire:model="observation" class="mb-3"/>

        <x-forms.button type="submit" function="save"/>

        <x-forms.button x-on:click="$wire.currentServer = []" function="new"/>

        <x-forms.button wire:click="debug" function="debug"/>

        <span wire:loading>{{ $currentAction }}...</span>
    </form>

    <div>
        <br>
        <hr>
        Current Server:
        <br>
        <span x-text="JSON.stringify($wire.currentServer)"></span>
        {{ json_encode($currentServer, JSON_PRETTY_PRINT) }}
    </div>

    @php
        $data = [
            0 => ['id' => 1, 'name' => 'Fernando'],
            1 => ['id' => 2, 'name' => 'FernandoFF']
        ];
    @endphp

    <br>
    <hr>
    <livewire:global.table :data="$data" :headers="['Id', 'Lad']"/>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('server-created', (event) => {
                console.log(event.data)
            });
        });
    </script>


</div>
