<?php

namespace App\Http\Livewire;

use App\Models\Cabang as ModelsCabang;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Cabang extends Component
{
    public $nama_cabang, $kode_cabang;
    public $modalFormVisible = false;

    
    /**
     * validasi form
     *
     * @return void
     */
    public function rules()
    {
        return[
            'nama_cabang' => 'required',
            'kode_cabang' => ['required', Rule::unique('cabangs', 'kode_cabang')],
        ];
    }
    
    /**
     * Function untuk create data
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        ModelsCabang::create($this->modelData());
        $this->modalFormVisible = false;
        $this->cleanVars();
    }
    
    /**
     * Menampilkan form modal ketika 
     * button create ditekan
     * @return void
     */
    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }
    
    /**
     * Menyiapkan kolom data pada model untuk diisi
     *  
     * @return void
     */
    public function modelData()
    {
        return[
            'nama_cabang' => $this->nama_cabang,
            'kode_cabang' => $this->kode_cabang,
        ];
    }
    
    /**
     * Menghapus variabel dalam kolom setelah submit form
     *
     * @return void
     */
    public function cleanVars()
    {
        $this->nama_cabang = null;
        $this->kode_cabang = null;
    }

    public function render()
    {
        return view('livewire.cabang');
    }
}
