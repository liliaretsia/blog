@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.images._nav')

        <div class="d-flex flex-row mb-3">
            <a href="{{ route('admin.images.edit', $image) }}" class="btn btn-primary mr-1">Edit</a>
            <a href="{{ route('admin.photos', $image) }}" class="btn btn-primary mr-1">Photos</a>
            <form method="POST" action="{{ route('admin.images.destroy', $image) }}" class="mr-1">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>

        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>ID</th><td>{{ $image->id }}</td>
            </tr>
            <tr>
                <th>Path</th><td>{{ $image->path }}</td>
            </tr>
            <tr>
                <th>Description</th><td>{{ $image->content }}</td>
            </tr>
            <tr>
                <th>Tags</th>
                <td>
                    @foreach ($image->tags as $tag)
                        <span class="badge badge-secondary">{{ $tag->name }}</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Photos</th>
                <td>
                    @foreach ($image->photos as $photo)
                        <img width="500px" src="{{ Storage::url($photo->file) }}" alt=""><br><br>
                    @endforeach
                </td>
            </tr>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
