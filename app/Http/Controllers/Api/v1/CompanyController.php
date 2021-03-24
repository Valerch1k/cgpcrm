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
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $page = (int)$request->query('page','1');
        $perPage = (int)$request->query('perPage','10');
        $sortBy =  $request->query('sortBy','created_at');
        $sortType =  $request->query('sortType','desc');

        $companies = Company:: orderBy($sortBy,$sortType)
            ->offset(($page - 1) * $perPage)
            ->limit($perPage);

        return $companies->with('clients')->get();
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