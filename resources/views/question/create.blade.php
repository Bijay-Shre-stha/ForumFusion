<x-navbar-layout>
    @section('title', 'create your question')

    @if ($errors->any())
        <div id="errorMessage" class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif

    <script src="https://cdn.tiny.cloud/1/ythi0j085mic4ki07jiqtc5bor4z4sutbc0bhh50nxh1r2xp/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea',
        toolbar: 'undo redo | formatselect | bold italic underline strikethrough | link image media table | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | emoticons charmap | removeformat',
        height: 300,
        menubar: true,
        plugins: 'lists table emoticons',
    });
</script>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('question.store') }}" method="post">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="question" class="form-label">Ask your question...</label>
                    <input type="text" name="title" class="form-control" id="question" aria-describedby="text"
                        placeholder="What is your question?"
                        value="{{ old('title') }}"
                    >
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Could you elaborate your question?</label><br>
                    <textarea name="description" id="description">
                        {{ old('description') }}
                    </textarea>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script>
        setTimeout(function() {
            $('#errorMessage').fadeOut('fast');
        }, 2000);
    </script>
</x-navbar-layout>
