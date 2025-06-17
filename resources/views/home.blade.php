<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get In Touch</title>
    <link rel="icon" href={{ asset('img/icon.svg') }}>
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@200,300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:ital,wght@0,200..800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>
    <x-hero></x-hero>
    <div class="flex flex-col justify-center items-center lg:gap-20 md:gap-16 xs:gap-12 lg:mt-0 md:-mt-[40rem] xs:-mt-40">
        <x-flow></x-flow>
        <x-feature></x-feature>
        <x-footer></x-footer>
    </div>
</body>
</html>