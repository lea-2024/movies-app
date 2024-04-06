<?php

namespace App\Livewire\Movies;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;

class Movies extends Component
{
    public
        $page,
        $results,
        $data,
        $pagination;

    use WithPagination;

    public function mount(Request $request)
    {
        $this->loadData($request);
    }

    public function loadData(Request $request)
    {
        $this->page = $request->input('page', 1);
        $response = Http::withHeaders([
            'Authorization' => \config('app.token'),
            'api_key' => \config('app.api_key'),
        ])->get('https://api.themoviedb.org/3/movie/now_playing', ['page' => $this->page]);

        $this->data = json_decode($response->body(), false);
        $this->results = $this->data->results;
    }

    public function updatingPage($value)
    {
        $this->page = $value;
        $response = Http::withHeaders([
            'Authorization' => \config('app.token'),
            'api_key' => \config('app.api_key'),
        ])->get('https://api.themoviedb.org/3/movie/now_playing', ['page' => $this->page]);

        $this->data = json_decode($response->body(), false);
        $this->results = $this->data->results;
    }

    public function nextPage()
    {
        $this->page++;
        $this->updatingPage($this->page);
    }

    public function prevPage()
    {
        if ($this->page > 1) {
            $this->page--;
            $this->updatingPage($this->page);
        }
    }

    public function render()
    {
        // dd($this->data->total_pages);
        // dd($this->page);
        // $this->pagination = new LengthAwarePaginator($this->results, $this->data->total_pages, 20, $this->page);
        return view('livewire.movies.movies', ['results' => $this->results])
            ->layout('layouts.movie');
        // ->withQueryString();
    }
}
