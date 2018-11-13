<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CoaCategory as CoaModel;
use App\Model\Coa;

class CoaCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $entry = $request->query('entry');

        if($entry){
            $coa = CoaModel::where('entry_type', $entry)->get();

            $data =[];
            $coa->map(function($a) use (&$data){
                
                collect($a['coa_types'])->map(function($b) use (&$data){
                    collect($b['accounts'])->map(function($c) use (&$data){
                        array_push($data, $c);
                    });
                });
            });

            return response()->json($data);
        }

        return response()->json(CoaModel::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $coa = Coa::create($request->all());
        return response()->json($coa);
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
        $coa = Coa::find($id);
        $coa->delete();
    }
}
