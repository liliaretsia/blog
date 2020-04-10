@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.tags._nav')

        <p><a href="{{ route('admin.tags.create') }}" class="btn btn-success">Add Tag</a></p>

        @include('admin.tags._list', ['tags' => $tags])
    </div>
@endsection
