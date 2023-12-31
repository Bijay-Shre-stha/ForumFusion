<x-navbar-layout>
    @section('title', 'create your question')
    <div class="card">
        <div class="card-body">
            <form action="{{route ("question.store")}}" method="post">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="question" class="form-label">Ask your question...</label>
                    <input type="text" name="title" class="form-control" id="question" aria-describedby="text">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Could you elaborate your question?</label><br>
                    <textarea name="description" id="" cols="142" rows="10"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-navbar-layout>
