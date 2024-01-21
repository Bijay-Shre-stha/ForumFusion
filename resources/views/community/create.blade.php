<x-navbar-layout>
    @section('title' , 'Create Community')
    <form action="{{ route('community.store') }}" method="post" class="form mt-auto ">
        @csrf
        <h2>Community Details</h2>

        <label for="communityName" class="label">Community Name:</label>
        <input type="text" id="communityName" name="communityName" class="input_label" required>
        <button type="submit" class="btn btn-success ">Submit</button>
    </form>
</x-navbar-layout>
