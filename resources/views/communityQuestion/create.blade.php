@extends('layouts.app')

@section('title', 'Ask a Question')

@section('content')
    @if ($errors->any())
        <div id="errorMessage" class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    <x-navbar-layout>
        <h1 class="m-3 p-3 text-center">Ask a Question</h1>
        <div class="d-flex justify-content-center">
            <form method="POST" action="{{ route('communityQuestion.store') }}">
                @csrf
                <input type="hidden" name="community_id" value="{{ $id }}">
                <div class="form-group">
                    <label for="community_question_title">Title</label>
                    <input type="text" class="form-control" id="community_question_title"
                        name="community_question_title">
                </div>
                <div class="form-group">
                    <label for="community_question_description">Description</label>
                    <textarea class="form-control p-3" id="community_question_description" name="community_question_description"
                        row="10" cols="140"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </x-navbar-layout>
@endsection

@section('styles')
    <!-- Additional CSS for this page -->
    <link rel="stylesheet" href="{{ asset('assets/css/community.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
@endsection
