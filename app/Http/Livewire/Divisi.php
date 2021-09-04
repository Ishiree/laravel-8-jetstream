<?php

namespace App\Http\Livewire;

use App\Models\Divisi as ModelsDivisi;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Divisi extends Component
{
    public $divisis, $nama_divisi, $kode_divisi, $divisi_id;
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
            'nama_divisi' => 'required',
            'kode_divisi' => ['required', Rule::unique('divisis', 'kode_divisi')],
        ];
    }
    
    /**
     * Function untuk create dan validate data
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        // ModelsDivisi::create($this->modelData());
        ModelsDivisi::updateOrCreate(['id' => $this->divisi_id], [
            'nama_divisi' => $this->nama_divisi,
            'kode_divisi' => $this->kode_divisi
        ]);
        session()->flash('message', 
        $this->divisi_id ? 'Divisi Updated Successfully.' : 'Divisi Created Successfully.');
  
        
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
        $this->divisi_id = null;
    }
    
    /**
     * Function untuk edit data
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $divisi = ModelsDivisi::findOrFail($id);
        $this->divisi_id = $id;
        $this->nama_divisi = $divisi->nama_divisi;
        $this->kode_divisi = $divisi->kode_divisi;
        
        $this->modalFormVisible = true;
    }

    public function delete($id)
    {
        ModelsDivisi::find($id)->delete();
        session()->flash('message', 'Divisi Berhasil Dihapus.');
    }

    public function render()
    {
        $this->divisis = ModelsDivisi::all();
        return view('livewire.divisi');
    }
}
