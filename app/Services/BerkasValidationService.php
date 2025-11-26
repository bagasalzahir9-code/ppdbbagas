<?php

namespace App\Services;

class BerkasValidationService
{
    const MAX_FILE_SIZE = 2048; // 2MB in KB
    const ALLOWED_EXTENSIONS = ['pdf', 'jpg', 'jpeg', 'png'];
    const ALLOWED_MIME_TYPES = [
        'application/pdf',
        'image/jpeg',
        'image/jpg', 
        'image/png'
    ];

    public static function validateFile($file)
    {
        $errors = [];

        // Check file size
        if ($file->getSize() > self::MAX_FILE_SIZE * 1024) {
            $errors[] = 'Ukuran file maksimal 2MB';
        }

        // Check extension
        $extension = strtolower($file->getClientOriginalExtension());
        if (!in_array($extension, self::ALLOWED_EXTENSIONS)) {
            $errors[] = 'Format file harus PDF, JPG, atau PNG';
        }

        // Check MIME type
        if (!in_array($file->getMimeType(), self::ALLOWED_MIME_TYPES)) {
            $errors[] = 'Tipe file tidak valid';
        }

        return [
            'valid' => empty($errors),
            'errors' => $errors,
            'size_kb' => round($file->getSize() / 1024, 2)
        ];
    }

    public static function uploadBerkas($file, $pendaftarId, $jenis)
    {
        $validation = self::validateFile($file);
        
        if (!$validation['valid']) {
            return ['success' => false, 'errors' => $validation['errors']];
        }

        $filename = $pendaftarId . '_' . $jenis . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('berkas', $filename, 'public');

        \App\Models\PendaftarBerkas::create([
            'pendaftar_id' => $pendaftarId,
            'jenis' => $jenis,
            'nama_file' => $file->getClientOriginalName(),
            'url' => $path,
            'ukuran_kb' => $validation['size_kb'],
            'valid' => 1
        ]);

        return ['success' => true, 'path' => $path];
    }
}