<?php

namespace App\Services;

use App\Models\Pendaftar;

class StatusFlowService
{
    public static function getStatusFlow()
    {
        return [
            Pendaftar::STATUS_SUBMIT => [
                'label' => 'Dikirim',
                'description' => 'Form terkirim, menunggu verifikasi administrasi',
                'next_status' => [Pendaftar::STATUS_ADM_PASS, Pendaftar::STATUS_ADM_REJECT],
                'color' => 'warning'
            ],
            Pendaftar::STATUS_ADM_PASS => [
                'label' => 'Lulus Administrasi',
                'description' => 'Berkas memenuhi syarat, menunggu pembayaran',
                'next_status' => [Pendaftar::STATUS_PAID],
                'color' => 'info'
            ],
            Pendaftar::STATUS_ADM_REJECT => [
                'label' => 'Tolak Administrasi',
                'description' => 'Berkas tidak memenuhi syarat',
                'next_status' => [],
                'color' => 'danger'
            ],
            Pendaftar::STATUS_PAID => [
                'label' => 'Terbayar',
                'description' => 'Pembayaran terverifikasi, menunggu hasil seleksi',
                'next_status' => [Pendaftar::STATUS_LULUS, Pendaftar::STATUS_TIDAK_LULUS, Pendaftar::STATUS_CADANGAN],
                'color' => 'primary'
            ],
            Pendaftar::STATUS_LULUS => [
                'label' => 'Lulus',
                'description' => 'Selamat! Anda diterima di sekolah ini',
                'next_status' => [],
                'color' => 'success'
            ],
            Pendaftar::STATUS_TIDAK_LULUS => [
                'label' => 'Tidak Lulus',
                'description' => 'Maaf, Anda belum dapat diterima',
                'next_status' => [],
                'color' => 'danger'
            ],
            Pendaftar::STATUS_CADANGAN => [
                'label' => 'Cadangan',
                'description' => 'Anda masuk dalam daftar cadangan',
                'next_status' => [Pendaftar::STATUS_LULUS, Pendaftar::STATUS_TIDAK_LULUS],
                'color' => 'secondary'
            ]
        ];
    }

    public static function canTransitionTo($currentStatus, $newStatus)
    {
        $flow = self::getStatusFlow();
        return in_array($newStatus, $flow[$currentStatus]['next_status'] ?? []);
    }

    public static function getStatusInfo($status)
    {
        $flow = self::getStatusFlow();
        return $flow[$status] ?? null;
    }
}