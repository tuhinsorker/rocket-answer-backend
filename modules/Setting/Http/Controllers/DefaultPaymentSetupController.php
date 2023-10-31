<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\DefaultPaymentSetup;

class DefaultPaymentSetupController extends Controller
{

     /**
     * Constructor for the controller.
     *
     * @return void
     */
    public function __construct()
    {
        \cs_set('theme', [
            'title' => 'Expert Payment Default Setup '
        ]);
    }

    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('setting::default_payment_setup.index',['setup'=>DefaultPaymentSetup::first()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('setting::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'payment_amount' => 'required|string|max:255',
            'second_pay_amount' => 'required',
            'rating_range' => 'required',

        ]);
        $paymentMethod = DefaultPaymentSetup::find($id);
        $paymentMethod->update($data);

        return response()->success($paymentMethod, 'Data updated successfully.', 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
