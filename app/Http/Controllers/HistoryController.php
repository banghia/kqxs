<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;
use Validator;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'date' => 'required|date_format:"Y-m-d"',
            'guess' => 'required|max:255',
            'status' => 'required|max:255',
            'prediction_id' => 'required|integer|exists:predictions,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()]);
        }

        $history = new History;
        $history->date = $request->date;
        $history->guess = $request->guess;
        $history->status = $request->status;
        $history->prediction_id = $request->prediction_id;

        if($history->save()){
            return response()->json(['status' => 1, 'history' => $history]);
        }else{
            return response()->json(['status' => 0]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date_format:"Y-m-d"',
            'guess' => 'required|max:255',
            'status' => 'required|max:255',
            'prediction_id' => 'required|integer|exists:predictions,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()]);
        }

        $history->date = $request->date;
        $history->guess = $request->guess;
        $history->status = $request->status;
        $history->prediction_id = $request->prediction_id;

        if($history->save()){
            return response()->json(['status' => 1, 'history' => $history]);
        }else{
            return response()->json(['status' => 0]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        if($history->delete()){
            return response()->json(['status' => 1]);
        }else{
            return response()->json(['status' => 0]);
        }
    }
}
