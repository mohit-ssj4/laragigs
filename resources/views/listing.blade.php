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
    <a href="/" class="flex items-center gap-2 hover:underline">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18"/>
        </svg>
        <span>Back</span>
    </a>
    @if(count($listing) === 0)
        <p>No listing found</p>
    @else
        <section class="flex flex-col gap-6">
            @foreach($listing as $list)
                <article class="flex flex-col gap-2">
                    <h1 class="text-3xl font-bold">{{$list['title']}}</h1>
                    <p>{{$list['description']}}</p>
                </article>
            @endforeach
        </section>
    @endif
</main>
</body>
</html>
