<?php

use App\Models\User;
use App\Models\Complaint;

return [
    'user' => [
        'roles' => [
            User::ADMIN,
            User::PETUGAS,
        ],
    ],
    'complaint' => [
        'status' => [
            Complaint::BELUM_DIVALIDASI,
            Complaint::BELUM_DITANGANI,
            Complaint::PROSES,
            Complaint::SUDAH_DITANGANI,
        ],
    ],
];
