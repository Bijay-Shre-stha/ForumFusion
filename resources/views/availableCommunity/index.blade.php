<x-navbar-layout>
    <h1 class=" m-3 p-3 text-center ">Available Communities</h1>
    <div class="row">
        @foreach ($communities as $community)
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="">{{ $community->communityName }}</h5>
                    @auth
                    <a href="{{ route('community.show', $community->communityName) }}" class="btn btn-success">Join</a>
                    @endauth
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
