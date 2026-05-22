<?php

namespace App\Repositories;

use App\Models\Blog;

class BlogRepository extends BaseRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
        $this->model = new Blog();
        parent::__construct();
    }
}
