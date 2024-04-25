<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatusModel extends Model
{
    use HasFactory;

    protected $table = 'detail_status_barang';
    protected $primaryKey = 'id_detail_status';
    public $timestamps = false;

    protected $fillable = ['kode_status', 'nama_status'];

}