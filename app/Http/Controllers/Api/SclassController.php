<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sclass = Sclass::all();
        return response()->json($sclass);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): \Illuminate\Http\Response
    {
        //Query Builder
        $validateData = $request->validate([
            'class_name' => 'required|unique:sclasses|max:25'
        ]);

        //Using query builder to insert the data in the database

        $data = array();
        $data['class_name'] = $request->class_name;
        $insert = DB::table('sclasses')->insert($data);
        return response("Inserted Successfully");


        //Eloquent model querying
        //$data = new Sclass();
//        $data = $request->class_name;
//        $data->save();
//        return response("Record inserted Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): \Illuminate\Http\Response
    {
        //
    }

    public function show($id){

        //Query Builder method
        $show = Sclass::findOrFail($id);
        return response()->json($show);


        //Eloquent query builder
//        $show = DB::table('sclasses')->where('id', $id)->first();
//        return response()->json($show);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): \Illuminate\Http\Response
    {
        //Query Builder
        $validateData = $request->validate([
            'class_name' => 'required|unique:sclasses|max:25'
        ]);

        //Using query builder to insert the data in the database

        $data = array();
        $data['class_name'] = $request->class_name;
        $insert = DB::table('sclasses')->where('id', $id)->update($data);
        return response("Record updated Successfully");


    //Eloquent model udating approach
//        $class_name = Sclass::findOrFail($id);
//        $subject->update($request->all());
//        return response('Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eloquent Query builder apporach for deleting
      Sclass::findOrFail($id)->delete();
      return response("Record deleted successfully");

      //Query builder approach for deleting
//        DB::table('sclasses')->where('id', $id)->delete();
//        return response('Record deleted Successfully');
    }
}
