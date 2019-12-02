<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RplAgama extends Model
{
    protected $table = 'rpl_agamas';

    protected $fillable = ['nama', 'nis', 'nama_kelas', 'K1', 'K2', 'K3', 'K4'];

}
