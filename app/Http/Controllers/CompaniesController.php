<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompaniesRequest;
use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::all();
        return view('companies.index', ['companies' => $companies, 'title' => 'Companies']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create', ['title' => 'Companies']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompaniesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompaniesRequest $request)
    {
        $name = uniqid("logo-");
        if(isset($request->all()['logo'])){
            Storage::putFileAs("public/images", $request->file('logo'), $name.'.jpg');
        }

        $data = $request->all();
        $data['logo'] = $name;

        Companies::create($data);
        Session::flash('message', 'Successfully add company');
        return redirect('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies = Companies::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Companies::find($id);
        return view('companies.edit', ['companies' => $companies, 'title' => 'Companies']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompaniesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompaniesRequest $request, $id)
    {
        $companies = Companies::find($id);

        if(isset($request->all()['logo'])){
            if(Storage::exists('public/images/' . $companies->logo . '.jpg')){
                Storage::delete('public/images/' . $companies->logo . '.jpg');
            }
            Storage::putFileAs("public/images", $request->file('logo'), $companies->logo.'.jpg');
        }

        $data = $request->all();
        $data['logo'] = $companies->logo;
        $companies->update($data);
        
        Session::flash('message', 'Successfully update company');
        return redirect('companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Companies::find($id);
        if(Storage::exists('public/images/' . $companies->logo . '.jpg')){
            Storage::delete('public/images/' . $companies->logo . '.jpg');
        }
        $companies->delete();

        Session::flash('message', 'Successfully deleted company!');
        return Redirect::to('companies');
    }
}
