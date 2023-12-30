<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (session()->has('success'))
        <div class="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    redirected

    <button>
        <a href="{{ route('login') }}">
            create your own close source
        </a>
    </button>

    @foreach ($users as $user)
        <h1>{{ $user->username }}</h1>
        <h1>{{ $user->email }}</h1>
        <h1>{{ $user->password }}</h1>
        <h1>{{ $user->created_at }}</h1>
        <h1>{{ $user->updated_at }}</h1>
        <img src="{{ $user->avatar }}" alt="{{ $user->username }}">
    @endforeach

</body>
<script>
    setTimeout(() => {
        document.querySelector(".alert").style.display = 'none';
    }, 2000);
</script>

</html>
