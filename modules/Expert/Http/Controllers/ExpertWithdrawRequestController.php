<?php

namespace Modules\Expert\Http\Controllers;

use App\Traits\Common;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Expert\DataTables\ExpertDataTable;
use Modules\Expert\DataTables\ExpertWithdrawRequestDataTable;
use Modules\Expert\Entities\Expert;
use Modules\Expert\Entities\ExpertWithdrawRequest;

class ExpertWithdrawRequestController extends Controller
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
            'title' => 'Expert Withdraw Request Lists',
            'back' => \back_url(),
            'rprefix' => 'expert-withdraw-request',
        ]);
    }



    private function view_path($path)  {
        return 'expert::expert_withdraw_request.'.$path;
    }



    public function statusUpdate(Request $request) {

        if(! $request->ajax()) {
            return response()->error(null, 'Invalid Request', 400);
        }

        if($request->status == 2) {
            $request->validate([
                'status' => 'required|integer',
                'reject_note' => 'required|string',
            ]);
        }

        $expertWithDrawRequest = ExpertWithDrawRequest::find($request->id);
        
        if (! $expertWithDrawRequest) {
            return response()->error(null, 'Data Not Found', 404);
        }

        if($request->status == 2) {
            $expertWithDrawRequest->reject_note = $request->reject_note;
        }

        // if($request->status == 1) {

        //     $expertWithDrawRequest->approve_by = auth()->user()->id;
        //     $expertWithDrawRequest->approved_date = date('Y-m-d');
        //     $Addstatus = $this->expertBalanceDeduction($expertWithDrawRequest->expert_id,$expertWithDrawRequest->request_amount);
        // }
        $expertWithDrawRequest->is_approve = $request->status;
        
        $expertWithDrawRequest->save();

        return response()->success($expertWithDrawRequest, 'Data updated successfully.', 200);
    }



    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(ExpertWithdrawRequestDataTable $dataTable)
    {
        $experts = Expert::all();
        // return ExpertWithdrawRequest::with('expert','card_type','approve_by')->get();
        return $dataTable->render($this->view_path('index'), [
            'experts' => $experts
        ]);
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

        $expertWithDrawRequest = ExpertWithDrawRequest::create($data);

        return response()->success($expertWithDrawRequest, 'Data added successfully.', 201);
    }

    /**
     * Select the specified resource from database.
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        $expertWithDrawRequest = ExpertWithDrawRequest::find($request->id);
        if (! $expertWithDrawRequest) {
            return response()->error(null, 'Data Not Found', 404);
        }

        return response()->success($expertWithDrawRequest, 'Data fetched successfully.', 200);
    }


    public function show(Request $request)
    {
        $expertWithdrawRequest = ExpertWithDrawRequest::with('expert','card_type','approved_by')->find($request->id);
        if (! $expertWithdrawRequest) {
            return response()->error(null, 'Data Not Found', 404);
        }
        return view($this->view_path('show'), compact('expertWithdrawRequest'))->render();
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
        $expertWithDrawRequest = ExpertWithDrawRequest::find($data['id']);
        $expertWithDrawRequest->approve_by = auth()->user()->id;
        $expertWithDrawRequest->update($data);

        return response()->success($expertWithDrawRequest, 'Data updated successfully.', 200);
    }

    /**
     * Remove the specified resource from database.
     *
     * @return Response
     */
    public function destroy(ExpertWithdrawRequest $expertWithDrawRequest)
    {
        $expertWithDrawRequest->delete();
    }

}
