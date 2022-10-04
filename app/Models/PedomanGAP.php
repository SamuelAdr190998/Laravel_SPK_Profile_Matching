<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedomanGAP extends Model
{
    protected $table = 'pedoman_gap';
    protected $fillable = [
        'ketentuan_selisih',
        'bobot_nilai',
        'keterangan'
    ];
}
