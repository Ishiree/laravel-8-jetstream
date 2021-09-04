<?php

namespace App\Http\Livewire;

use App\Models\Cabang as ModelsCabang;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Cabang extends Component
{
    public $cabangs, $nama_cabang, $kode_cabang, $cabang_id;
    public $modalFormVisible = false;
    public $no=1;

    
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
        ModelsCabang::updateOrCreate(['id' => $this->cabang_id], [
            'nama_cabang' => $this->nama_cabang,
            'kode_cabang' => $this->kode_cabang
        ]);
        session()->flash('message', 
        $this->cabang_id ? 'Cabang Updated Successfully.' : 'Cabang Created Successfully.');
  
        
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

    
    /**
     * Function untuk edit data
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $cabang = ModelsCabang::findOrFail($id);
        $this->cabang_id = $id;
        $this->nama_cabang = $cabang->nama_cabang;
        $this->kode_cabang = $cabang->kode_cabang;
        
        $this->modalFormVisible = true;
    }

    public function delete($id)
    {
        ModelsCabang::find($id)->delete();
        session()->flash('message', 'Cabang Berhasil Dihapus.');
    }

    public function render()
    {
        $this->cabangs = ModelsCabang::all();
        return view('livewire.cabang');
    }
}
