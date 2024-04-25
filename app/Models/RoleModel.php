<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'id_role';
    public $timestamps = false;

    protected $fillable = ['kode_role', 'nama_role'];

}