<div class="p-6">
    <x-jet-button wire:click="createShowModal">
        {{ __('Create') }}
    </x-jet-button>

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Tambah Cabang') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="nama_cabang" value="{{ __('Nama Cabang') }}" />
                <x-jet-input id="nama_cabang" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="nama_cabang" required/>
                @error('nama_cabang')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="kode_cabang" value="{{ __('Kode Cabang') }}" />
                <x-jet-input id="kode_cabang" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="kode_cabang" required/>
                @error('kode_cabang')
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
