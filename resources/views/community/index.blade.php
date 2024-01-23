<x-navbar-layout>
    <a href="{{ route ('community.create')}}">
        <button class="btn btn-success">Create community</button>
    </a>
    @foreach ($orgs as $community)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $community->org_id }}</h5>
                {{-- <a href="{{ route('community.show', $community->id) }}" class="btn btn-primary">View</a> --}}
            </div>
        </div>
    @endforeach
</x-navbar-layout>
