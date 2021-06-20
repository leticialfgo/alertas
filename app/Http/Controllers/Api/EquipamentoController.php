<?php

namespace App\Http\Controllers\Api;

use App\Models\Equipamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ips()
    {
        return response()->json(
            Equipamento::pluck('ip')
        );
    }

    public function ping(Request $request)
    {
        if($request->consumer_key != env('CONSUMER_KEY'))
        {
            return response('Unauthorized action.', 403);
        }

        #return response()->json($request->ip);

        $equipamento = Equipamento::where('ip',$request->ip)->first();
        if($equipamento){
            $equipamento->ping_status = $request->ping_status;
            $equipamento->ping_date = $request->ping_date;
            $equipamento->save();
        }        
        #abort(200);
        return  response(null, 200);
    }



}
