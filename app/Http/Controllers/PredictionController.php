<?php

namespace App\Http\Controllers;

use App\Prediction;
use App\History;
use App\Card;
use Illuminate\Http\Request;
use Validator;

class PredictionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $predictions = Prediction::all();
        return view('admin.prediction')->withPredictions($predictions);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'guess' => 'required|max:255',
            'price' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()]);
        }

        $prediction = new Prediction;
        $prediction->name = $request->name;
        $prediction->guess = $request->guess;
        $prediction->price = $request->price;

        if($prediction->save()){
            return response()->json(['status' => 1, 'prediction' => $prediction]);
        }else{
            return response()->json(['status' => 0]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function show(Prediction $prediction)
    {
        $histories = $prediction->histories()->orderBy('date', 'desc')->get();
        return view('admin.history')->withHistories($histories)->withPrediction($prediction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function edit(Prediction $prediction)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prediction $prediction)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'guess' => 'required|max:255',
            'price' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0]);
        }
        
        $prediction->name = $request->name;
        $prediction->guess = $request->guess;
        $prediction->price = $request->price;

        if($prediction->save()){
            return response()->json(['status' => 1, 'prediction' => $prediction]);
        }else{
            return response()->json(['status' => 0]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prediction $prediction)
    {
        $histories = $prediction->histories();
        $cards = $prediction->cards();
        if(!empty($histories)){
            $histories->delete();
        }
        if(!empty($cards)){
            $cards->delete();
        }
        if($prediction->delete()){
            return response()->json(['status' => 1]);
        }else{
            return response()->json(['status' => 0]);
        }
    }
}
