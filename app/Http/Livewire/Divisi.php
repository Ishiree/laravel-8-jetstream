<?php

namespace App\Http\Livewire;

use App\Models\Divisi as ModelsDivisi;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Divisi extends Component
{
    public $nama_divisi, $kode_divisi;
    public $modalFormVisible = false;

    
    /**
     * validasi form
     *
     * @return void
     */
    public function rules()
    {
        return[
            'nama_divisi' => 'required',
            'kode_divisi' => ['required', Rule::unique('divisis', 'kode_divisi')],
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
        ModelsDivisi::create($this->modelData());
        $this->modalFormVisible = false;
        $this->cleanVars();
    }

    public function read()
    {
        return ModelsDivisi::paginate(10);
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
            'nama_divisi' => $this->nama_divisi,
            'kode_divisi' => $this->kode_divisi,
        ];
    }
    
    /**
     * Menghapus variabel dalam kolom setelah submit form
     *
     * @return void
     */
    public function cleanVars()
    {
        $this->nama_divisi = null;
        $this->kode_divisi = null;
    }

    public function render()
    {
        return view('livewire.divisi', [
            'datas' => $this->read(),
        ]);
    }
}
