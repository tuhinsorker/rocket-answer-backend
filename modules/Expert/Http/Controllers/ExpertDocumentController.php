<?php

namespace Modules\Expert\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Expert\Entities\Expert;
use Illuminate\Support\Facades\Validator;
use Modules\Expert\Entities\ExpertDocument;
use Illuminate\Contracts\Support\Renderable;
use Modules\Expert\DataTables\ExpertDataTable;
use Modules\Expert\DataTables\ExpertDocumentDataTable;

class ExpertDocumentController extends Controller
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
            'title' => 'Expert Document Lists',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Expert Document Lists',
                    'link' => false,
                ],
            ],
            'rprefix' => 'expert-document',
        ]);
    }

    private function view_path($path)  {
        return 'expert::expert_document.'.$path;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(ExpertDocumentDataTable $dataTable)
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

        $validate = Validator::make($request->all(),
        [
            'doc_type_id' => 'required',
            'doc_number' => 'required',
            'doc_valid_date' => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first() 
            ]);
        }

        $document = new ExpertDocument;
        $document = $document->fill($request->except('document_id'));

        if ($request->hasFile('doc_path')) {
            $file = $request->file('doc_path');
            $destinationPath = 'doc/';
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs($destinationPath, $fileName, 'public');
            $document['doc_path'] = $filePath;
        }
        $document->save();

        
        $response = array(
            'success'  =>true,
            'title'     =>'Document',
            'message'  => 'Added successfully'
        );
        return json_encode($response);
        

        
        // $data = $request->validate([
        //     'key' => 'required|string|max:255|unique:open_ai_creativity_levels,key',
        //     'name' => 'nullable|string|max:255',
        // ]);

        // $expertDocument = ExpertDocument::create($data);

        // return response()->success($expertDocument, 'Data added successfully.', 201);
    }

    /**
     * Select the specified resource from database.
     *
     * @return Response
     */
    public function edit(Request $request,$id)
    {
        $expertDocument = ExpertDocument::find($id);
        if (! $expertDocument) {
            return response()->error(null, 'Data Not Found', 404);
        }
        return json_encode($expertDocument);
        // return response()->success($expertDocument, 'Data fetched successfully.', 200);
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
            'doc_type_id' => 'required',
            'doc_number' => 'required',
            'doc_valid_date' => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first() 
            ]);
        }


        $data = array(
            'doc_type_id'        => $request->doc_type_id,
            'doc_number'        => $request->doc_number,
            'doc_valid_date'     => $request->doc_valid_date,
        );
        

        if ($request->hasFile('doc_path')) {

            $file = $request->file('doc_path');
            $destinationPath = 'doc/';
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs($destinationPath, $fileName, 'public');
            $data['doc_path'] = $filePath;
        }
    
        ExpertDocument::where('id',$request->document_id)->update($data);
        
        $response = array(
            'success'  =>true,
            'title'     =>'Document',
            'message'  => 'Update successfully'
        );
        return json_encode($response);


        // $data = $request->validate([
        //     'id' => 'required|exists:open_ai_creativity_levels,id',
        //     'key' => 'required|string|max:255|unique:open_ai_creativity_levels,key,'.$request->id.',id',
        //     'name' => 'nullable|string|max:255',

        // ]);
        // $expertDocument = ExpertDocument::find($data['id']);
        // $expertDocument->update($data);

        // return response()->success($expertDocument, 'Data updated successfully.', 200);
    }

    /**
     * Remove the specified resource from database.
     *
     * @return Response
     */
    public function destroy(ExpertDocument $expertDocument)
    {
        $expertDocument->delete();
        $response = array(
            'success'  =>true,
            'title'     =>'Document',
            'message'  => 'Delete successfully'
        );
        return json_encode($response);
    }

}
