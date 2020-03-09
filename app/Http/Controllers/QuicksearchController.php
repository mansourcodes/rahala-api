<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuicksearchResource;
use App\Http\Resources\QuicksearchResourceCollection;
use App\Quicksearch;
use Illuminate\Http\Request;

class QuicksearchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return QuicksearchResourceCollection
     */
    public function index(Request $request)
    {

        $quicksearchQuery = Quicksearch::query();

        $sort = explode(':', $request->get('sort', 'order:desc'));
        $quicksearchQuery->orderBy($sort[0], $sort[1]);


        //range filters
        if ($request->has('travel_date')) {
            $quicksearchQuery->whereBetween('travel_date', explode(',', $request->get('travel_date')));
        }

        // end of filters
        $quicksearchs = $quicksearchQuery->paginate();
        return new QuicksearchResourceCollection($quicksearchs);
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
        //
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
