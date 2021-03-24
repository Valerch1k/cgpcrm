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

class ClientController extends Controller
{
    public function index()
    {
        return Client::with('company')->get();
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