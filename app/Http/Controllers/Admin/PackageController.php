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
    protected string $routePrefix = 'admin';

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
        return $request->safe()->except(['images']);
    }
    #[Override]
    public function storeCallBack(Model $resource, FormRequest $request)
    {
        if ($request->hasFile('images')) {
            MediaService::uploadMultipleMedia(

                $request->file('images'),
                $resource

            );
        }

        return $resource;
    }
}
