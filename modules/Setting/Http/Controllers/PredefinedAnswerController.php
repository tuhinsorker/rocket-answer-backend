<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Expert\Entities\ExpertCategory;
use Illuminate\Contracts\Support\Renderable;
use Modules\Setting\Entities\PredefinedAnswer;

class PredefinedAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        \cs_set('theme', [
            'title'       => 'Predefined Answer List',
            'description' => 'Creating new .'
        ]);

        return view('setting::answare.__list',[
            'predefined_answers' => PredefinedAnswer::with('category')->get(),
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
            'category_id' => 'required|unique:predefined_answers',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first()
            ]);
        }



        $answars = new PredefinedAnswer();

        $data = array(
            'answer_one'    =>$request->answer_one,
            'answer_two'    =>$request->answer_two,
            'answer_three'  =>$request->answer_three,
            'answer_four'   =>$request->answer_four,
            'answer_five'   =>$request->answer_five,
        );

        $data['category_id'] = $request->category_id;
        // return $data['phrase'] = json_encode($ans);

        $answars->fill($data);
        if($answars->save($data)){
            $response = array(
                'success'  =>true,
                'title' => 'Predefined Answer',
                'message'  => 'Added successfully'
            );
        }else{
            $response = array(
                'success'   => true,
                'title'     => 'Predefined Answer',
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
        $data  = PredefinedAnswer::where('id',$id)->first();
        $res = json_encode($data);
        return $res;
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
            'category_id' => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){

            return   json_encode([
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first()
            ]);

        }

        $pricing = PredefinedAnswer::findOrFail($id);

        $data = array(
            'answer_one'    => $request->answer_one,
            'answer_two'    => $request->answer_two,
            'answer_three'  => $request->answer_three,
            'answer_four'   => $request->answer_four,
            'answer_five'   => $request->answer_five,
        );

        $ans = array(
            'answer_one'    => $request->answer_one,
            'answer_two'    => $request->answer_two,
            'answer_three'  => $request->answer_three,
            'answer_four'   => $request->answer_four,
            'answer_five'   => $request->answer_five,
        );

        $data['category_id'] = $request->category_id;
        $data['phrase'] = json_encode($ans);
        $pricing->fill($data);

        if($pricing->save($data)){
            $response = array(
                'success'  =>true,
                'title' => 'Predefined Answer',
                'message'  => 'Update successfully'
            );
        }else{
            $response = array(
                'success'   => true,
                'title'     => 'Predefined Answer',
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
        
        $Pricing = PredefinedAnswer::findOrFail($id);
        $Pricing->delete();
        $response = array(
            'success'  =>true,
            'title' => 'Predefined Answer',
            'message'  => 'Delete successfully'
        );
        return json_encode($response);
    }
}
