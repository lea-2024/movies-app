@section('title', 'CAC - ' . $movie->title)
<div style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ $background }}')"
    class="relative min-h-screen bg-cover bg-center p-10 place-content-center">
    <div class="grid md:grid-cols-[auto_auto] gap-x-10 self-center mb-7 lg:mb-3">
        <div>
            <img src="{{ 'https://image.tmdb.org/t/p/original' . $movie->poster_path }}" alt=""
                class="md:w-96 w-full drop-shadow-[0px_2px_10px_rgba(255,255,255,0.50)]">
        </div>
        {{-- Contenedor de peliculas --}}
        <div class="text-xl text-white text-left text-wrap mt-12 md:mt-0">
            {{-- titulo inglés --}}
            <h1 class="text-3xl text-yellow-200 font-semibold mb-5">{{ $movie->original_title }}</h1>
            {{-- titulo español --}}
            <h2 class="text-2xl text-yellow-200 font-semibold mb-5">{{ $movie->title }}</h2>
            {{-- fecha de estreno --}}
            <h3><span class="text-gray-300">Estreno:</span>
                {{ \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') }} </h3>
            {{-- calificación con estrellas segun las cantidad de votos  --}}
            <span class="block my-3">
                @if ($movie->vote_count <= 500)
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                @elseif ($movie->vote_count > 500 && $movie->vote_count <= 1000)
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                @elseif ($movie->vote_count > 1000 && $movie->vote_count <= 2500)
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                @elseif ($movie->vote_count > 2500 && $movie->vote_count <= 5000)
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                @elseif ($movie->vote_count > 5000)
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                @endif
            </span>
            {{-- Pais o paises de origen --}}
            <p class="mt-2">
                <span class="text-gray-300">Pais de Origen:</span>
                @foreach ($movie->production_countries as $index => $country)
                    @if ($index != count($movie->production_countries) - 1)
                        <span>{{ $country->name }} | </span>
                    @else
                        <span>{{ $country->name }}</span>
                    @endif
                @endforeach
            </p>
            {{-- Genero o generos de la pelicula --}}
            <p class="mt-2">
                <span class="text-gray-300">Genéro: </span>
                @foreach ($movie->genres as $index => $genre)
                    @if ($index != count($movie->genres) - 1)
                        <span>{{ $genre->name }} | </span>
                    @else
                        <span>{{ $genre->name }}</span>
                    @endif
                @endforeach
            </p>
            {{-- Idioma o idiomas de la pelicula  y duracion --}}
            <p class="mt-2">
                <span class="block sm:inline">
                    {{-- idioma --}}
                    <span class="text-gray-300">Idiomas: </span>
                    @foreach ($movie->spoken_languages as $index => $language)
                        @if ($index != count($movie->spoken_languages) - 1)
                            <span>{{ $language->name }} | </span>
                        @else
                            <span>{{ $language->name }}</span>
                        @endif
                    @endforeach
                </span>
                {{-- duracion --}}
                <span class="sm:ms-4 ms-0 sm-2 block sm:inline sm:mt-0 mt-2">
                    <span class="text-gray-300">Duración: </span>
                    {{ $movie->runtime }} min
                </span>
            </p>
            {{-- presupuesto --}}
            <p class="mt-2"><span class="text-gray-300">Presupuesto:
                    @if ($movie->budget == 0)
                        <span class="text-white">No disponible</span>
                    @else
                        <span class="text-white block sm:inline">$
                            {{ number_format($movie->budget, 2, ',', '.') }}</span>
                    @endif
            </p>
            {{-- resumen --}}
            <p class="mt-4"><span class="text-gray-300">Resumen:</span>
                @if (!$movie->overview)
                    <p class="mt-2">No disponible</p>
                @else
                    <p class="mt-2 text-justify">{{ $movie->overview }}</p>
                @endif
            </p>
            <div class="absolute lg:bottom-4 lg:right-10 bottom-2 right-2">
                <button
                    class="flex items-center justify-between px-4 py-2 bg-gray-800 hover:bg-gray-900 drop-shadow-[0px_0px_2px_rgba(255,255,250,0.75)]"
                    wire:click='goBack'><i class="fa-solid fa-caret-left"></i></button>
            </div>
        </div>
    </div>
</div>
