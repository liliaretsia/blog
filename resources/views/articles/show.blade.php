@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex flex-row mb-3">
            <a href="/" class="btn btn-primary mr-1">На главную</a>
        </div>
        <table class="table table-bordered table-striped">
            <tbody>

            <tr>
                <th>Title</th><td>{{ $article->header }}</td>
            </tr>
            <tr>
                <th>Photo</th><td><img width="500px" src="{{ Storage::url($article->photo->file) }}" alt=""><br><br></td>
            </tr>

            </tbody>
        </table>
        <div class="card">
            <div class="card-body pb-1">
                {{ $article->content }}
            </div>
        </div>
</div>
@endsection
