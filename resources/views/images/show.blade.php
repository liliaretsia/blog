@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-row mb-3">
            <a href="/" class="btn btn-primary mr-1">На главную</a>
        </div>
        <table class="table table-bordered table-striped">
            <tbody>
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
