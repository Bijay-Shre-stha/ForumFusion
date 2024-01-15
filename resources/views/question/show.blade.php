<x-navbar-layout>
    <script src="https://cdn.tiny.cloud/1/qsgenrtp7nklwvekddcbecmq27ani54uo3kkrdp5cn9np3bg/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            toolbar: 'undo redo | formatselect | bold italic underline strikethrough | link image media table | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | emoticons charmap | removeformat',
            height: 300,
            menubar: true,
            plugins: 'lists table emoticons',
        });
    </script>

    <div class="fw-bolder fs-6 mt-3">
        {{ ucfirst($question->title) }}
        <p class="mt-2">Description: {{ ucfirst($question->description) }}</p>
        <p>
            <small>
                Asked by: {{ $question->user->username }},
                <br>
                <b>-{{ $question->created_at->diffForHumans() }}</b>
            </small>
        </p>
    </div> <br>
    <hr class="border-3">
    <h2>Some Answers</h2>
    @if ($answers && count($answers) > 0)
        @foreach ($answers as $answer)
            <div class="card mb-3 mt-3">
                <div class="p-3 fs-6 fw-bolder">
                    Answer: {!! ucfirst($answer->answer) !!}
                </div>
            </div>
        @endforeach
    @else
        <p>No answers found for this question.</p>
    @endif
    <hr class="border-3 mt-5">
    <h4 class="mt-2 pt-1 text-success">Your answer</h4>

    @auth
        <form action="{{ route('answer.store') }}" method="post">
            @csrf
            @method('POST')

            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <textarea name="answer" id="answer"></textarea>
            <button type="submit" class="btn btn-success mt-3 p-3 fs-4">Post your answer</button>
        </form>
    @else
        <p>Please <strong><a href="{{ route('login') }}">log in</a></strong> to post an answer.</p>
    @endauth
</x-navbar-layout>
