<?php

namespace Modules\Expert\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Expert\DataTables\ExpertDataTable;
use Modules\Expert\DataTables\ExpertPayAccountDataTable;
use Modules\Expert\Entities\Expert;
use Modules\Expert\Entities\ExpertPayAccount;

class ExpertPayAccountController extends Controller
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
            'title' => 'Expert Pay Account Lists',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Expert Pay Account Lists',
                    'link' => false,
                ],
            ],
            'rprefix' => 'expert-pay-account',
        ]);
    }

    private function view_path($path)  {
        return 'expert::expert_pay_account.'.$path;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(ExpertPayAccountDataTable $dataTable)
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
            'key' => 'required|string|max:255|unique:open_ai_creativity_levels,key',
            'name' => 'nullable|string|max:255',
        ]);

        $expertPayAccount = ExpertPayAccount::create($data);

        return response()->success($expertPayAccount, 'Data added successfully.', 201);
    }

    /**
     * Select the specified resource from database.
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        $expertPayAccount = ExpertPayAccount::find($request->id);
        if (! $expertPayAccount) {
            return response()->error(null, 'Data Not Found', 404);
        }

        return response()->success($expertPayAccount, 'Data fetched successfully.', 200);
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
        $expertPayAccount = ExpertPayAccount::find($data['id']);
        $expertPayAccount->update($data);

        return response()->success($expertPayAccount, 'Data updated successfully.', 200);
    }

    /**
     * Remove the specified resource from database.
     *
     * @return Response
     */
    public function destroy(ExpertPayAccount $expertPayAccount)
    {
        $expertPayAccount->delete();
    }

}
