<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;

class BlogController extends BaseController
{
    //
    public function __construct()
    {
        $this->repository = new BlogRepository();
        parent::__construct();
    }
}
