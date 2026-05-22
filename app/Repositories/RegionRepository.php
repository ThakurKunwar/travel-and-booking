<?php

namespace App\Repositories;

use App\Models\Region;

class RegionRepository extends BaseRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
        $this->model = new Region();
        $this->with(['media']);
        parent::__construct();
    }
}
