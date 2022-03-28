<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsercolorResource;
use Illuminate\Http\Request;
use App\Models\Usercolor;

class UsercolorController extends Controller
{
    public function index() {
        $userColor = Usercolor::paginate(10);
        return UsercolorResource::collection($userColor);
    }

    public function show($id) {
        $userColor = Usercolor::findOrFaill($id);
        return new UsercolorResource($userColor);
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'color_id' => 'required',
            'isFavourite' => 'required',
            'itHasColor' => 'required',
            'level_color' => 'required'
        ]);
            
        return Usercolor::create($request->all());
    }

    public function update(Request $request, $id) {
        $request->validate([
            'user_id' => 'required',
            'color_id' => 'required',
            'isFavourite' => 'required',
            'itHasColor' => 'required',
            'level_color' => 'required'
        ]);
        
        $userColor = Usercolor::findOrFail($id);       
        return  $userColor->update($request->all());
    }

    public function destroy($id) {
        $userColor = Usercolor::findOrFail($id);        
        return $userColor->delete();
    }
}
