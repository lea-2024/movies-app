@section('title', 'CAC - Fans Movies')
<div class="container mx-auto text-slate-200">
    <h1 class="text-3xl font-weight-bold p-5 text-center mb-10">CAC - Fans Movies</h1>

    <section class="mt-5 mb-10 flex flex-wrap justify-center gap-10 w-100" wire:init='loadData'>

        {{-- @foreach ($results as $movie)
            <div>
                <article class="flex justify-center items-center rounded-lg w-[200px] bg-gray-500 h-[300px]">
                    <p
                        class="px-3 w-48 py-1 text-xs font-medium leading-none text-center text-slate-200 rounded-full animate-pulse">
                        cargando...</p>
                </article>
            </div>
        @endforeach --}}

        @foreach ($results as $movie)
            <div wire:loading>

                <div role="status"
                    class="animate-pulse flex items-center justify-center rounded-lg w-[200px] bg-gray-500 h-[300px]">
                    <div
                        class="flex items-center justify-center w-full h-full bg-gray-300 rounded sm:w-96 dark:bg-gray-700">
                        <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                        </svg>
                    </div>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        @endforeach



        @foreach ($results as $movie)
            <article wire:loading.remove
                class="overflow-hidden drop-shadow-[0px_1px_5px_rgba(255,255,255,0.75)] sepia-0 transition-all ease-in-out duration-900 hover:sepia mb-3 sm:mb-0">
                <a href="{{ route('movies.details', $movie->id) }}" wire:navigate>

                    <img src={{ 'https://image.tmdb.org/t/p/original/' . $movie->poster_path }}
                        alt="{{ $movie->title }}" width="200" class="rounded-lg">
                    {{-- {{ $movie->title }} --}}
                    <p class="mt-3 md:mt-4 text-yellow-200 drop-shadow-none shadow-none">
                        {{ Str::limit($movie->title, 20) }}</p>
                </a>
            </article>
        @endforeach

    </section>
    <div class="flex text-center gap-x-6 my-5 justify-center items-center">
        <button wire:click='prevPage' @disabled($page === 1)
            class="disabled:bg-gray-400 disabled:cursor-not-allowed disabled:text-gray-600 btn_movie"><i
                class="fa-solid fa-caret-left"></i></button>
        <button wire:click='nextPage' class="btn_movie"><i class="fa-solid fa-caret-left rotate-180"></i></button>
    </div>
</div>
