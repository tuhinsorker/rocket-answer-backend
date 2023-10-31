<?php

namespace Modules\Subcription\Http\Controllers;

use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Subcription\Entities\Pricing;
use Modules\Expert\Entities\ExpertCategory;
use Illuminate\Contracts\Support\Renderable;

class PricingController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        \cs_set('theme', [
            'title'       => 'Pricing List',
            'description' => 'Creating new Pricing.'
        ]);

        return view('subcription::pricing.__list',[
            'pricings' => Pricing::with('category')->get(),
            'categories' => ExpertCategory::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('subcription::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {


        $validate = Validator::make($request->all(),
        [
            'trial_price' => 'required',
            'trial_day' => 'required',
            'recurring_price' => 'required',
            'recurring_day' => 'required',
            'category_id'     => 'required|unique:pricings',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first()
            ]);
        }

        $pricing = new Pricing();

        $input = $request->all();
        $input = $request->except(['_token', '_method','id']);
        
        $input['stripe_price_id'] = $this->pricSetToStripe($request->all(),'');
        $pricing->fill($input);

        if($pricing->save($input)){
            $response = array(
                'success'  =>true,
                'title' => 'Pricing',
                'message'  => 'Added successfully'
            );
        }else{
            $response = array(
                'success'   => true,
                'title'     => 'Pricing',
                'message'   => 'Oops! Something went wrong, Please try again'
            );
        }

        return json_encode($response);

        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('subcription::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data  = Pricing::where('id',$id)->first();
        return json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {

        $validate = Validator::make($request->all(),
        [
            'trial_price'       => 'required',
            'trial_day'         => 'required',
            'recurring_price'   => 'required',
            'recurring_day'     => 'required',
            'category_id'       => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first()
            ]);
        }


        $pricing = Pricing::findOrFail($id);
        $input = $request->all();
        $input = $request->except(['_token', '_method','id']);
        // $input['stripe_price_id'] = $this->pricSetToStripe($request->all(),$pricing->stripe_price_id);
        $pricing->fill($input);

        if($pricing->save($input)){
            $response = array(
                'success'  =>true,
                'title' => 'Pricing',
                'message'  => 'Update successfully'
            );
        }else{
            $response = array(
                'success'   => true,
                'title'     => 'Pricing',
                'message'   => 'Oops! Something went wrong, Please try again'
            );
        }

        return json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        
        $Pricing = Pricing::findOrFail($id);
        $Pricing->delete();
        $response = array(
            'success'  =>true,
            'title' => 'Pricing',
            'message'  => 'Delete successfully'
        );
        return json_encode($response);
    }

    
}
