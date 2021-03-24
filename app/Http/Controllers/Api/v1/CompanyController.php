<?php
/**
 * Created by PhpStorm.
 * User: Loner
 * Date: 24.03.2021
 * Time: 0:54
 */

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationCompanySave;
use App\Model\Company;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::with('clients')->get();
    }

    public function show($id)
    {
        return Company::with('clients')->find($id);
    }

    public function store(ValidationCompanySave $request)
    {
        return Company::create($request->all());
    }

    public function update(ValidationCompanySave $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());

        return $company;
    }

    public function delete($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return 204;
    }
}