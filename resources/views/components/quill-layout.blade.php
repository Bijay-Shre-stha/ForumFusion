<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<!-- Create the editor container -->
<h3 class="mx-2">Your answer</h3>
<div id="editor" class="editor">
</div>

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor and blur it -->
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
</script>
