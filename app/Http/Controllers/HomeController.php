<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationCompanySave;
use App\Model\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $companies = Company::query();

        return view('companies.index',[
            'companies'=>$companies->paginate(25)
        ]);
    }

    public function view(){
        return view('companies.add');
    }

    public function save(ValidationCompanySave $request){

        $data = $request->except('_token');

        $result = Company::create($data);

        return redirect('/')->with('message', 'Company is added!');
    }

    public function viewEdit($id){

        $company = Company::find($id);

        return view('companies.edit',compact('company'));
    }

    public function edit($id, ValidationCompanySave $request){
        $data = $request->except('_token');
        $result = Company:: where('id', $id)
            ->update($data);

        return redirect('/')->with('message', 'Company is updated!');
    }

    public function delete($id){

        $company = Company::find($id);
        $company->clients()->delete();
        $company->delete();

        return redirect('/')->with('message', 'Company is deleted!');
    }
}
