<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<!-- Create the editor container -->
<div id="editor">
    <p>Please Answer here...</p>
</div>

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    var editorContainer = document.getElementById('editor');

    document.addEventListener('click', function (event) {
        if (!editorContainer.contains(event.target)) {
            quill.root.innerHTML = '';
        }
        
        if (!editorContainer.contains(event.target) && quill.container.contains(document.activeElement)) {
            quill.root.innerHTML = '';
        }
    });
</script>
