<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $page = $request->input('page', 1);

        // $response = Http::withHeaders([
        //     'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIzODc3NTY3ZmFmMGQ4NmYwM2JhZThjMTgyZTY4Y2FlMiIsInN1YiI6IjYzYTdlNDI4MTVhNGExMDBjYjcyNGYyYiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.mOvMlFwPclCCZAcEFaqpWSqAe4bddVOg4T5nFToZqyQ',
        //     'api_key' => '3877567faf0d86f03bae8c182e68cae2'
        // ])->get('https://api.themoviedb.org/3/movie/now_playing', ['page' => $page]);

        // $data = json_decode($response->body(), false);

        // $result = $data->results;
        // $paginator = new LengthAwarePaginator($result, $data->total_pages, 20, $page);

        // dd($result);
        return view('movies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
