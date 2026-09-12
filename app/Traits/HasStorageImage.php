<?php

namespace App\Traits;

trait HasStorageImage
{
    /**
     * Format an image or file path to ensure it points to the public storage URL.
     *
     * @param string|null $value
     * @return string|null
     */
    public function formatImageUrl(?string $value): ?string
    {
        if (!$value) {
            return null;
        }

        // If it's already an external absolute URL, leave it untouched
        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            return $value;
        }

        $clean = ltrim($value, '/');

        // Ensure path starts with storage/
        if (!str_starts_with($clean, 'storage/')) {
            $clean = 'storage/' . $clean;
        }

        return '/' . $clean;
    }
}
