<x-navbar-layout>
    <div class=" fw-bolder fs-6 mt-5">
        {{ ucfirst($question->title) }}
        <p class="mt-2">Description: {{ ucfirst($question->description) }}</p>
        <p>
            <small>
                Asked by: Unknown <br>
                <b>-{{ $question->created_at->diffForHumans() }}</b>
            </small>
        </p>
    </div> <br>

    <h1>Some Answers</h1>
    @if ($answers)
        @foreach ($answers as $answer)
            <div class="card mb-3 mt-5">
                <div class="card p-3 fs-6 fw-bolder">
                    Answer: {{ ucfirst($answer->answer) }}
                </div>
            </div>
        @endforeach
    @else
        <p>No answers found for this question.</p>
    @endif
    {{-- <x-quill-layout /> --}}
    <form action="{{ route('answer.store') }}" method="post">
        @csrf
        @method('POST')

        <input type="hidden" name="question_id" value="{{ $question->id }}">
        <textarea name="answer" id="answer" cols="30" rows="10"></textarea>
        <button type="submit" class="btn btn-success mt-3 p-3">Post your answer</button>
    </form>

</x-navbar-layout>
