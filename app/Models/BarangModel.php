<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'detail_barang';
    protected $primaryKey = 'id_barang';
    public $timestamps = false;

    protected $fillable = ['id_kode_barang', 'id_user', 'nama_barang','satuan', 'harga_perolehan', 'tanggal_pencatatan', 'NUP'];

    public function kode(): BelongsTo{
        return $this->belongsTo(KodeBarangModel::class, 'id_kode_barang', 'id_kode_barang');
    }

    public function user(): BelongsTo{
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
}