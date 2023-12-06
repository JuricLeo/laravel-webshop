<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex flex-col justify-center items-center h-[90vh]">
        <h1 class="text-4xl font-bold mb-6">Dobrodošli u Webshop</h1>
        <div class="flex">
            @auth
            <a href="{{ url('/dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="bg-slate-500 hover:bg-slate-700/10 hover:text-black text-white font-bold py-2 px-4 rounded mr-2">Prijava</a>
            <a href="{{ route('register') }}" class="border border-gray-500 hover:bg-gray-700 text-black hover:text-white font-bold py-2 px-4 rounded">Registracija</a>
            @endauth
        </div>
    </div>
</body>

</html>