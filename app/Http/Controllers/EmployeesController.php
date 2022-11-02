<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('employees.crud', ['title' => 'Employees', 'folder' => '../']);
    }

    public function edit($data){
        
        return view('employees.edit', ['title' => 'Edit Employees', 'folder' => '../../', 'data' => $data]);
    }

    public function add(){
        return view('employees.add', ['title' => 'Add Employees', 'folder' => '../']);
    }
    
    public function showAll()
    {
        $data = json_decode(Employees::all()->toJson(), true);
        return $data;
    }

    

    public function create(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $data = [];
        $data['first_name'] = $request->input('first_name');
        $data['last_name'] = $request->input('last_name');
        $data['company'] = $request->input('company');
        $data['email'] = $request->input('email');
        $data['phone'] = $request->input('phone');
        
        $author = Employees::create($data);

        return redirect(route('employees'));
    }

    public function update($id, Request $request)
    {
        $author = Employees::where('id', 'LIKE', '%'.$id.'%');
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $data = $request->except('_method','_token','submit');

        $author->update($data);

        return redirect(route('employees'));
    }

    public function delete($id)
    {
        Employees::where('id', 'LIKE', '%'.$id.'%')->delete();

        return redirect(route('employees'));
        
    }
}
