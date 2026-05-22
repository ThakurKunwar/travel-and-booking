<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Models\Region;
use App\Repositories\PackageRepository;
use App\Services\MediaService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Override;

class PackageController extends BaseController
{

    public function __construct()
    {
        $this->repository = new PackageRepository();
        $this->formRequest = PackageRequest::class;
        parent::__construct();
    }
    #[Override]
    public function withCreate(): array
    {
        return
            [
                'regions' => Region::where('is_active', true)->get()
            ];
    }
    #[Override]
    public function processStoreData(FormRequest $request)
    {
        return $request->safe()->except(['image']);
    }
    #[Override]
    public function storeCallBack(Model $resource, FormRequest $request)
    {
        if ($request->hasFile('image')) {
            MediaService::uploadMedia(

                $request->file('image'),
                $resource

            );
        }
        return $resource;
    }
    #[Override]
    public function updateCallBack(Model $resource, FormRequest $request)
    {
        if ($request->hasFile('image')) {
            if ($resource->media) {
                MediaService::deleteMedia($resource->media->id);
            }
            MediaService::uploadMedia($request->file('image'), $resource);
        }
        return $resource;
    }
}
