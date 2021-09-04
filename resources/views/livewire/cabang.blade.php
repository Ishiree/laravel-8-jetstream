<div class="p-6">
    
    {{-- Modal Form Start--}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Tambah cabang') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="nama_cabang" value="{{ __('Nama cabang') }}" />
                <x-jet-input id="nama_cabang" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="nama_cabang" required/>
                @error('nama_cabang')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="kode_cabang" value="{{ __('Kode cabang') }}" />
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
    {{-- Modal Form End --}}

    {{-- Main Start --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <br>
            <div class="flex justify-between px-3 py-3">
                <div>
                    <h1>
                        <p class="text-gray-500 font-bold text-4xl">Cabang Table</p>
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
                    <x-jet-table-column>Cabang</x-jet-table-column>
                    <x-jet-table-column>Kode</x-jet-table-column>
                    <x-jet-table-column>Action</x-jet-table-column>
                </x-slot>
                    @foreach($cabangs as $cabang)
                    <tr>
                        <x-jet-table-column >{{ $no++ }}</x-jet-table-column>
                        <x-jet-table-column > {{ Str::ucfirst($cabang->nama_cabang) }} </x-jet-table-column>
                        <x-jet-table-column >{{ Str::ucfirst($cabang->kode_cabang) }}</x-jet-table-column>
                        <x-jet-table-column class="text-center">
                            <x-jet-edit-button wire:click="edit({{ $cabang->id }})">
                                {{ __('Edit') }}
                            </x-jet-edit-button>
                            {{-- <x-jet-danger-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                                {{ __('Delete') }}
                            </x-jet-danger-button> --}}
                        </x-jet-table-column>
                    </tr>
                    @endforeach
            </x-jet-table>
        </div>
    </div>
    {{-- Main End --}}
</div>
