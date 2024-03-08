<x-navbar-layout>
    @section('title', 'Ask a Question')

    @if ($errors->any())
        <div id="errorMessage" class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif

    <h1 class="m-3 p-3 text-center">Ask a Question</h1>
    <div class="d-flex justify-content-center">
        <form action="{{ route('communityQuestion.store') }}" method="post">

            @csrf
            @method('post')
            <input type="hidden" name="community_id" value="{{ $community }}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="mb-3">
                <label for="community_question_title" class="form-label">Ask your question...</label>
                <input type="text" name="community_question_title" class="form-control" id="question" aria-describedby="text">
            </div>
            <div class="mb-3">
                <label for="community_question_description" class="form-label">Could you elaborate your question?</label><br>
                <textarea class="p-3" name="community_question_description" id="" cols="142" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        setTimeout(function() {
            $('#errorMessage').fadeOut('fast');
        }, 2000);
    </script>
</x-navbar-layout>

