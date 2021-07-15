<div class="p-6">
    {{-- <livewire:datatable model="App\Models\Divisi" /> --}}

    <x-jet-button wire:click="createShowModal">
        {{ __('Create') }}
    </x-jet-button>

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Tambah Divisi') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="nama_divisi" value="{{ __('Nama Divisi') }}" />
                <x-jet-input id="nama_divisi" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="nama_divisi" required/>
                @error('nama_divisi')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="kode_divisi" value="{{ __('Kode Divisi') }}" />
                <x-jet-input id="kode_divisi" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="kode_divisi" required/>
                @error('kode_divisi')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
