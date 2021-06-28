<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees['employees'] = Employee::orderBy('id', 'DESC')->paginate(10);
        return view('employee.index', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' =>  'required|string|min:5|max:100',
            'surname' =>  'required|string|min:5|max:100',
            'email' =>  'required|email',
            'company_id' =>  'required|numeric',
            'phone' =>  'required|numeric',
        ]);


        $data = request()->except('_token');
        Employee::insert($data);
        return redirect('/employee/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::all();
        return view('employee.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->except('_token', '_method');

        $validated = $request->validate([
            'name' =>  'required|string|min:5|max:100',
            'surname' =>  'required|string|min:5|max:100',
            'email' =>  'required|email',
            'company_id' =>  'required|numeric',
            'phone' =>  'required|numeric',
        ]);

        Employee::where('id', '=', $id)->update($data);
        $employee = Employee::findOrFail($id);
        $companies = Company::all();
        return view('employee.edit', compact('employee', 'companies'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect('employee');
    }
}
