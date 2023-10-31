<?php

namespace Modules\Expert\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Expert\Entities\Expert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Modules\Expert\Entities\ExpertEducations;
use Modules\Expert\DataTables\ExpertDataTable;
use Modules\Expert\DataTables\ExpertEducationDataTable;

class ExpertEducationController extends Controller
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
            'title' => 'Expert Education Lists',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Expert Education Lists',
                    'link' => false,
                ],
            ],
            'rprefix' => 'expert-education',
        ]);
    }

    private function view_path($path)  {
        return 'expert::expert_education.'.$path;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(ExpertEducationDataTable $dataTable)
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

        $validate = Validator::make($request->all(),
        [
            'degree' => 'required|string|between:2,100',
            'institute_name' => 'required',
            'pass_year' => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first() 
            ]);
        }

        $educations = new ExpertEducations;
        $educations = $educations->fill($request->except('education_id'));
        $educations->save();

        
        $response = array(
            'success'  =>true,
            'title'     =>'Education',
            'message'  => 'Added successfully'
        );
        return json_encode($response);
        
        
        // $data = $request->validate([
        //     'key' => 'required|string|max:255|unique:open_ai_creativity_levels,key',
        //     'name' => 'nullable|string|max:255',
        // ]);

        // return response()->success($expertEducations, 'Data added successfully.', 201);
    }

    /**
     * Select the specified resource from database.
     *
     * @return Response
     */
    public function edit($id)
    {
        $expertEducations = ExpertEducations::find($id);
        if (! $expertEducations) {
            return response()->error(null, 'Data Not Found', 404);
        }
        return json_encode($expertEducations);

        // return response()->success($expertEducations, 'Data fetched successfully.', 200);
    }

    /**
     * Update the specified resource in database.
     *
     * @return Response
     */
    public function update(Request $request)
    {
        // $data = $request->validate([
        //     'id' => 'required|exists:open_ai_creativity_levels,id',
        //     'key' => 'required|string|max:255|unique:open_ai_creativity_levels,key,'.$request->id.',id',
        //     'name' => 'nullable|string|max:255',

        // ]);
        // $expertEducations = ExpertEducations::find($data['id']);
        // $expertEducations->update($data);


        
        $validate = Validator::make($request->all(),
        [
            'degree' => 'required|string|between:2,100',
            'institute_name' => 'required',
            'pass_year' => 'required|max:4',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first() 
            ]);
        }

        $data = array(
            'degree'        => $request->degree,
            'institute_name'=> $request->institute_name,
            'pass_year'     => $request->pass_year,
        );
    
        ExpertEducations::where('id',$request->education_id)->update($data);
        
        
        $response = array(
            'success'  =>true,
            'title'     =>'Education',
            'message'  => 'Update successfully'
        );
        return json_encode($response);


        // return response()->success($expertEducations, 'Data updated successfully.', 200);
    }

    /**
     * Remove the specified resource from database.
     *
     * @return Response
     */
    public function destroy(ExpertEducations $expertEducations)
    {
        $expertEducations->delete();
         
        $response = array(
            'success'  =>true,
            'title'     =>'Education',
            'message'  => 'Delete successfully'
        );
        return json_encode($response);
    }

}
