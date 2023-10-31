<?php

namespace Modules\Subcription\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Role\Entities\Module;
use Illuminate\Routing\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Modules\Subcription\Entities\Package;
use Modules\Expert\Entities\ExpertCategory;
use Modules\Subcription\Entities\PackageInvoice;
use Modules\Subcription\Entities\PackageDuration;
use Modules\Subcription\Http\Requests\PackageRequest;

class PackageController extends Controller
{

    public function index()
    {

        \cs_set('theme', [
            'title'       => 'Package List',
            'description' => 'Creating new Customer.'
        ]);

        return view('subcription::packages.index',[
            'mpackages' => Package::with('category')->orderBy('id','desc')->get(),
        ]);


    }

    public function create()
    {
        \cs_set('theme', [
            'title'       => 'Create New Package',
            'description' => 'Creating new package.'
        ]);


        return view('subcription::packages.create',[
            'categories'  => ExpertCategory::get(),
        ]);
    }

    public function store(PackageRequest $request)
    {

        $request->validate([
            'title'             => 'required',
            'price'             => 'required',
            'duration'          => 'required',
            'service_number'    => 'required',
            'expert_categories_id' => 'required',
        ],[
            'required' => ':attribute field is required'
        ]);


        $package = new Package();

        $package->fill($request->all());
        
        $package->offer_status = @$request->offer_status ?? 0;
        $package->status = @$request->status ?? 0;
        $package->expert_categories_id = json_encode($request->expert_categories_id);
        $package->save();
        
        Session::flash('success', 'Package add successfully');
        return redirect()->route('packages.index');

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'             => 'required',
            'price'             => 'required',
            'duration'          => 'required',
            'service_number'        => 'required',
            'expert_categories_id'  => 'required',
        ],[
            'required' => ':attribute field is required'
        ]);

        $package = Package::findOrFail($id);
        $package->fill($request->all());
        $package->offer_status = @$request->offer_status ?? 0;
        $package->expert_categories_id = json_encode($request->expert_categories_id);
        $package->status = @$request->status ?? 0;

        $package->save();

        Session::flash('success', 'Package updated successfully');
        return redirect()->route('packages.index');

    }

    public function show($id)
    {
        return view('subcription::show');
    }
    
    public function edit($id)
    {

        \cs_set('theme', [
            'title'       => 'Edit Package',
            'description' => 'Edit package.'
        ]);

        $package = Package::findOrFail($id);
        return view('subcription::packages.create',[
            'package' => $package,
            'categories'  => ExpertCategory::get(),
            'category_ids'        => $package->categorys()->pluck('expert_categories_id')->toArray(),
        ]);
    }

    public function destroy($id)
    {

        if(PackageInvoice::where('package_id',$id)->first()){
            Session::flash('error', 'This package already use');
        }else{
            Package::findOrFail($id)->delete();
            Session::flash('success', 'Data Deleted Successfully');
        }
        return redirect()->route('packages.index');

    }



}
