<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //GET
        $subject = Subject::all();

        return response()->json($subject);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //POST
        //Query Builder
        $validateData = $request->validate([
            'class_id' => 'required',
            'subject_code' => 'required|unique:subjects|max:25',
            'subject_name' => 'required|unique:subjects|max:25'
        ]);

        //Using query builder to insert the data in the database
//        $data = array();
//        $data['subjects'] = $request->class_id;
//        $data['subjects'] = $request->subject_code;
//        $data['subjects'] = $request->subject_name;
//        $insert = DB::table('subjects')->insert($data);
//        return response("Subject inserted Successfully");

//        Eloquent Query Builder create method
        $subject = Subject::create($request->all());
        return response()->json('Subject Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $show = Subject::findOrFail($id);
        return response()->json($show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //PATCH

        $updatedData = Subject::findOrFail($id);
        $updatedData->update($request->all());
        return response("Record updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DELETE
        Subject::findOrFail($id)->delete();
        return response("Record deleted Successfully");
    }

}
