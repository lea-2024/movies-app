   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">

       <title>{{ config('app.name', 'Laravel') }}</title>

       <!-- Fonts -->
       <link rel="preconnect" href="https://fonts.bunny.net">
       <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

       <!-- Scripts -->
       @vite(['resources/css/app.css', 'resources/js/app.js'])

   </head>

   <body>
       <section class="container m-auto">
           <h1 class="text-3xl font-weight-bold">Bienvenidos a la vista del home</h1>

           <section class="mt-5 mb-10 flex flex-wrap justify-between gap-10 w-100">
               @foreach ($data as $movie)
                   <article>
                       <img src={{ 'https://image.tmdb.org/t/p/original/' . $movie->poster_path }}
                           alt="{{ $movie->title }}" width="200">
                       <span>{{ Str::limit($movie->title, 20) }}</span>
                   </article>
               @endforeach
           </section>
           {{-- {{ dd($data[0]->adult) }} --}}
           <section>
               {{ $data->links() }}
           </section>
       </section>
   </body>

   </html>
