<?php

namespace Modules\Expert\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Customer\Entities\Customers;
use Modules\Expert\DataTables\ExpertDataTable;
use Modules\Expert\DataTables\ExpertReviewDataTable;
use Modules\Expert\Entities\Expert;
use Modules\Expert\Entities\ExpertReview;

class ExpertReviewController extends Controller
{
      /**
     * Constructor for the controller.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth', 'verified', 'permission:openai_creativity_level_management']);
        // $this->middleware('request:ajax', ['only' => ['store', 'update', 'destroy', 'edit']]);
        // $this->middleware('strip_scripts_tag')->only(['store', 'update']);
        \cs_set('theme', [
            'title' => 'Expert Review Lists',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Expert Review Lists',
                    'link' => false,
                ],
            ],
            'rprefix' => 'expert-review',
        ]);
    }

    private function view_path($path)  {
        return 'expert::expert_review.'.$path;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(ExpertReviewDataTable $dataTable)
    {
        $experts = Expert::get();
        $customers = Customers::get();
        return $dataTable->render($this->view_path('index'), compact('experts', 'customers'));
    }

    /**
     * Store a newly created resource in database.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'key' => 'required|string|max:255|unique:open_ai_creativity_levels,key',
            'name' => 'nullable|string|max:255',
        ]);

        $expertReview = ExpertReview::create($data);

        return response()->success($expertReview, 'Data added successfully.', 201);
    }

    /**
     * Select the specified resource from database.
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        $expertReview = ExpertReview::find($request->id);
        if (! $expertReview) {
            return response()->error(null, 'Data Not Found', 404);
        }

        return response()->success($expertReview, 'Data fetched successfully.', 200);
    }

    /**
     * Update the specified resource in database.
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:open_ai_creativity_levels,id',
            'key' => 'required|string|max:255|unique:open_ai_creativity_levels,key,'.$request->id.',id',
            'name' => 'nullable|string|max:255',

        ]);
        $expertReview = ExpertReview::find($data['id']);
        $expertReview->update($data);

        return response()->success($expertReview, 'Data updated successfully.', 200);
    }

    /**
     * Remove the specified resource from database.
     *
     * @return Response
     */
    public function destroy(ExpertReview $expertReview)
    {
        $expertReview->delete();
    }

}
