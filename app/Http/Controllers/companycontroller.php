<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;

class companycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cruds = Crud::all();  
  
        // return view('index', compact('cruds'));  
        $com=company::get();
        

        return view('index',compact('com'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $com=company::all();
        // return view('ajaxview',compact('com'));
        return response()->json(['com'=>$com]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $request->validate([  
            'name'=>'required',  
            'address'=>'required',  
            'age'=>'required',  
        ]);  
  
        $crud = new company;  
        $crud->name =  $request->get('name');  
        $crud->address = $request->get('address');  
        $crud->age = $request->get('age');
        // print("<pre>");
        // echo $crud;
        // print("</pre>");
        // exit();
        $crud->save(); 
    }
    public function ajaxstore(Request $request)
    {
  
        $crud = new company;  
        $crud->name =  $request->get('name');  
        $crud->address = $request->get('address');  
        $crud->age = $request->get('age');
        $crud->save(); 
        return response()->json($crud);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $com=company::find($id);
        return response()->json(['com'=>$com]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crud=company::find($id);
        return view('edit',compact('crud'));
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
        // $request->validate([  
        //     'first_name'=>'required',  
        //     'last_name'=>'required',  
        //     'gender'=>'required',  
        //     'qualifications'=>'required'  
        // ]);  
  
        $crud = company::find($id);  
        $crud->name =  $request->get('name');  
        $crud->address = $request->get('address');  
        $crud->age = $request->get('age');  
        
        $crud->save();  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $crud=company::find($id);  
        $crud->delete(); 
    }
}
