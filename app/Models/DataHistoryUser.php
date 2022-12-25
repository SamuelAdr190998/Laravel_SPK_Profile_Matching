<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataHistoryUser extends Model
{
    protected $table = 'data_history_user';
    protected $fillable = [
        'nama_user',
        'hasil_penilaian'
    ];
}
