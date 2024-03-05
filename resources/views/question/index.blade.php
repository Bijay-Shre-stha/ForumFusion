<x-navbar-layout>
    @section('title', 'Question')

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Questions</h1>
                    <a href="{{ route('question.create') }}" class="btn btn-success mt-3 p-2">Create Question</a>
                </div>
            </div>
            @foreach ($questions as $question)
                <div class="card mb-3 mt-5 " style="max-width: 1000px;">
                    <div class="card p-3 fs-6 fw-bolder ">
                        Question: {{ ucfirst($question->title) }}
                        <br>
                        Description: {{ ucfirst($question->description) }}
                    </div>
                    <div class="card-header">
                        <a href="{{ route('question.show', $question->id) }}" class="btn btn-primary">Show</a>
                        <form action="{{ route('question.destroy', $question->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
</x-navbar-layout>
