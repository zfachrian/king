<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $fillable = [
        'barang',
        'stock',
        'tgl_kadaluarsa',
        'keterangan'
    ];

    protected $guarded = array('id');
}
