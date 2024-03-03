<x-navbar-layout>
    <h1 class="m-3 p-3 text-center">Joined Communities</h1>
    <div class="row">
        @foreach ($communities as $community)
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h3>{{ $community->userCommunity->communityName }}</h3>
                    {{-- <form action="{{ route('joinedCommunity.leave', $community->id) }}" method="POST"> --}}
                    @csrf
                    <input type="hidden" name="communityName" value="{{ $community->communityName }}">
                    <button type="submit" class="btn btn-danger">Leave</button>
                    </form>
                </div>
                <p>- joined on {{ $community->created_at->format('d M Y') }}
                </p>
            </div>
        @endforeach
    </div>

</x-navbar-layout>
