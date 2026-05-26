<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlanTrek;
use App\Repositories\PlanTrekRepository;


class PlanTrekController extends Controller
{
    protected $repository;
    public function __construct()
    {
        $this->repository = new PlanTrekRepository;
    }
    public function index()
    {
        return view('admin.plan-treks.index');
    }
    public function show(PlanTrek $planTrek) {}
    public function destroy(PlanTrek $planTrek) {}
}
