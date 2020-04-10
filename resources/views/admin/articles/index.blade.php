@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.articles._nav')

        <p><a href="{{ route('admin.articles.create') }}" class="btn btn-success">Add Article</a></p>

        <div class="card mb-3">
            <div class="card-header">Filter</div>
            <div class="card-body">
                <form action="?" method="GET">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Header</label>
                                <input id="name" class="form-control" name="header" value="{{ request('header') }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="date-picker" class="col-form-label">Created date</label>
                                <input placeholder="Selected date" type="text" name="created" id="date-picker" class="form-control datepicker">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="col-form-label">&nbsp;</label><br />
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Header</th>
                <th>Created at</th>
                <th>Main Photo</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td><a href="{{ route('admin.articles.show', $article) }}">{{ $article->slug }}</a></td>
                    <td>{{ $article->header }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td><img width="100px" src="{{ Storage::url($article->photo->file) }}" alt=""></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
