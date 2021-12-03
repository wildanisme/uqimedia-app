<?php

namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mst_pelanggan';
    protected $guarded = [];
    protected $fillable = [
        'nama', 'alamat', 'no_telp'
    ];
}
