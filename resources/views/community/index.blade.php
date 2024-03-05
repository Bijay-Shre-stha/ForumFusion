<x-navbar-layout>
    @section('title', 'Communities')
    <h1 class="mt-4">Communities</h1>
    <a href="{{ route('community.create') }}" class="m-4">
        <button class="btn btn-success m-4">Create community</button>
    </a>

    <div class="row">
        @forelse ($communities as $community)
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="">{{ $community->communityName }}</h5>
                    <a href="{{ route('community.show', $community->communityName) }}" class="btn btn-primary">View</a>
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
        @empty
            <div class="alert alert-danger" role="alert">
                No communities created
            </div>
        @endforelse
    </div>
</x-navbar-layout>
