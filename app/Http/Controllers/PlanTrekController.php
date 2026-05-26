<?php

namespace App\Http\Controllers;

use App\Models\PlanTrek;
use App\Models\Region;

use Illuminate\Http\Request;

class PlanTrekController extends Controller
{
    public function create()
    {
        $regions = Region::where('is_active', true)->get();
        return view('plan-trek.create', compact('regions'));
    }
    public function store(Request $request)
    {

        $data = $request->validate([
            'region_id' => ['required', 'exists:regions,id'],
            'full_name' => ['required', 'string'],
            'no_of_travellers' => ['required', 'integer', 'min:1'],
            'email' => ['required', 'email'],
            'country' => ['required', 'string'],
            'phone' => ['nullable', 'string'],
            'preferable_date' => ['nullable', 'date', 'after:today'],
            'special_requests' => ['nullable', 'string'],
        ]);

        PlanTrek::create($data);
        return redirect()->back()->with('success', 'inquiry submitted :) we will contact you as soon as possible.');
    }
}
