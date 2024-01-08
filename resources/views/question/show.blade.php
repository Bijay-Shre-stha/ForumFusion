<x-navbar-layout>

    <div class=" fw-bolder fs-6 mt-5 ">
        {{ ucfirst($question->title) }}
        <p class="mt-2">Description: {{ ucfirst($question->description) }}</p>
        <p><small>Asked by :
                Unknown <br>
                <b>-{{ $question->created_at->diffForHumans() }}</b>
            </small></p>
    </div>
    <x-quill-layout/>

</x-navbar-layout>
