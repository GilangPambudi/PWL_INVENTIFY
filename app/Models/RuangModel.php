<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RuangModel extends Model
{
    use HasFactory;

    protected $table = 'ruang';
    protected $primaryKey = 'id_ruang';
    public $timestamps = false;

    protected $fillable = ['kode_ruang', 'nama_ruang', 'nip', 'penanggung_jawab'];
}