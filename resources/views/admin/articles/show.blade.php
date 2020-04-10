@extends('layouts.app')
@section('content')
    <div class="container">
        @include('admin.articles._nav')
        <div class="d-flex flex-row mb-3">
            <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-primary mr-1">Edit</a>
            <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" class="mr-1">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>ID</th><td>{{ $article->id }}</td>
            </tr>
            <tr>
                <th>Title</th><td>{{ $article->header }}</td>
            </tr>
            <tr>
                <th>Photo</th><td><img width="500px" src="{{ Storage::url($article->photo->file) }}" alt=""><br><br></td>
            </tr>
            <tr>
                <th>Slug</th><td>{{ $article->slug }}</td>
            </tr>
            </tbody>
        </table>
        <div class="card">
            <div class="card-body pb-1">
                {!! nl2br(e($article->content)) !!}
            </div>
        </div>
    </div>
@endsection
