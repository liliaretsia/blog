@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.images._nav')

        <p><a href="{{ route('admin.images.create') }}" class="btn btn-success">Add Image</a></p>

        <div class="card mb-3">
            <div class="card-header">Filter</div>
            <div class="card-body">
                <form action="?" method="GET">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="tag" class="col-form-label">Tags</label>
                                <select id="tag" class="form-control" multiple name="tag[]">
                                    <option value=""></option>
                                    @foreach ($tags as $value => $label)
                                        <option value="{{ $value }}"{{ !empty($filteredTags) && in_array($value, $filteredTags) ? ' selected' : '' }}>{{ $label }}</option>
                                    @endforeach;
                                </select>
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
                <th>Description</th>
                <th>Tags</th>
                <th>Photos</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($images as $image)
                <tr>
                    <td><a href="{{ route('admin.images.show', $image) }}">{{ $image->id }}</a></td>
                    <td>{{ $image->content }}</td>
                    <td>
                @foreach ($image->tags as $tag)
                    <span class="badge badge-secondary">{{ $tag->name }}</span>
                @endforeach
                    </td>
                    <td>
                        @foreach ($image->photos as $photo)
                            <img width="100px" src="{{ Storage::url($photo->file) }}" alt="">
                        @endforeach
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
