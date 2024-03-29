<?php

namespace App\Http\Controllers;

use App\Models\Thing;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ThingController extends Controller
{
    public function index(){
        return response()->json(Thing::all());
    }
    public function store(Request $request){
        return response()->json(Thing::create($request->all()), 201);
    }
    public function show($id){
        $thing = Thing::find($id);
        if (!$thing) {
            return response()->json('Thing not found', 404);
        }
        return response()->json($thing, 200);
    }
    public function update(Request $request, $id) {
        $thing = Thing::find($id);
        
        if (!$thing) {
            return response()->json('Thing not found', 404);
        }
        $thing->update($request->all());
        $updatedThing = Thing::find($id);
    
        return response()->json($updatedThing, 200);
    }
    
    public function destroy($id){
        $thing = Thing::find($id);
        if (!$thing) {
            return response()->json('Thing not found', 404);
        }
        return response()->json($thing->delete(), 201);
    }
    public function info() {
        $info = [
            '/info' => 'This info page',
            '/things' => 'GET request to fetch all things',
            '/thing' => 'POST request to create a thing',
            '/thing/{id}' => 'GET, PUT, or DELETE request to fetch, update, or delete a thing',
        ];
        return response()->json($info, 200, [], JSON_UNESCAPED_SLASHES);
    }
}
