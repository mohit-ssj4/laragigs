<!doctype html>
<html lang="en" class="h-screen scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="laravel application to post job listings"/>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,600,700" rel="stylesheet"/>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="h-screen font-space-grotesk">
<main class="flex flex-col gap-6 container mx-auto p-2">
    <header>
        <nav class="flex justify-between items-center mb-4">
            <a href="/"><img class="w-24 logo" src="{{ asset('images/logo.png') }}" alt="logo"/></a>
            <ul class="flex items-center text-base gap-6">
                @auth()
                    <li>
                        Welcome, <span class="font-bold uppercase">{{ auth()->user()->name }}</span>
                    </li>
                    <li>
                        <a href="/listings/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                            Manage Listings
                        </a>
                    </li>
                    <li class="hover:text-laravel">
                        <form class="inline" method="POST" action="/logout">
                            @csrf
                            <button type="submit"><i class="fa-solid fa-door-closed"></i> Logout</button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i>Register</a>
                    </li>
                    <li>
                        <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login
                        </a>
                    </li>
                @endauth
            </ul>
        </nav>
    </header>
    <x-flash-message/>
    {{ $slot }}
    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-20 mt-48 opacity-90 md:justify-center"
    >
        <p class="ml-2 font-thin">Copyright &copy; 2022, All Rights reserved</p>
        <a href="/listings/create" class="absolute top-1/4 right-2 bg-black text-white py-2 px-5 rounded-lg">Post
            Job</a>
    </footer>
</main>
</body>
</html>
