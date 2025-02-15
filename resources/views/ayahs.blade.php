<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quran</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    @foreach ($ayahs as $ayah)
        @dump($ayah)
        <p class="warsh">{{ $ayah->aya_text }}</p>
    @endforeach
</body>

</html>
