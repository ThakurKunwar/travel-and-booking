<?php

namespace App\Services;

use App\Repositories\MediaRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MediaService
{
    /**
     * Create a new class instance.
     */
    public static function storeMedia(Mixed $media, Model $model): string
    {
        $className = class_basename($model);
        $folderName = strtolower($className);
        $mediaName = date('-Y-m-d-') . rand(1, 1000) . '.' . $media->extension();
        if ($model->media) {
            self::deleteMedia($model->media->id);
        }
        $mediaPath = Storage::putFileAs(
            "public/uploads/{$folderName}",
            $media,
            $mediaName,
            [
                'visibility' => 'public'
            ]

        );
        return $mediaPath;
    }
    public static function UploadMedia(Mixed $media, Model $model)
    {
        $repository = new MediaRepository();
        $path = self::storeMedia($media, $model);
        return $repository->create([
            'mediaable_id' => $model->id,
            'mediaable_type' => $model::class,
            'path' => $path,
            'property' => [
                'original_name' => $media->getClientOriginalName(),
                'size' => $media->getSize(),
                'type' => $media->extension(),
            ]
        ]);
    }
    public static function uploadMultipleMedia(array $mediaArr, Model $model)
    {
        $mediaData = []; //arrays of media to return 
        foreach ($mediaArr as $media) {
            $path = self::storeMedia($media, $model);
            $repository = new MediaRepository();

            $mediaData[] = $repository->create([
                'mediaable_id' => $model->id,
                'mediaable_type' => get_class($model),
                'path' => $path,
                'property' => [
                    'originalName' => $media->getClientOriginalName(),
                    'size' => $media->getSize(),
                    'type' => $media->extension(),
                ]
            ]);
        }
        return $mediaData;
    }
    public static function deleteMedia($modelId)
    {
        $repository = new MediaRepository();

        return $repository->delete($modelId, function ($media) {
            return self::removeMedia($media);
        });
    }
    public static function removeMedia($media)
    {
        if (!$media) {
            return;
        }
        $storagePath = storage_path("app/{$media->path}");
        if (File::exists($storagePath)) {
            unlink($storagePath);
        }
    }
}
