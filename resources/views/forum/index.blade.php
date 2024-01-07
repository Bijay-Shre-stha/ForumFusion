<x-navbar-layout>
    @section('title', 'Forum')

    <body>
        <!-- Search -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('forum.index') }}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search Question"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Search -->

        @foreach ($questions as $question)
            <div class=" fw-bolder fs-6 mt-5 ">
                {{ $loop->iteration }}. {{ ucfirst($question->title) }}
                <p class="mt-2">Description: {{ ucfirst($question->description) }}</p>
                <p><small>Asked by :
                        Unknown <br>
                        <b>-{{ $question->created_at->diffForHumans() }}</b>
                    </small></p>
            </div>
        @endforeach
    </body>

</x-navbar-layout>
