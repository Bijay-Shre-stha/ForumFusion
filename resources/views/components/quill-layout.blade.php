<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    .editor {
        height: 200px;
        width: 100%;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 20px;
    }
</style>

<!-- Create the editor container -->
<h3 class="mx-2">Your answer</h3>
<form action="{{ route('answer.store') }}" method="POST">
    @csrf
    @method('POST')

    <input type="hidden" name="answer" id="answerInput">

    <input type="hidden" name="question_id" value="{{ $question->id }}">

    <div id="editor" class="editor"></div>

    <button type="submit" class="btn btn-success mt-3 p-3">Post your answer</button>
</form>

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor and blur it -->
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

</script>
