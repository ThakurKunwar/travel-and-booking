<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Repositories\ReviewRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Override;

class ReviewController extends BaseController
{

    protected $formRequest = StoreReviewRequest::class;

    public function __construct()
    {
        $this->repository = new ReviewRepository();
        parent::__construct();
    }
    #[Override]
    public function destroy($id)
    {

        $review = $this->repository->findOrFail($id);

        if ($review->user_id !== auth()->id()) {
            abort(403);
        }
        $this->repository->delete($id);

        return redirect()->back()->with('success', 'Review Deleted!');
    }
    #[Override]
    public function processStoreData(FormRequest $request)
    {

        return array_merge($request->validated(), [
            'user_id'    => auth()->id(),
            'package_id' => request()->route('package'),
        ]);
    }
    public function store()
    {
        $request = app($this->formRequest);

        $this->repository->create($this->processStoreData($request));

        return redirect()->back()->with('success', 'review submitted!');
    }
}
