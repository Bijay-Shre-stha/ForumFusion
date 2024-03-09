<x-navbar-layout>
    @section('title', 'Community Questions')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1 class="m-3 p-3 text-center">Community Questions</h1>
    <script src="https://cdn.tiny.cloud/1/ythi0j085mic4ki07jiqtc5bor4z4sutbc0bhh50nxh1r2xp/tinymce/6/tinymce.min.js"
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
        {{ ucfirst($communityQuestion->community_question_title) }}
        <p class="mt-2">Description: {{ ucfirst($communityQuestion->community_question_description) }}</p>
        <p>
            <small>
                Asked by: <span class=" fw-bold ">{{ $communityQuestion->user->username }}</span>,
                <br>
                <b>-{{ $communityQuestion->created_at->diffForHumans() }}</b>
            </small>
        </p>
    </div> <br>
    <hr class="border-3">
    <h2>Some Answers</h2>
    @if ($communityAnswers && count($communityAnswers) > 0)
        @foreach ($communityAnswers as $answer)
            <div class="card mb-3 mt-3">
                <div class="p-3 fs-6 ">
                    <p>
                        {!! ucfirst($answer->community_answer) !!}
                    </p>
                </div>
                <div class="card-footer">
                    <small class=" fs-5 ">
                        Answered: <br>
                        <div class=" mt-2 ">
                            <img src="{{ $answer->user->avatar }}" alt="{{ $answer->user->username }}" width="30"
                                height="30"> <span class=" fw-bold ">{{ $answer->user->username }}</span>,
                            <br>
                            <b>-{{ $answer->created_at->diffForHumans() }}</b>
                        </div>
                    </small>
                </div>
            </div>
        @endforeach
    @else
        <p>No answers found for this question.</p>
    @endif
    <hr class="border-3 mt-5">
    <h4 class="mt-2 pt-1 text-success">Your answer</h4>

    @auth
        <form action="{{ route('communityAnswer.store') }}" method="post">
            @csrf
            @method('POST')

            <input type="hidden" name="community_question_id" value="{{ $communityQuestion->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <textarea name="community_answer" id="community_answer"></textarea>
            <button type="submit" class="btn btn-success mt-3 p-3 fs-4">Post your answer</button>
        </form>
    @else
        <p>Please <strong><a href="{{ route('login') }}">log in</a></strong> to post an answer.</p>
    @endauth
    <script>
        setTimeout(function() {
            $('#successMessage').fadeOut('fast');
        }, 2000);
    </script>
</x-navbar-layout>
