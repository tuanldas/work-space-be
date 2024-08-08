<?php

namespace App\Helpers;

use Colors\RandomColor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Typography\FontFactory;

readonly class ImageRenderHelper
{
    private string $directory;
    private string $filePath;

    public function __construct(
        private string $name,
        private string $folderName = 'images/projects'
    )
    {
        $this->directory = 'public';
        if (!Storage::directoryExists($this->directory . '/' . $this->folderName)) {
            Storage::disk('local')->makeDirectory($this->directory . '/' . $this->folderName);
        }
        $this->setFilePath($this->renderFilePath());
    }

    private function renderFilePath(): string
    {
        return $this->folderName . '/' . $this->getFirstLetters($this->name) . time() . '_' . Str::uuid() . '.png';
    }

    public function toImage(): ?ImageManager
    {
        $image = new ImageManager(Driver::class);
        $text = $this->getFirstLetters($this->name);
        if ($text) {
            $image->create(200, 200)
                ->fill(RandomColor::one(), 10, 10)
                ->text($this->getFirstLetters($this->name), 100, 100, function (FontFactory $font) {
                    $font->file(public_path('/assets/fonts/Helvetica.ttf'));
                    $font->size(100);
                    $font->color('#FFFFFF');
                    $font->align('center');
                    $font->valign('center');
                    $font->wrap(50);
                })
                ->save(storage_path('app/' . $this->directory . '/' . $this->getFilePath()));
            return $image;
        }
        return null;
    }

    public function getFirstLetters($text): string|null
    {
        $words = explode(' ', $text);
        if (count($words) >= 2) {
            return strtoupper($words[0][0] . $words[1][0]);
        } elseif (count($words) == 1) {
            return strtoupper($words[0][0]);
        } else {
            return null;
        }
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }

    private function setFilePath(string $filePath): void
    {
        $this->filePath = $filePath;
    }
}
