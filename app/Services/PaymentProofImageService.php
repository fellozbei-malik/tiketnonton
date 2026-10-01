<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PaymentProofImageService
{
    private const MAX_WIDTH = 1200;

    private const JPEG_QUALITY = 85;

    public function storeAndOptimize(UploadedFile $file): string
    {
        $path = $file->store('payment-proofs', 'public');
        $fullPath = storage_path('app/public/' . $path);

        $this->optimize($fullPath);

        return $path;
    }

    private function optimize(string $fullPath): void
    {
        $mime = mime_content_type($fullPath);
        $image = match (true) {
            $mime === 'image/jpeg', $mime === 'image/jpg' => @imagecreatefromjpeg($fullPath),
            $mime === 'image/png' => @imagecreatefrompng($fullPath),
            $mime === 'image/webp' => @imagecreatefromwebp($fullPath),
            default => null,
        };

        if (! $image) {
            return;
        }

        $width = imagesx($image);
        $height = imagesy($image);

        if ($width <= self::MAX_WIDTH) {
            imagedestroy($image);
            return;
        }

        $newWidth = self::MAX_WIDTH;
        $newHeight = (int) round($height * (self::MAX_WIDTH / $width));

        $resized = imagecreatetruecolor($newWidth, $newHeight);
        if (! $resized) {
            imagedestroy($image);
            return;
        }

        imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        imagedestroy($image);

        if ($mime === 'image/png') {
            imagepng($resized, $fullPath, 8);
        } elseif ($mime === 'image/webp') {
            imagewebp($resized, $fullPath, self::JPEG_QUALITY);
        } else {
            imagejpeg($resized, $fullPath, self::JPEG_QUALITY);
        }

        imagedestroy($resized);
    }
}
