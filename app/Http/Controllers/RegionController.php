<?php

namespace App\Http\Controllers;

use App\Repositories\RegionRepository;
use Illuminate\Database\Eloquent\Model;
use Override;

class RegionController extends BaseController
{
    //
    public function __construct(RegionRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->with(['media']);
        parent::__construct();
    }
    #[Override]
    public function withShow($resource): array
    {
        return [
            'packages' => $resource->packages
        ];
    }
}
