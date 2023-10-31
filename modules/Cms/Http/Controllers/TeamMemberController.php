<?php

namespace Modules\Cms\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Expert\Entities\Expert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Modules\Cms\DataTables\TeamMemberDataTable;
use Modules\Cms\Entities\TeamMembers;
use Modules\Expert\Entities\ExpertEducations;
use Modules\Expert\DataTables\ExpertDataTable;
use Modules\Expert\DataTables\ExpertEducationDataTable;

class TeamMemberController extends Controller
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
            'title' => 'Team Member List',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Team Member List',
                    'link' => false,
                ],
            ],
            'rprefix' => 'cms.team-member',
        ]);
    }

    private function view_path($path)  {
        return 'cms::team_member.'.$path;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(TeamMemberDataTable $dataTable)
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

        // return $request->all();
        $validate = Validator::make($request->all(),
        [
            'name' => 'required|string|between:2,100',
            'designation' => 'required',
            'profile' => 'required',
            'fb' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',

        ],[
            'name.required' => 'Name is required',
            'designation.required' => 'Designation is required',
            'profile.required' => 'Profile image is required',
            'fb.required' => 'Facebook url is required',
            'twitter.required' => 'Twitter url is required',
            'linkedin.required' => 'Linkedin url is required']);


        if($validate->fails()){
            return   json_encode([
                'success'  => false,
                'title'     =>'Team Member',
                'message'  => $validate->errors()->first()
            ]);
        }

        $educations = new TeamMembers();
        $educations->fill($request->all());
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $destinationPath = 'teams';
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs($destinationPath, $fileName, 'public');
            $educations['profile'] = $filePath;
        }
        $educations->save();


        $response = array(
            'success'  =>true,
            'title'     =>'Team Member',
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
        $expertEducations = TeamMembers::find($id);
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

        $validate = Validator::make($request->all(),
        [
            'name' => 'required|string|between:2,100',
            'designation' => 'required',
            'fb' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',

        ],[
            'name.required' => 'Name is required',
            'designation.required' => 'Designation is required',
            'fb.required' => 'Facebook url is required',
            'twitter.required' => 'Twitter url is required',
            'linkedin.required' => 'Linkedin url is required']);


        if($validate->fails()){
            return   json_encode([
                'success'  => false,
                'title'     =>'Team Member',
                'message'  => $validate->errors()->first()
            ]);
        }

        $data = array(
            'name'          => $request->name,
            'designation'   => $request->designation,
            'fb'            => $request->fb,
            'twitter'       => $request->twitter,
            'linkedin'      => $request->linkedin,
            'is_active'     => $request->is_active,



        );

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $destinationPath = 'teams';
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs($destinationPath, $fileName, 'public');
            $data['profile'] = $filePath;
        }

        TeamMembers::where('id',$request->id)->update($data);


        $response = array(
            'success'  =>true,
            'title'     =>'Team Member',
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
    public function destroy(Request $request)
    {
        $teamMembers = TeamMembers::find($request->id);
        $teamMembers->delete();

        $response = array(
            'success'  =>true,
            'title'     =>'Team Member',
            'message'  => 'Delete successfully'
        );
        return json_encode($response);
    }

}
