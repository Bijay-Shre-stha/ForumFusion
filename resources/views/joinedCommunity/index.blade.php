<x-navbar-layout>
    @section('title', 'Joined Communities')
    <h1 class="m-3 p-3 text-center">Joined Communities</h1>
    <div class="row">
        @foreach ($communities as $community)
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h3>{{ $community->userCommunity->communityName }}</h3>
                    <div class=" d-flex flex-row gap-3  ">
                        <a href="{{ route('joinedCommunity.show', $community->id) }}" class="btn btn-success">View</a>
                        <form action="{{ route('joinedCommunity.leave', $community->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="communityName" value="{{ $community->communityName }}">
                            <button type="submit" class="btn btn-danger">Leave</button>
                        </form>
                    </div>
                </div>
                <p>- joined on {{ $community->created_at->format('d M Y') }}
                </p>
            </div>
        @endforeach
    </div>

</x-navbar-layout>
