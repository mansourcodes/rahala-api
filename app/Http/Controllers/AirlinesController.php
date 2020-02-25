<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Http\Resources\AirlineResource;
use App\Http\Resources\AirlineResourceCollection;
use Illuminate\Http\Request;

class AirlinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $airlineQuery = Airline::query();

        $sort = explode(':', $request->get('sort', 'id:desc'));
        $airlineQuery->orderBy($sort[0], $sort[1]);

        // filters
        if ($request->has('name')) {
            $airlineQuery
                ->where('en_name', 'like', '%' . $request->get('name') . '%')
                ->orWhere('ar_name', 'like', '%' . $request->get('name') . '%');
        }

        // end of filters
        $airlines = $airlineQuery->paginate();
        return new AirlineResourceCollection($airlines);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_numeric($id)) {
            $airline = Airline::findOrFail($id);
        } else {
            $airline = Airline::where('code', $id)->firstOrFail();
        }
        if ($airline->logo == 0) {
            $airline->pullLogo();
        }

        return new AirlineResource($airline);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function edit(Airline $airline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airline $airline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airline $airline)
    {
        //
    }
}
