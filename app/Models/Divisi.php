<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $fillable = ['nama_divisi', 'kode_divisi'];
    protected $guarded = [];

    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function kas()
    {
        return $this->hasMany(Kas::class, 'kas_id', 'id');
    }
}
