<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('companies.crud', ['title' => 'Companies', 'folder' => '../']);
    }

    public function edit($data){
        
        return view('companies.edit', ['title' => 'Edit Companies', 'folder' => '../../', 'data' => $data]);
    }

    public function add(){
        return view('companies.add', ['title' => 'Add Companies', 'folder' => '../']);
    }
    
    public function showAll()
    {
        $data = json_decode(Companies::all()->toJson(), true);
        return $data;
    }

    

    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
            'file' => 'required'
        ]);

        $data = [];
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['website'] = $request->input('website');
        $author = Companies::create($data);

        $file = $request->file('file');
        $to = public_path('comp_logo');
        $file->move($to, $author->id . '.jpg');

        return redirect(route('companies'));
    }

    public function update($id, Request $request)
    {
        $author = Companies::where('id', 'LIKE', '%'.$id.'%');
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => 'required'
        ]);
        $data = $request->except('_method','_token','submit', 'file');

        if(isset($request->all()['file'])){
            $file = $request->file('file');
            $to = public_path('comp_logo');
            if(Storage::exists('comp_logo/'. $author->first()->id . '.jpg')){
                Storage::delete('comp_logo/' . $author->first()->id . '.jpg');
            }
            $file->move($to, $author->first()->id . '.jpg');
        }
        $author->update($data);

        return redirect(route('companies'));
    }

    public function delete($id)
    {
        Companies::where('id', 'LIKE', '%'.$id.'%')->delete();

        return redirect(route('companies'));
        
    }
}
