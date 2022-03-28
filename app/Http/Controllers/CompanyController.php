<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index() {
        $company = Company::paginate(10);
        return CompanyResource::collection($company);
    }

    public function show($id) {
        $company = Company::findOrFaill($id);
        return new CompanyResource($company);
    }

    public function store(Request $request) {
        $request->validate([
            'desc' => 'required',
        ]);
            
        return Company::create($request->all());
    }

    public function update(Request $request, $id) {
        $request->validate([
            'desc' => 'required',
        ]);
        
        $company = Company::findOrFail($id);       
        return  $company->update($request->all());
    }

    public function destroy($id) {
        $company = Company::findOrFail($id);        
        return $company->delete();
    }
}
