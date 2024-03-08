<x-navbar-layout>
    @section('title', 'Community Questions')
    <h1 class="m-3 p-3 text-center">Community Questions</h1>
    <div class="d-flex justify-content-end">
        <a href="{{ route('communityQuestion.create') }}" class="btn btn-primary">Ask a Question</a>
    </div>
    <div class="row mt-4">
        @foreach ($communityQuestions as $communityQuestion)
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h3>{{ $communityQuestion->community_question_title }}</h3>
                    <div class=" d-flex flex-row gap-3  ">
                        <a href="{{ route('communityQuestion.show', $communityQuestion->id) }}" class="btn btn-success">View</a>
                        <form action="{{ route('communityQuestion.destroy', $communityQuestion->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
                <p>- asked on {{ $communityQuestion->created_at->format('d M Y') }}
                </p>
            </div>
        @endforeach
    </div>
    {{-- <div class="d-flex justify-content-center">
        {{ $communityQuestions->links() }}
    </div> --}}

</x-navbar-layout>