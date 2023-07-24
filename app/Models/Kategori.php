<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artikel;



class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori'; 
    protected $fillable =[
        'nama_kategori','slug'
    ];
    protected $hidden =[];

    public function Artikel()
    {
        return $this->hasMany(Artikel::class, 'Kategori_id', 'id');
    }
}

