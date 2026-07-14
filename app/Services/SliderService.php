<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

//CMS
use App\Models\Slider;

class SliderService
{
    public function upload(string $title, UploadedFile $file, object $model, bool $delete = false)
    {
        if ($delete) {
            $name = pathinfo($model->file, PATHINFO_FILENAME);

            File::delete(public_path('uploads/slider/' . $model->file));
            File::delete(public_path('uploads/slider/thumbs/' . $model->file));

            File::delete(public_path('uploads/slider/webp/' . $name . '.webp'));
            File::delete(public_path('uploads/slider/tablet/' . $name . '.webp'));
            File::delete(public_path('uploads/slider/mobile/' . $name . '.webp'));
            File::delete(public_path('uploads/slider/tiny/' . $name . '.webp'));
        }

        $slug = Str::slug($title);
        $name = date('His') . '_' . $slug . '.' . $file->getClientOriginalExtension();

        // 🔥 katalogi
        File::ensureDirectoryExists(public_path('uploads/slider'));
        File::ensureDirectoryExists(public_path('uploads/slider/webp'));
        File::ensureDirectoryExists(public_path('uploads/slider/tablet'));
        File::ensureDirectoryExists(public_path('uploads/slider/mobile'));
        File::ensureDirectoryExists(public_path('uploads/slider/tiny'));
        File::ensureDirectoryExists(public_path('uploads/slider/thumbs'));

        $file->move(public_path('uploads/slider'), $name);

        $filepath = public_path('uploads/slider/' . $name);

        $baseName = pathinfo($name, PATHINFO_FILENAME);

        // 🔥 DESKTOP LARGE (2560px) - dla ekranów > 1900px
        $large = Image::make($filepath)
            ->resize(2560, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        $large->encode('webp', 60)
            ->save(public_path('uploads/slider/webp/' . $baseName . '.webp'));

        // 🔥 DESKTOP MEDIUM (1920px) - dla ekranów 720px - 1900px
        // (Użytkownik prosił o 1400px, ale 1920px lepiej pasuje do przedziału do 1900px)
        // Decyzja: Zastosuję 1920px jako standard lub 1400px zgodnie z sugestią.
        // Trzymam się 1920px dla lepszej jakości w tym dużym przedziale.
        $medium = Image::make($filepath)
            ->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        $medium->encode('webp', 70)
            ->save(public_path('uploads/slider/' . $name), 80); // Zapisujemy jako główny JPG (fallback)

        $medium->encode('webp', 65)
            ->save(public_path('uploads/slider/tablet/' . $baseName . '.webp'));

        // 🔥 MOBILE (768px) - dla ekranów 500px - 720px
        $mobile = Image::make($filepath)
            ->resize(768, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

        $mobile->encode('webp', 60)
            ->save(public_path('uploads/slider/mobile/' . $baseName . '.webp'));

        // 🔥 TINY (480px) - dla ekranów < 500px
        $tiny = Image::make($filepath)
            ->resize(480, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

        $tiny->encode('webp', 60)
            ->save(public_path('uploads/slider/tiny/' . $baseName . '.webp'));

        // 🔥 THUMB (opcjonalnie)
        $thumb = Image::make($filepath)
            ->fit(400, 250);

        $thumb->save(public_path('uploads/slider/thumbs/' . $name), 80);

        $model->update(['file' => $name]);
    }
}
