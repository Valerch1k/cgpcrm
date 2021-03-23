<?php
/**
 * Created by PhpStorm.
 * User: Loner
 * Date: 23.03.2021
 * Time: 21:56
 */

namespace App\Http\Controllers;
use App\Http\Requests\ValidationClientSave;
use App\Model\Company;
use App\Model\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::query();

        return view('clients.index',[
            'clients'=>$clients->paginate(25)
        ]);
    }

    public function view(){

        $companies = (Company::distinct('id')->take(100)->get())
            ->pluck('company_name', 'id');

        return view('clients.add',compact('companies'));
    }

    public function save(ValidationClientSave $request){

        $data = $request->except('_token');
        $client = Client::create($data);

        return redirect('/')->with('message', 'Client is added!');
    }

    public function viewEdit($id){

        $client = Client::find($id);

        $companies = (Company::distinct('id')->take(100)->get())
            ->pluck('company_name', 'id');

        return view('clients.edit',compact('companies','client'));
    }

    public function edit($id, ValidationClientSave $request){

        $data = $request->except('_token');
        $result = Client:: where('id', $id)
            ->update($data);

        return redirect('/client')->with('message', 'Client is updated!');
    }

    public function delete($id){

        $client = Client::find($id);
        $client->delete();

        return redirect('/client')->with('message', 'Client is deleted!');
    }

}