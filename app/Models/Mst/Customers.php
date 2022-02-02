<?php

namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mst_customers';
    protected $guarded = [];
    protected $fillable = [
        'name', 'address', 'phone_number'
    ];
}
