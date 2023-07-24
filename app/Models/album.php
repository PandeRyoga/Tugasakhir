<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    use HasFactory;

    protected $table = 'album';
    protected $fillable = [
    'nama_album', 'gambar_album'
    ];
    protected $hidden =[];

    public function Gallery()
    {
        return $this->hasMany(Gallery::class, 'nama_album', 'id');
    }
}
