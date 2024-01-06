<x-navbar-layout>
    @section('title', 'Forum')

    <body>

        @foreach ($questions as $question)
            <div class=" fw-bolder fs-6 mt-5 ">
                {{ $loop->iteration }}. {{ucfirst( $question->title) }}
                <p class="mt-2">Description: {{ ucfirst($question->description) }}</p>
                <p><small>Asked by :
                        {{ $question->user->username }} <br>
                        <b>-{{ $question->created_at->diffForHumans() }}</b>
                    </small></p>
            </div>
        @endforeach
    </body>

</x-navbar-layout>
