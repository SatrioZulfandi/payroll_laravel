<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_emp'; // pakai id_emp sebagai PK
    public $incrementing = true; // tetap auto increment
    protected $fillable = ['jabatan_id', 'nama', 'email', 'alamat', 'img'];

    public function position()
    {
        return $this->belongsTo(Position::class, 'jabatan_id');
    }
}
