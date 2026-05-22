<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\RegionRequest;

use App\Repositories\RegionRepository;
use App\Services\MediaService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class RegionController extends BaseController
{
    protected string $routePrefix = 'admin';

    public function __construct()
    {
        $this->repository = new RegionRepository();

        $this->formRequest = RegionRequest::class;
        parent::__construct();
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
            MediaService::UploadMedia(
                $request->file('image'),
                $resource
            );
        }
        return $resource;
    }
}
