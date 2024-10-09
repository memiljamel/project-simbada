<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Qr Code - {{ $asset->name }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-transparent">
    <main class="flex justify-start items-start flex-wrap gap-4 w-full h-auto p-0 m-0 relative">
        @for($i = 1; $i <= $qty; $i++)
            <img class="block p-0 m-0 rounded-none object-cover object-center relative" src="{{ public_path("storage/{$asset->qr_code}") }}" alt="{{ $asset->name }}" width="{{ $size['width'] }}" height="{{ $size['height'] }}" />
        @endfor
    </main>
</body>

</html>
