<?php

namespace Modules\Expert\Http\Controllers;

use App\Traits\Common;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Expert\DataTables\ExpertCategoryDataTable;
use Modules\Expert\DataTables\ExpertDataTable;
use Modules\Expert\Entities\Expert;
use Modules\Expert\Entities\ExpertCategory;

class ExpertCategoryController extends Controller
{
    use Common;
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
            'title' => 'Category Lists',
            'back' => \back_url(),
            'rprefix' => 'expert-category',
        ]);
    }

    private function view_path($path)  {
        return 'expert::expert-category.'.$path;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(ExpertCategoryDataTable $dataTable)
    {
        return $dataTable->render($this->view_path('index'));
    }

    /**
     * Store a newly created resource in database.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name'      => 'required|string|string|unique:expert_categories',
            'icon_path' => 'required|image|max:2048|mimes:jpeg,png,jpg,svg,webp',
            'is_active' => 'nullable|boolean',
        ]);

  

        try {

            $data['code'] = uniqueId('expert_categories','CAT-');

            $data['is_active'] = $request->is_active ? 1 : 0;
            $data['icon_path'] = \upload_file($request,'icon_path', 'expert_category');
            $data['image_path'] = \upload_file($request,'image_path', 'expert_category');

            $data['payment_amount']     = $request->payment_amount;
            $data['second_pay_amount']  = $request->second_pay_amount;
            $data['rating_range']       = $request->rating_range;

            //product crate to stripe
            $data['stripe_code'] = $this->productCreateToStripe($data);

            

            $expertCategory = ExpertCategory::create($data);

            return response()->success($expertCategory, 'Data added successfully.', 201);

        } catch( \Exception $e){
            return sendErrorResponse($e->getMessage(),'Something Went Wrong!',500);
        }
    }

    /**
     * Select the specified resource from database.
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        $expertCategory = ExpertCategory::find($request->id);
        if (! $expertCategory) {
            return response()->error(null, 'Data Not Found', 404);
        }

        return response()->success($expertCategory, 'Data fetched successfully.', 200);
    }

    /**
     * Update the specified resource in database.
     *
     * @return Response
     */
    public function update(Request $request)
    {

        $data = $request->validate([
            'id' => 'required|exists:expert_categories,id',
            'name' => 'required|string|max:255',
            'icon_path' => 'image|mimes:jpeg,png,jpg,svg,webp',
            'is_active' => 'nullable|boolean',

        ]);

        try {

            $data['payment_amount']     = $request->payment_amount;
            $data['second_pay_amount']  = $request->second_pay_amount;
            $data['rating_range']       = $request->rating_range;


            $data['is_active'] = $request->is_active ? 1 : 0;

            $expertCategory = ExpertCategory::find($data['id']);

            $data['icon_path'] = \upload_file($request,'icon_path', 'expert_category',$expertCategory->icon_path);

            $data['image_path'] = \upload_file($request,'image_path', 'expert_category',$expertCategory->image_path);

            $expertCategory->update($data);

            // $data['code'] = $expertCategory->stripe_code;
            // $this->productUpdateToStripe($data);

            return response()->success($expertCategory, 'Data updated successfully.', 200);

        } catch( \Exception $e){
            return sendErrorResponse($e->getMessage(),'Something Went Wrong!',500);
        }
    }

    /**
     * Remove the specified resource from database.
     *
     * @return Response
     */
    public function destroy(ExpertCategory $expertCategory)
    {
      // delete the logo if exists
      if ($expertCategory->icon_path) {
        \delete_file($expertCategory->icon_path);
        }
        $expertCategory->delete();
    }

}
