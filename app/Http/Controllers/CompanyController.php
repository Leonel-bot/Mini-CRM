<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies['companies'] = Company::orderBy('id', 'DESC')->paginate(10);
        return view('company.index', $companies);
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

        $validated = $request->validate([
            'name' =>  'required|string|min:5|max:100',
            'email' =>  'required|email',
            'logo' =>  'required|mimes:jpg,jpeg,png',
            'website' =>  'required|string|min:5|max:100',
        ]);
        


        $data = request()->except('_token');
        if($request->hasFile('logo')){
            $data['logo'] = $request->file('logo')->store('app', 'public');
        }
        Company::insert($data);
        return view('company.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->except('_token', '_method');

        $inputs = [
            'name' =>  'required|string|min:5|max:100',
            'email' =>  'required|email',
            'website' =>  'required|string|min:5|max:100',
        ];

        if($request->hasFile('logo')){
            $inputs = [
                'logo' =>  'required|mimes:jpg,jpeg,png',
            ];
        }

        $this->validate($request,$inputs);

        if($request->hasFile('logo')){
            $company = Company::findOrFail($id);
            Storage::delete('public/'.$company->logo);
            $data['logo'] = $request->file('logo')->store('app', 'public');
        }

        Company::where('id', '=', $id)->update($data);
        $company = Company::findOrFail($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        if(Storage::delete('public/'.$company->logo)){
            Company::destroy($id);
        };
        return redirect('company');
    }
}
