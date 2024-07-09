<!DOCTYPE html>
<html>
<head>
    <title>Text Similarity Results</title>
</head>
<body>
    <h1>Results</h1>
    @if ($bestMatch)
        <p>Best Match: {{ $bestMatch }}</p>
        <p>Similarity: {{ number_format($maxSimilarity * 100, 2) }}%</p>
    @else
        <p>No matches found.</p>
    @endif
    <a href="{{ url()->previous() }}">Go Back</a>
</body>
</html>
