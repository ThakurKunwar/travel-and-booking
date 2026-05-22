<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Repositories\PackageRepository;
use Illuminate\Http\Request;
use Override;

class PackageController extends BaseController
{
    //
    public function __construct()
    {
        $this->repository = new PackageRepository();
        parent::__construct();
    }
    #[Override]
    public function withShow($resource): array
    {
        return
            [
                'reviews' => $resource->reviews()->with('user')->get()
            ];
    }
}
