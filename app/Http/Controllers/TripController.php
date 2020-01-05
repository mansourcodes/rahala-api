<?php

namespace App\Http\Controllers;

use App\Http\Resources\TripResource;
use App\Http\Resources\TripResourceCollection;
use App\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TripResourceCollection
     */
    public function index(Request $request)
    {

        $tripQuery = Trip::query();

        $sort = explode(':', $request->get('sort', 'id:desc'));
        $tripQuery->orderBy($sort[0], $sort[1]);

        // filters
        if ($request->has('travel_by')) {
            $tripQuery->where('travel_by', '=', $request->get('travel_by'));
        }
        if ($request->has('cities')) {
            $tripQuery->where('cities', 'like', '%'.$request->get('cities').'%');
        }
        if ($request->has('food_options')) {
            $tripQuery->where('food_options', 'like', $request->get('food_options'));
        }

        //rage filter
        if ($request->has('travel_date')) {
            $tripQuery->whereBetween('travel_date', explode(',',$request->get('travel_date')));
        }
        if ($request->has('num_of_days')) {
            $tripQuery->whereBetween('num_of_days', explode(',',$request->get('num_of_days')));
        }
        if ($request->has('return_date')) {
            $tripQuery->whereBetween('return_date', explode(',',$request->get('return_date')));
        }

        //client filter
        if ($request->has('client_id')) {
            $tripQuery->whereHas('client', function ($q) use ($request) {
                return $q->where('id', '=', $request->get('client_id'));
            });
        }

        // end of filters
        $trips = $tripQuery->paginate();
        return new TripResourceCollection($trips);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trip = Trip::findOrFail($id);
        return new TripResource($trip);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
