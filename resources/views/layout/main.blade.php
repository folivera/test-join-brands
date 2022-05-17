<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container">

            <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <a href="/" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a> |
                    @if (!Auth::check() )
                        @if (Request::path() == 'login')
                        <a href="{{ url('/register') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @else
                        <a href="{{ url('/login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                        @endif
                    @else
                        <a href="{{ url('/logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log out</a>
                    @endif
                </div>
            @endif
            </div>

        @yield('content')
        </div>
    </body>
</html>