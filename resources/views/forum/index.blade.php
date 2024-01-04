<x-navbar-layout>
    @section('title', 'forum')

    <body>

        <h2 class="">Questions: </h2>
        @foreach ($questions as $question)
            <div class=" fw-bolder fs-6 mt-5 ">
                {{ $loop->iteration }}. {{ucfirst( $question->title) }}
                <p class="mt-2">Description: {{ucfirst ($question->description)}}</p>
                <p><small>Asked by : Unknown
                    </small></p>
            </div>
        @endforeach
    </body>

</x-navbar-layout>
