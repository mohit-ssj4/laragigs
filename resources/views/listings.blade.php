<!doctype html>
<html lang="en" class="h-screen scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="laravel application to post job listings"/>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,600,700" rel="stylesheet"/>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Welcome</title>
</head>
<body class="h-screen font-space-grotesk">
<main class="p-2 flex flex-col gap-6">
    <h1 class="text-3xl font-bold">
        {{ $heading }}
    </h1>
    @if(count($listings) === 0)
        <p>No listings found</p>
    @else
        <section class="flex flex-col gap-6">
            @foreach($listings as $listing)
                <article class="flex flex-col gap-2">
                    <h2 class="text-xl font-bold underline">
                        <a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a>
                    </h2>
                    <p>{{$listing['description']}}</p>
                </article>
            @endforeach
        </section>
    @endif
</main>
</body>
</html>
