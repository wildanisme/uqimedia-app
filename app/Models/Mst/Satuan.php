<?php

namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Satuan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mst_satuan';
    protected $guarded = [];
    protected $fillable = [
        'nama'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id_satuan', 'id');
    }
}
