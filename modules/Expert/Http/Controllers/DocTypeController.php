<?php

namespace Modules\Expert\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Expert\DataTables\DocTypeDataTable;
use Modules\Expert\DataTables\ExpertDataTable;
use Modules\Expert\Entities\DocType;
use Modules\Expert\Entities\Expert;

class DocTypeController extends Controller
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
            'title' => 'Expert Doc Type Lists',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Expert Doc Type Lists',
                    'link' => false,
                ],
            ],
            'rprefix' => 'expert-doc-type',
        ]);
    }

    private function view_path($path)  {
        return 'expert::doc_type.'.$path;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(DocTypeDataTable $dataTable)
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
            'is_active' => 'nullable|boolean',
        ]);
        $data['is_active'] = $request->is_active ? 1 : 0;

        $openAiCreativityLevel = DocType::create($data);

        return response()->success($openAiCreativityLevel, 'Data added successfully.', 201);
    }

    /**
     * Select the specified resource from database.
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        $openAiCreativityLevel = DocType::find($request->id);
        if (! $openAiCreativityLevel) {
            return response()->error(null, 'Data Not Found', 404);
        }

        return response()->success($openAiCreativityLevel, 'Data fetched successfully.', 200);
    }

    /**
     * Update the specified resource in database.
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:doc_types,id',
            'name' => 'required|string|max:255',
            'is_active' => 'nullable|boolean',

        ]);

        $data['is_active'] = $request->is_active ? 1 : 0;

        $expertCategory = DocType::find($data['id']);

        $expertCategory->update($data);

        return response()->success($expertCategory, 'Data updated successfully.', 200);
    }

    /**
     * Remove the specified resource from database.
     *
     * @return Response
     */
    public function destroy(DocType $expertCategory)
    {
        $expertCategory->delete();
    }

}
