<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Expert\Entities\ExpertCategory;
use Modules\Setting\DataTables\PaymentMethodDataTable;
use Modules\Setting\Entities\PaymentMethods;

class PaymentMethodController extends Controller
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
            'title' => 'Payment Method',
            'back' => \back_url(),
            'rprefix' => 'admin.setting.payment-method',
        ]);
    }

    private function view_path($path)  {
        return 'setting::payment_method.'.$path;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(PaymentMethodDataTable $dataTable)
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
            'name' => 'required|string|max:255',
            'client_id' => 'nullable|string',
            'client_secret' => 'nullable|string',
            'username' => 'nullable|string',
            'password' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);
        $data['is_active'] = $request->is_active ? 1 : 0;

        $paymentMethod = PaymentMethods::create($data);

        return response()->success($paymentMethod, 'Data added successfully.', 201);
    }

    /**
     * Select the specified resource from database.
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        $paymentMethod = PaymentMethods::find($request->id);
        if (! $paymentMethod) {
            return response()->error(null, 'Data Not Found', 404);
        }

        return response()->success($paymentMethod, 'Data fetched successfully.', 200);
    }

    /**
     * Update the specified resource in database.
     *
     * @return Response
     */
    public function update(Request $request)
    {

        $data = $request->validate([
            'id' => 'required|exists:payment_methods,id',
            'name' => 'required|string|max:255',
            'client_id' => 'nullable|string',
            'client_secret' => 'nullable|string',
            'username' => 'nullable|string',
            'password' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->is_active ? 1 : 0;
        $paymentMethod = PaymentMethods::find($data['id']);
        $paymentMethod->update($data);


        $sdata['STRIPE_KEY'] = $request->client_id;
        $sdata['STRIPE_SECRET'] = $request->client_secret;
        
        writeEnvFile($sdata);

        return response()->success($paymentMethod, 'Data updated successfully.', 200);
    }

    /**
     * Remove the specified resource from database.
     *
     * @return Response
     */
    public function destroy(PaymentMethods $paymentMethods)
    {

        $paymentMethods->delete();
    }

}
