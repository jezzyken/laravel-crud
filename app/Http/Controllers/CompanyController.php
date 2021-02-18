<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = DB::table('companies')->latest()->paginate(10);
        return view('company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'logo' => 'dimensions:width=100,height=100'
        ]);



        $data = array();
        // fields from view
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['website'] = $request->website;

        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name =  $image_name.'.'.$ext;
            $upload_path = 'storage/app/public/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['logo'] = $image_url;
            $company = DB::table('companies')->insert($data);
            return redirect()->route('company.index')->with('success', 'Company Inserted Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = DB::table('companies')->where('id', $id)->first();
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oldlogo = $request->old_logo;

        $data = array();
        // fields from view
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['website'] = $request->website;

        $image = $request->file('logo');
        if($image){
            //unlink($oldlogo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name =  $image_name.'.'.$ext;
            $upload_path = 'storage/app/public/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['logo'] = $image_url;
            $company = DB::table('companies')->where('id', $id)->update($data);
            return redirect()->route('company.index')->with('success', 'Company Updated Successfully');
        }
    }


    public function delete($id)
    {
        $data = DB::table('companies')->where('id', $id)->first();
        $image = $data->logo;
        // unlink($image);
        $product = DB::table('companies')->where('id', $id)->delete();
        return redirect()->route('company.index')->with('success', 'Company Deleted Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
