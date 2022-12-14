<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeesRequest;
use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(Employees::with('company'))
            ->addColumn('company', function (Employees $emp) {
                if ($emp->hasCompany()) {
                    return $emp->company->name;
                } else {
                    return "-";
                }
            })
            ->addColumn('name', function (Employees $emp) {
                return $emp->first_name . " " . $emp->last_name;
            })
            ->addColumn('action', '<a class="btn btn-small btn-warning" href="{{ route("employees.edit", $id) }}">Edit</a> <a class="btn btn-small btn-danger" href="#" data-toggle="modal" data-target="#deleteModal" onclick="loadDeleteModal(`{{ route("employees.destroy", $id) }}`)">Delete</a>')
            ->removeColumn('company_id')
            ->removeColumn('first_name')
            ->removeColumn('last_name')
            ->rawColumns(['action'])
            ->toJson();
        }
        $title = 'Employees';
        return view('employees.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companies::all();
        $title = 'Employees';
        return view('employees.create', compact('companies', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EmployeesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeesRequest $request)
    {
        Employees::create($request->all());
        Session::flash('message', 'Successfully add employee');
        return redirect('employees');
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
        $employees = Employees::find($id);
        $companies = Companies::all();
        $title = 'Employees';
        return view('employees.edit', compact('employees', 'companies', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EmployeesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeesRequest $request, $id)
    {
        Employees::find($id)->update($request->all());
        
        Session::flash('message', 'Successfully update employees');
        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employees::find($id)->delete();

        Session::flash('message', 'Successfully deleted employees!');
        return redirect('employees');
    }
}
