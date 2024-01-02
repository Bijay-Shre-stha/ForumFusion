<x-navbar-layout>
    @section('title', 'forum')
<body>
    @foreach ($users as $user )
    <h2>Question:
        {{-- <a href="/forum/{{ $question->id }}">{{ $question->title }}</a> --}}
    </h2>
        <span>{{ $user->username }}</span>
        <p class="text-muted">Joined {{ $user->created_at->diffForHumans() }}. Posted

    @endforeach
</body>

</x-navbar-layout>
