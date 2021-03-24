<?php
/**
 * Created by PhpStorm.
 * User: Loner
 * Date: 24.03.2021
 * Time: 1:00
 */

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationClientSave;
use App\Model\Client;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    public function index(Request $request)
    {
        $page = (int)$request->query('page','1');
        $perPage = (int)$request->query('perPage','10');
        $sortBy =  $request->query('sortBy','created_at');
        $sortType =  $request->query('sortType','desc');

        $clients = Client:: orderBy($sortBy,$sortType)
            ->offset(($page - 1) * $perPage)
            ->limit($perPage);


        return $clients->with('company')->get();
    }

    public function getClientCompanies($idClient)
    {
        return Client::find($idClient)->company()->get();
    }

    public function show($id)
    {
        return Client::with('company')->find($id);
    }

    public function store(ValidationClientSave $request)
    {
        return Client::create($request->all());
    }

    public function update(ValidationClientSave $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->all());

        return $client;
    }

    public function delete($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return 204;
    }
}