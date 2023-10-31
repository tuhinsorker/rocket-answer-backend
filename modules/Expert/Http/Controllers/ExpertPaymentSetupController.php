<?php

namespace Modules\Expert\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Expert\DataTables\ExpertPaymentSetupDataTable;
use Modules\Expert\Entities\ExpertPaymentSetup;

class ExpertPaymentSetupController extends Controller
{
     /**
     * Constructor for the controller.
     *
     * @return void
     */
    public function __construct()
    {
        \cs_set('theme', [
            'title' => 'Expert Payment Setup Lists',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Expert Payment Setup Lists',
                    'link' => false,
                ],
            ],
            'rprefix' => 'expert-payment-setup',
        ]);
    }

    private function view_path($path)  {
        return 'expert::expert_payment_setup.'.$path;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(ExpertPaymentSetupDataTable $dataTable)
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
            'expert_id' => 'required|unique:expert_payment_setups,expert_id',
            'pay_amount' => 'required|numeric',
            'second_pay_amount' => 'required|numeric',
        ], [
            'expert_id.unique' => 'Payment setup already exists for this expert.',
        ]);
        $data['rating_range']=$request->rating_range;

        $expertPaymentSetup = ExpertPaymentSetup::create($data);

        return response()->success($expertPaymentSetup, 'Data added successfully.', 201);
    }

    /**
     * Select the specified resource from database.
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        $expertPaymentSetup = ExpertPaymentSetup::find($request->id);
        if (! $expertPaymentSetup) {
            return response()->error(null, 'Data Not Found', 404);
        }

        return response()->success($expertPaymentSetup, 'Data fetched successfully.', 200);
    }

    /**
     * Update the specified resource in database.
     *
     * @return Response
     */
    public function update(Request $request)
    {

        $data = $request->validate([
            'expert_id' => 'required|unique:expert_payment_setups,expert_id',
            'pay_amount' => 'required|numeric',
            'second_pay_amount' => 'required|numeric',
        ], [
            'expert_id.unique' => 'Payment setup already exists for this expert.',
        ]);
        $data['rating_range']=$request->rating_range;


        $expertPaymentSetup = ExpertPaymentSetup::find($data['id']);

        $expertPaymentSetup->update($data);

        return response()->success($expertPaymentSetup, 'Data updated successfully.', 200);
    }

    /**
     * Remove the specified resource from database.
     *
     * @return Response
     */
    public function destroy(ExpertPaymentSetup $expertPaymentSetup)
    {
        $expertPaymentSetup->delete();
    }
}
