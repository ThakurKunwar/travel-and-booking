<?php

namespace App\Repositories;

use App\Models\Package;

class PackageRepository extends BaseRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
        $this->model = new Package();
        $this->with(['media', 'region']);
        parent::__construct();
    }
}
