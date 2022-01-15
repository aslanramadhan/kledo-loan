<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    /**
     * Model Config
     */
    protected $table = 'kledo_loan';
    protected $fillable = array(
        'tanggal_diajukan',
        'tanggal_disetujui',
        'pegawai_id',
        'total_kasbon'
    );
}
