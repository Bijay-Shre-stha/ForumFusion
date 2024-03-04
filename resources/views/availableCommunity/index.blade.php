<x-navbar-layout>
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
    <h1 class="m-3 p-3 text-center">Available Communities</h1>
    <div class="row">
        @foreach ($communities as $community)
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h5>{{ $community->communityName }}</h5>
                    <form action="{{ route('availableCommunity.join', $community->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="communityName" value="{{ $community->communityName }}">
                        {{-- <input type="hidden" name="joinedUserIds" value="{{ Auth::user()->id }}"> --}}
                        <button type="submit" class="btn btn-success">Join</button>
                    </form>
                </div>
                <div class="card-footer d-flex justify-content-between m-3">
                    <p class="text-muted cursor-pointer name_hover">
                        Created by: <img src="{{ $community->user->avatar }}" alt="{{ $community->user->username }}"
                            width="35" height="35" class="rounded-circle ">
                        <span class="hover_show fw-bolder ">
                            {{ $community->user->username }}
                        </span>
                    </p>
                    <span class="fw-bolder">{{ \Carbon\Carbon::parse($community->created_at)->format('Y-m-d') }}</span>
                </div>
            </div>
        @endforeach
    </div>
</x-navbar-layout>
