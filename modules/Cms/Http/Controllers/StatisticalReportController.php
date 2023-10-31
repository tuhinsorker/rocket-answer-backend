<?php

namespace Modules\Cms\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Currency;
use Modules\EkoAdmin\Entities\Industry;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Modules\Cms\Entities\StatisticalReport;
use Illuminate\Contracts\Support\Renderable;

class StatisticalReportController extends Controller
{


    public function index()
    {
        return view('cms::staticalreport.__statical_report',[
            'reports' => StatisticalReport::with('industry')->paginate(15),
            'industries' => Industry::all(),
            'currencies'    => Currency::all(),

        ]);
    }


    public function create()
    {
        return view('cms::create');
    }


    public function store(Request $request)
    {

        $validate = Validator::make($request->all(),
        [
            'research_title' => 'required|string|between:2,100',
            // 'total_cost' => 'required|numeric',
            'report_image' => 'image|mimes:jpeg,png,jpg,gif',
            'report_doc' => 'file|mimes:PDF,pdf,docx,jpeg,png,jpg',
            // 'about_report' => 'required',
            // 'spent_cost'=>'required|numeric',
            // 'currency_id'=>'required',
            // 'academician'=>'required',
            // 'lead_professor'=>'required',
            // 'patent_level'=>'required',
            // 'project_stage'=>'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){

            return   json_encode([  
                'success'   => false,
                'title'     =>'Report',
                'message'   => $validate->errors()->first() 
            ]);
        }


        $reportdata = array(
            'research_title'   =>  $request->research_title,
            'total_cost'       =>  ($request->total_cost?$request->total_cost:0),
            'about_report'     =>  $request->about_report,
            'industry_id'      =>  $request->industry,
            'spent_cost'       =>  $request->spent_cost,
            'currency_id'       => $request->currency_id,
            'academician'      =>  $request->academician,
            'lead_professor'   =>  $request->lead_professor,
            'patent_level'     =>  $request->patent_level,
            'project_stage'    =>  $request->project_stage,
            'type_of_researcher'=> $request->type_of_researcher
        );

       
        if ($request->file('report_image')) {
            
            $request_file = $request->file('report_image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('report_image', $filename, 'public');
            $reportdata['report_image']    = $path;

        }else{
            $reportdata['report_image']    = '';
        }


        if ($request->file('report_doc')) {

            $request_file = $request->file('report_doc');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('report_doc', $filename, 'public');
            $reportdata['report_doc']    = $path;

        }else{
            $reportdata['report_doc']    = '';
        }



        if(StatisticalReport::create($reportdata)){

            $response = array(
                'success'  =>true,
                'title'     =>'Report',
                'message'  => 'Added successfully'
            );
        }else{
            $response = array(
                'success'   => true,
                'title'     =>'Report',
                'message'   => 'Oops! Something went wrong, Please try again'
            );
        }

        return json_encode($response);
       
    }


    public function show($id)
    {
        return view('cms::show');
    }


    public function edit($id)
    {

        $data =  StatisticalReport::firstWhere('id',$id);
        return json_encode($data);

    }


    public function update(Request $request, $id)
    {

        $validate = Validator::make($request->all(),
        [
            'research_title' => 'required|string|between:2,100',
            // 'total_cost' => 'required|numeric',
            'report_image' => 'image|mimes:jpeg,png,jpg,gif',
            'report_doc' => 'file|mimes:PDF,pdf,docx,jpeg,png,jpg',
            // 'about_report' => 'required',
            // 'spent_cost'=>'required|numeric',
            // 'currency_id'=>'required',
            // 'academician'=>'required',
            // 'lead_professor'=>'required',
            // 'patent_level'=>'required',
            // 'project_stage'=>'required',
        ],
        ['required' => ':attribute is required']);



        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first() 
            ]);
        }


