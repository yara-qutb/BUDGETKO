<!DOCTYPE html>
<html>
<head>
    <title>Redirecting...</title>
</head>
<body>
    <form id="redirectForm" action="{{ $redirectTo }}" method="POST" style="display: none;">
        @csrf
        @foreach ($postData as $key => $value)
            @if($key !== '_token' && $key !== 'redirect_to')
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endforeach
    </form>

    <script>
        document.getElementById('redirectForm').submit();
    </script>
</body>
</html>
