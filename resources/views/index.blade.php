<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shortlink Generator</title>
</head>
<body>
    <h1>Shortlink Generator</h1>
    <form action="{{ route('generate') }}" method="POST">
        @csrf
        <label for="original_url">Enter URL:</label>
        <input type="url" id="original_url" name="original_url" required>
        <button type="submit">Generate</button>
    </form>
    @if (isset($shortCode))
        <p>Shortlink: <a href="{{ url($shortCode) }}">{{ url($shortCode) }}</a></p>
    @endif
</body>
</html>