        $reportdata = array(
            'research_title'     =>  $request->research_title,
            'total_cost'       =>  ($request->total_cost?$request->total_cost:0),
            'about_report'      =>  $request->about_report,
            'industry_id'      =>  $request->industry,
            'spent_cost'       =>  $request->spent_cost,
            'currency_id'=>$request->currency_id,
            'academician'      =>  $request->academician,
            'lead_professor'   =>  $request->lead_professor,
            'patent_level'     =>  $request->patent_level,
            'project_stage'    =>  $request->project_stage,
            'type_of_researcher'=> $request->type_of_researcher
        );

       
        if ($request->file('report_image')) {
            
            $request_file = $request->file('report_image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('report_image', $filename, 'public');
            $reportdata['report_image']    = $path;

        }


        if ($request->file('report_doc')) {

            $request_file = $request->file('report_doc');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('report_doc', $filename, 'public');
            $reportdata['report_doc']    = $path;

        }


        if(StatisticalReport::where('id',$id)->update($reportdata)){

            $response = array(
                'success'  =>true,
                'title'     =>'Report',
                'message'  => 'update successfully'
            );

        }else{

            $response = array(
                'success'   => true,
                'title'     =>'Report',
                'message'   => 'Oops! Something went wrong, Please try again'
            );
        }

        return json_encode($response);

    }


    public function destroy($id)
    {

        try {
            StatisticalReport::where('id',$id)->delete();
            $response = array(
                'success'   => true,
                'title'     => 'Report',
                'message'   => 'Delete Successfully'
            );
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'Report',
                'message'   => 'Deleted failed'
            );
            return json_encode($response);
        }

    }


    public function approve($id)
    {

        try {
            $data = StatisticalReport::where('id',$id)->first();

            if(!empty($data)){
                $statu  = $data->status==1?0:1;
                StatisticalReport::where('id',$id)->update(['status'=>$statu]);
            }
            $response = array(
                'success'   => true,
                'title'     => 'Report',
                'message'   => 'Approved Successfully'
            );
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'Report',
                'message'   => $e->getMessage()
            );
            return json_encode($response);
        }

    }



    public function getReports(Request $request)
    {
  
        if ($request->ajax()) {
            
             $data=StatisticalReport::with('industry','currency')->latest()->get();


            return DataTables::of($data)->addIndexColumn()

                ->addColumn('report_image', function ($data) {
                    return '<img src="'.getImage($data->report_image).'" width="50">';
                })
                
                ->addColumn('name', function ($data) {
                    return $data->research_title;
                })

                ->addColumn('about_report', function ($data) {
                    return Str::limit($data->about_report,80);
                })

                ->addColumn('price', function ($data) {
                    return $data->currency?->symbol.''. $data->total_cost;
                })

                ->addColumn('spent_cost', function ($data) {
                    return $data->currency?->symbol.''. $data->spent_cost;
                })

                ->addColumn('currency', function ($data) {
                    return $data->currency?->title;
                })

                ->addColumn('category', function ($data) {
                    return $data->category;
                })
                ->addColumn('academician', function ($data) {
                    return $data->academician;
                })
                ->addColumn('lead_professor', function ($data) {
                    return $data->lead_professor;
                })
                ->addColumn('patent_level', function ($data) {
                    return getReportPetend($data->patent_level);
                })
                ->addColumn('project_stage', function ($data) {
                    return getReportStatus($data->project_stage);
                })

                ->addColumn('type_of_research', function ($data) {
                    return getReportType($data->type_of_researcher);
                })

                ->addColumn('industry', function ($data) {
                    return $data?->industry?->name;
                })

                ->addColumn('status', function ($data) {
                    $status = reportStatus($data->status);
                    // if($data->status==1)
                    //     return '<span class="badge bg-success">Approved</span>';
                    // return  '<span class="badge bg-warning text-dark">Panding</span>';
                    return $status;
                })

                ->addColumn('action', function($data){

                    $actionBtn ='';
                    if($data->status==0){
                        $actionBtn .= '<a href="javascript:void(0)" id="approveAction"  data-approve-route="'.route('approve-report.approve',$data->id).'" title="Approve This" class="btn btn-primary btn-sm"><i class="fas fa-check"></i></a> '; 
                    }
                    $actionBtn .= '<a href="javascript:void(0)" id="editAction" data-update-route="'.route('statistical-report.update',$data->id).'" data-edit-route="'.route('statistical-report.edit',$data->id).'" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a> '; 
                    $actionBtn .= '<a href="javascript:void(0)" id="deleteAction" data-delete-route="'.route('delete-report',$data->id).'" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>';
                    return $actionBtn;
                })

            ->rawColumns([ 'report_image', 'name','about_report','price','spent_cost','category','academician','lead_professor','patent_level','project_stage','type_of_research','industry','status','action'])
            ->make(true);
        }

    }



}


