<?php

namespace App\Http\Controllers;

use App\Http\Resources\ColorResource;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Company;
use Illuminate\Support\Facades\DB;


class ColorController extends Controller
{
    public function index() {
        $color = Color::paginate(10);
        return ColorResource::collection($color);
    }

    public function show($id) {
        $color = Color::findOrFaill($id);
        return new ColorResource($color);
    }

    public function getColorCompany($company){
        $companySelected = DB::table('companys')
                                ->select('id')
                                ->where('short_desc', $company)
                                ->get();
        if (!count($companySelected)){
            $colors = [];
        } else {
            $colors = DB::table('colors')
                                    ->where('company_id', $companySelected[0]->id)
                                    ->get();
            //$colors = 'patata';
        }
        return $colors;
    }

    public function store(Request $request) {
        $request->validate([
            'company_id' => 'required',
            'category_id' => 'required',
            'code' => 'required',
            'desc_en' => 'required',
            'desc_es' => 'required',
            'hex_code' =>'required'
        ]);
            
        return Color::create($request->all());
    }

    public function update(Request $request, $id) {
        $request->validate([
            'company_id' => 'required',
            'category_id' => 'required',
            'code' => 'required',
            'desc_en' => 'required',
            'desc_es' => 'required',
            'hex_code' =>'required'
        ]);
        
        $color = Color::findOrFail($id);       
        return  $color->update($request->all());
    }

    public function destroy($id) {
        $color = Color::findOrFail($id);        
        return $color->delete();
    }
}
