<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companie;
class conpanieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = companie::all();
        //  $myCompanies = companie::all();
         return View('companies.index', compact('company'));
        //  ->with('sharks', $sharks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        // return 'companies.create';
        return View('companies.create');
        // return response()->json(['result'=>'skill Added Successfully']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logoName = time().'.'.$request->logo->extension();
        $logoPath = $request->logo->move(public_path('logos'),$logoName);
        $company=new companie;
        $company->Name = $request->input('Name');
        $company->Email = $request->input('Email');
        $company->Logo = $logoPath;
        $company->Website = $request->input('Website');
        $company->save();
        return redirect('Company')->with('status','Company Added Successfully');
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
        $my_company = companie::find($id);
        return view('companies.edit', compact('my_company'));
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
        $company = companie::find($id);
        $company->Name = $request->input('Name');
        $company->Email = $request->input('Email');
        $company->Logo = $request->input('Logo');
        $company->Website = $request->input('Website');
        $company->update();
        return redirect('Company')->with('status','Company updated Successfully');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = companie::find($id);
        $company->delete();
        return redirect('Company')->with('status','Company deleted Successfully');  
    }
}
