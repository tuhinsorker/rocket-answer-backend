<?php

namespace Modules\Expert\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Expert\DataTables\ExpertDataTable;
use Modules\Expert\DataTables\ExpertSubCategoryDataTable;
use Modules\Expert\Entities\Expert;
use Modules\Expert\Entities\ExpertCategory;
use Modules\Expert\Entities\ExpertSubCategory;

class ExpertSubcategoryController extends Controller
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
            'title' => 'Subcategory Lists',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Expert Sub Category Lists',
                    'link' => false,
                ],
            ],
            'rprefix' => 'expert-sub-category',
        ]);
    }

    private function view_path($path)  {
        return 'expert::expert-sub-category.'.$path;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(ExpertSubCategoryDataTable $dataTable)
    {
        // with categories
        $categories = ExpertCategory::where('is_active', 1)->get();
        return $dataTable->render($this->view_path('index'), compact('categories'));
    }


    /**
     * Store a newly created resource in database.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'expert_category_id' => 'required|exists:expert_categories,id',
            'icon_path' => 'required|image|max:2048|mimes:jpeg,png,jpg',
            'is_active' => 'nullable|boolean',
        ]);
        $data['is_active'] = $request->is_active ? 1 : 0;
        $data['icon_path'] = \upload_file($request,'icon_path', 'expert_category');

        $expertSubCategory = ExpertSubCategory::create($data);

        return response()->success($expertSubCategory, 'Data added successfully.', 201);
    }

    /**
     * Select the specified resource from database.
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        $expertSubCategory = ExpertSubCategory::find($request->id);
        if (! $expertSubCategory) {
            return response()->error(null, 'Data Not Found', 404);
        }

        return response()->success($expertSubCategory, 'Data fetched successfully.', 200);
    }

    /**
     * Update the specified resource in database.
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:expert_sub_categories,id',
            'name' => 'required|string|max:255',
            'expert_category_id' => 'required|exists:expert_categories,id',
            'icon_path' => 'nullable|image|max:2048|mimes:jpeg,png,jpg',
            'is_active' => 'nullable|boolean',

        ]);

        $data['is_active'] = $request->is_active ? 1 : 0;

        $expertSubCategory = ExpertSubCategory::find($data['id']);

        $data['icon_path'] = \upload_file($request,'icon_path', 'expert_category',$expertSubCategory->icon_path);

        $expertSubCategory->update($data);

        return response()->success($expertSubCategory, 'Data updated successfully.', 200);
    }

    /**
     * Remove the specified resource from database.
     *
     * @return Response
     */
    public function destroy(ExpertSubCategory $expertSubCategory)
    {
      // delete the logo if exists
      if ($expertSubCategory->icon_path) {
        \delete_file($expertSubCategory->icon_path);
    }
        $expertSubCategory->delete();
    }

}
