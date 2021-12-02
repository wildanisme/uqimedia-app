<?php

namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mst_product';
    protected $guarded = [];
    protected $fillable = [
        'nama', 'id_satuan', 'harga'
    ];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan', 'id');
    }
}
