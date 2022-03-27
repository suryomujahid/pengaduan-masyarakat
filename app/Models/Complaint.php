<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    // Status
    const BELUM_DIVALIDASI = 'Belum divalidasi';
    const BELUM_DITANGANI = 'Belum ditangani';
    const PROSES = 'Proses';
    const SUDAH_DITANGANI = 'Sudah ditangani';
}
