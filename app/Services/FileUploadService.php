<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadService
{
    public function upload(
        UploadedFile $file,
        string $directory,
        string $disk = 'public',
        bool $useOriginalFileName = false
    ): array {
        // $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $filename = $useOriginalFileName
            ? $file->getClientOriginalName()
            : Str::uuid() . '.' . $file->getClientOriginalExtension();

        $path = "{$directory}/{$filename}";

        $stream = fopen($file->getPathname(), 'r');

        Storage::disk($disk)->put($path, $stream);

        if (is_resource($stream)) {
            fclose($stream);
        }

        return [
            'path' => $path,
            'original_name' => $file->getClientOriginalName(),
            'file_name' => $filename,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'disk' => $disk,
        ];
    }

    public function delete(string $path, string $disk = 'public'): bool
    {
        return Storage::disk($disk)->delete($path);
    }

    public function deleteMultiple(
        array $paths,
        string $disk = 'public'
    ): void {

        foreach ($paths as $path) {
            $this->delete($path, $disk);
        }
    }

    public function deleteDirectory(
        string $directory,
        string $disk = 'public'
    ): bool {

        if (!Storage::disk($disk)->exists($directory)) {
            return false;
        }

        return Storage::disk($disk)->deleteDirectory($directory);
    }
}