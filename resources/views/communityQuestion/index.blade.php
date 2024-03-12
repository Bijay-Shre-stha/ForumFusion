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
    <div class="d-flex justify-content-end">
        <a href="{{ route('communityQuestion.create', $community_id) }}" class="btn btn-primary">Ask a Question</a>
    </div>
    <div class="row mt-4">
        @foreach ($communityQuestions as $communityQuestion)
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <h3>{{ $communityQuestion->community_question_title }}</h3>
                    <div class="d-flex flex-row gap-3">
                        <a href="{{ route('communityQuestion.show', $communityQuestion->id) }}" class="btn btn-success">View</a>
                        @if($communityQuestion->user_id == Auth::id())
                            <form action="{{ route('communityQuestion.destroy', $communityQuestion->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endif
                    </div>
                    
            </div>
            <p>- asked on {{ $communityQuestion->created_at->format('d M Y') }}</p>
        </div>
    @endforeach
    </div>
    {{-- <div class="d-flex justify-content-center">
        {{ $communityQuestions->links() }}
    </div> --}}

</x-navbar-layout>