<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswas';

    protected $fillable = ['nama', 'nis', 'alamat'];
}
