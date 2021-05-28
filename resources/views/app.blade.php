<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script>
        window.config = @json($config);
    </script>
</head>
<body>
<div id="app"></div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
