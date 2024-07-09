<!DOCTYPE html>
<html>
<head>
    <title>Text Similarity</title>
</head>
<body>
    <form action="{{ route('compare') }}" method="POST">
        @csrf
        <textarea name="user_text" rows="4" cols="50"></textarea>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
