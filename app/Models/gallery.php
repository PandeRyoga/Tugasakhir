<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class gallery extends Model
{
    use HasFactory;

    protected $table='gallery';

    protected $fillable=[
        'foto_gallery', 'nama_album'
    ];

    protected $hidden=[];

    public function album()
    {
        return $this->belongsTo(album::class, 'nama_album', 'id');
    }
}
