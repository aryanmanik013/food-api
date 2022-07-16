<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Validator;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function getFood()
    {
        return Food::orderBy('created_at', 'asc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function AddFood(Request $request)
    {

        $rules = array(
            'title' => 'required',
            'descrption' => 'required',
            'count' => 'required',
            'price' => 'required',
            'location' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $food = new Food();
            $food->title = $request->input('title');
            $food->descrption = $request->input('descrption');
            $food->count = $request->input('count');
            $food->price = $request->input('price');
            $food->location = $request->input('location');
            $food->img = $request->input('img');
            $food->save();
            return $food;

            if ($food) {
                return ["Result" => "Data has been saved"];
            } else {
                return ["Result" => "Operation failed"];
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    function search($location)
    {
        $data =  Food::where('location','like', "%{$location}%")->get();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::findorFail($id);
      if($food->delete()){
          return 'deleted successfully';
      }
    }
}
