<?php

namespace Modules\Expert\Http\Controllers;

use App\Models\User;
use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Expert\Entities\Expert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Modules\Expert\DataTables\ExpertDataTable;
use Modules\Expert\DataTables\TopExpertDataTable;
use Modules\Expert\DataTables\LowestExpertDataTable;

class ExpertController extends Controller
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
            'title' => 'Expert Lists',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Expert Lists',
                    'link' => false,
                ],
            ],
            'rprefix' => 'expert',
        ]);
    }

    private function view_path($path)  {
        
        return 'expert::expert.'.$path;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(ExpertDataTable $dataTable)
    {
        
        $countries = DB::table('countries')->get();
        return $dataTable->render($this->view_path('index'),compact('countries'));
    }

    public function top_experts(TopExpertDataTable $dataTable)
    {
        \cs_set('theme', [
            'title' => 'Top Expert Lists',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Top Expert Lists',
                    'link' => false,
                ],
            ],
            'rprefix' => 'expert',
        ]);

        $countries = DB::table('countries')->get();
        return $dataTable->render($this->view_path('top_experts'),compact('countries'));
    }

    public function lowest_experts(LowestExpertDataTable $dataTable)
    {
        \cs_set('theme', [
            'title' => 'Lowest Rating Expert Lists',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Lowest Rating Expert Lists',
                    'link' => false,
                ],
            ],
            'rprefix' => 'expert',
        ]);

        $countries = DB::table('countries')->get();
        return $dataTable->render($this->view_path('top_experts'),compact('countries'));
    }




    public function show(Request $request, $id)
    {
        \cs_set('theme', [
            'title' => 'Expert',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Expert',
                    'link' => false,
                ],
            ],
            'rprefix' => 'expert',
        ]);
        $expert = Expert::with(['educations','documents', 'jobs'])->find($id);
        if (! $expert) {
            return response()->error(null, 'Data Not Found', 404);
        }

        $info =  $this->expertBalanceInfo($expert->user_id,$expert->category_id);
        $countries = DB::table('countries')->get();


        return view($this->view_path('show'), compact('expert', 'info','countries'));
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

        // $expert = Expert::create($data);

        // return response()->success($expert, 'Data added successfully.', 201);


        $validate = Validator::make($request->all(),
        [
            'first_name' => 'required',
            'last_name' => 'required',
            'display_name' => 'required',
            'phone' => 'required',
            'country_id' => 'required',
            'email'     => 'required|string|email|max:100|unique:users',
            'password'  => 'required|string|min:6',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first()
            ]);
        }


        try {

            DB::beginTransaction();

                $user = User::create([
                    'name'      => $request->first_name,
                    'user_name' => $request->first_name,
                    'email'     => $request->email,
                    'password'  => Hash::make($request->password),
                    'user_type'  => 3,
                ]);


                $expert = new Expert;
                $expert = $expert->fill($request->except('expert_id','password'));

                $expert['code']               = uniqueId('experts','EXP');
                $expert['user_id']            = $user->id;

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $destinationPath = 'uploads/';
                    $fileName = time().'_'.$file->getClientOriginalName();
                    $filePath = $file->storeAs($destinationPath, $fileName, 'public');
                    $expert['profile_photo_url'] = $filePath;

                    // $request->profile_photo_url_old ? Storage::delete($request->profile_photo_url_old) : null;
                }
                $expert->save();


              DB::commit();


            $response = array(
                'success'  =>true,
                'title'     =>'Expert',
                'message'  => 'Added successfully'
            );
            return json_encode($response);

        } catch( \Exception $e){

            $response = array(
                'success'  =>false,
                'title'     =>'Expert',
                'message'  => $e->getMessage()
            );
            return json_encode($response);
        }




    }

    /**
     * Select the specified resource from database.
     *
     * @return Response
     */
    public function edit(Request $request,$id)
    {

        $expert = Expert::find($id);
        if (! $expert) {
            return response()->error(null, 'Data Not Found', 404);
        }
        return json_encode($expert);

        // return response()->success($expert, 'Data fetched successfully.', 200);
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
        // $expert = Expert::find($data['id']);
        // $expert->update($data);

        // return response()->success($expert, 'Data updated successfully.', 200);



        $validate = Validator::make($request->all(),
        [
            'first_name' => 'required',
            'last_name' => 'required',
            'display_name' => 'required',
            'phone' => 'required',
            'country_id' => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first()
            ]);
        }

        $expert = Expert::find($request->expert_id);

        $data =  [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'full_name'=> $request->first_name.' '.$request->last_name,
            'display_name' => $request->display_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_id' => $request->country_id,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'expert_in_bio' => $request->expert_in_bio,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = 'uploads/';
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs($destinationPath, $fileName, 'public');
            $data['profile_photo_url'] = $filePath;

            $request->profile_photo_url_old ? Storage::delete($request->profile_photo_url_old) : null;
        }

        $expert->update($data);



            $title = 'Profile Updated';
            $body  = 'Your profile has been updated by admin';
            if($expert->status == 0){
                $body = 'Your profile has been pending by admin';
            }else if($expert->status == 1){
                $body = 'Your profile has been Activated by admin';
            }else if($expert->status == 2){
                $body = 'Your profile has been Suspended by admin';
            }


            set_push_notification($title,  $body, $expert->user_id, [
                'type'      => 'profile_update',
                'id'        => $expert->id,
                'name'      => $expert->full_name,
                'image'     => $expert->profile_photo_url,
                'status'    => $expert->status,
                "title"     => $title,
                "body"      => $body
            ]);


        $response = array(
            'success'  =>true,
            'title'     =>'Expert Profile',
            'message'  => 'Update successfully'
        );
        return json_encode($response);


    }

    /**
     * Remove the specified resource from database.
     *
     * @return Response
     */
    public function destroy(Expert $expert)
    {
        $expert->delete();
    }


    public function expertPendingSessions()
    {
        return view('expert::expert.__expert_pending_sessions');
    }

}
