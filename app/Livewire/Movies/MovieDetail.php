<?php

namespace App\Livewire\Movies;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MovieDetail extends Component
{
    public
        $movie_id,
        $movie,
        $pathBase = 'https://image.tmdb.org/t/p/original',
        $background;

    public function mount($id)
    {
        $this->movie_id = $id;

        $response = Http::withHeaders([
            'Authorization' => config('app.token'),
            'api_key' => env('app.api_key'),
        ])->get('https://api.themoviedb.org/3/movie/' . $this->movie_id . '?language=es-ES');

        $data = json_decode($response->body(), false);
        $this->movie = $data;
        $this->background = $this->pathBase . $data->backdrop_path;
        // dd($this->background);
    }
    public function render()
    {
        return view(
            'livewire.movies.movie-detail',
            [
                'movie' => $this->movie,
                'background' => $this->background
            ]
        )
            ->layout('layouts.movie');
    }

    public function goBack()
    {
        $this->redirectRoute('movies.index', navigate: true);
    }
}
