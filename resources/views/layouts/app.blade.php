<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="@yield('meta_description', 'القائمة الإلكترونية')">

    <title>
        @yield('title', 'القائمة الإلكترونية')
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @isset($restaurant)
      @isset($restaurant)
    <style>
        :root {
            --color-primary: {{ $restaurant->primary_color ?? '#8b0000' }};
            --color-secondary: {{ $restaurant->secondary_color ?? '#d4af37' }};
            --color-background: {{ $restaurant->background_color ?? '#0b0b0d' }};
        }
    </style>
@endisset
    @endisset

</head>

<body>

    @yield('content')

</body>

</html>
