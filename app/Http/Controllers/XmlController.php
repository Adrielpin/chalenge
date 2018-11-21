<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Person;
use App\Models\Person_phone;

class XmlController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        
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
    public function store(Request $request)
    {
        
        $xml_object = simplexml_load_file($request->file('inputFile')->getRealPath());
        
        $json = json_decode(json_encode($xml_object));
        
        if($json->person) {
            $this->savePerson($json->person);
        } 
        
        else if ($json->shiporders) {
            $this->saveShiporders($json->shiporders);
        }
        
    }
    
    public function saveShiporders($values) {
        //
        dd('aqui');
    }
    
    public function savePerson($values) {
        foreach($values as $value) {
            
            $person = Person::updateOrCreate(
                ['id' => $value->personid],
                ['name' => $value->personname]
            );
            foreach($value->phones as $phone) {
                
                dd($phone);
                $phone= Person_phone::firstOrCreate(
                    ['person_id' => $person->id],
                    ['phone' => $number]
                );
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
        //
    }
}
