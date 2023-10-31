<?php

namespace Modules\Expert\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Expert\Entities\Expert;
use Modules\Expert\Entities\ExpertJob;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Modules\Expert\DataTables\ExpertDataTable;
use Modules\Expert\DataTables\ExpertJobDataTable;

class ExpertJobController extends Controller
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
            'title' => 'Expert Job Lists',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Expert Job Lists',
                    'link' => false,
                ],
            ],
            'rprefix' => 'expert-job',
        ]);
    }

    private function view_path($path)  {
        return 'expert::expert_job.'.$path;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(ExpertJobDataTable $dataTable)
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
        // $data = $request->validate([
        //     'key' => 'required|string|max:255|unique:open_ai_creativity_levels,key',
        //     'name' => 'nullable|string|max:255',
        // ]);

        // $expertJob = ExpertJob::create($data);

        // return response()->success($expertJob, 'Data added successfully.', 201);


        $validate = Validator::make($request->all(),
        [
            'company_name' => 'required',
            'designation' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'employer_name' => 'required',
            'employer_number' => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first() 
            ]);
        }

        $jobs = new ExpertJob;
        $jobs = $jobs->fill($request->except('job_id'));
        $jobs->save();


        $response = array(
            'success'  =>true,
            'title'     =>'Expert Job',
            'message'  => 'Added successfully'
        );
        return json_encode($response);



    }

    /**
     * Select the specified resource from database.
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        $expertJob = ExpertJob::find($request->id);
        if (! $expertJob) {
            return response()->error(null, 'Data Not Found', 404);
        }
        return json_encode($expertJob);

        // return response()->success($expertJob, 'Data fetched successfully.', 200);
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
        // $expertJob = ExpertJob::find($data['id']);
        // $expertJob->update($data);
        // return response()->success($expertJob, 'Data updated successfully.', 200);

        $validate = Validator::make($request->all(),
        [
            'company_name' => 'required',
            'designation' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'employer_name' => 'required',
            'employer_number' => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first() 
            ]);
        }


        $data =  [
            'company_name' => $request->company_name,
            'designation' => $request->designation,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'employer_name' => $request->employer_name,
            'employer_number' => $request->employer_number,
        ];

        ExpertJob::where('id',$request->job_id)->update($data);
        
        $response = array(
            'success'  =>true,
            'title'     =>'Expert Job',
            'message'  => 'Update successfully'
        );
        return json_encode($response);


    }

    /**
     * Remove the specified resource from database.
     *
     * @return Response
     */
    public function destroy(ExpertJob $expertJob)
    {
        $expertJob->delete();
        $response = array(
            'success'  =>true,
            'title'     =>'Expert Job',
            'message'  => 'Update successfully'
        );
        return json_encode($response);
    }

}
