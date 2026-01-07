<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="color-scheme" content="light">
    <meta name="theme-color" content="#ffffff">
    <title>Internval - @yield('title')</title>
    <link rel="icon" href={{ asset('img/icon.svg') }}>
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@200,300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:ital,wght@0,200..800&display=swap" rel="stylesheet" />

    <!-- ✅ Meta description untuk Google -->
    <meta name="description" content="Internval - Internship Validation" />    
    <meta name="keywords" content="internval, internship, validation, umpp, fastikom" />    
    <meta name="author" content="Internval Team" />

    <!-- ✅ Open Graph untuk sosial media -->
    <meta property="og:title" content="Internval - Internship Validation" />
    <meta property="og:description" content="Internship Validation App - Effortless Flow Quick Results" />
    <meta property="og:image" content={{ asset('img/ogimage.webp') }} /> <!-- gambar preview -->
    <meta property="og:url" content="https://internval.site" />
    <meta property="og:type" content="website" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('vite_script')
</head>
<body>    
    @yield('content')    
</body>
</html>