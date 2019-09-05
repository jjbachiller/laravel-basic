<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('companies.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'logo' => 'dimensions:min_width=100,min_length=100'
        ]);

        $company = new Company([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'website' => $request->get('website')
        ]);

        $logo = $request->file('logo');
        if (!is_null($logo))
        {
          $company->logo = $logo->store(null, 'logos');
        }

        $company->save();

        return redirect('home')->with('success', 'Company saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'logo' => 'dimensions:min_width=100,min_length=100'
        ]);

        $company = Company::find($id);

        $company->name = $request->get('name');
        $company->email = $request->get('email');
        $company->website = $request->get('website');

        $logo = $request->file('logo');
        if (!is_null($logo))
        {
          $company->logo = $logo->store(null, 'logos');
        }

        $company->save();

        return redirect('home')->with('success', 'Companies updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect('home')->with('succes', 'Company deleted!');
    }
}
