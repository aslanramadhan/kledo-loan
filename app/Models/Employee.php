<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    /**
     * Model Config
     */
    protected $table = 'kledo_employee';
    protected $fillable = array(
        'nama',
        'tanggal_masuk',
        'total_gaji'
    );
}
