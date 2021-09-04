<div class="p-6">
    {{-- <livewire:datatable model="App\Models\Divisi" /> --}}
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

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <br>
            <div class="flex justify-between px-3 py-3">
                <div>
                    <h1>
                        <p class="text-gray-500 font-bold text-4xl">Divisi Table</p>
                    </h1>
                </div>
                <div>
                    <x-jet-button wire:click="createShowModal">
                        {{ __('Create') }}
                    </x-jet-button>
                </div>
            </div>
        
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <x-jet-table>
                <x-slot name="header">
                    <x-jet-table-column class="w-20">No.</x-jet-table-column>
                    <x-jet-table-column>Divisi</x-jet-table-column>
                    <x-jet-table-column>Kode</x-jet-table-column>
                    <x-jet-table-column>Action</x-jet-table-column>
                </x-slot>
                    @foreach($divisis as $divisi)
                    <tr>
                        <x-jet-table-column >{{ $no++ }}</x-jet-table-column>
                        <x-jet-table-column >{{ Str::ucfirst($divisi->nama_divisi) }}</x-jet-table-column>
                        <x-jet-table-column >{{ Str::ucfirst($divisi->kode_divisi) }}</x-jet-table-column>
                        <x-jet-table-column class="text-center">
                            <x-jet-edit-button wire:click="edit({{ $divisi->id }})">
                                {{ __('Edit') }}
                            </x-jet-edit-button>
                            <x-jet-danger-button wire:click="delete({{ $divisi->id }})">
                                {{ __('Delete') }}
                            </x-jet-danger-button>
                        </x-jet-table-column>
                    </tr>
                    @endforeach
            </x-jet-table>
        </div>
    </div>
</div>
