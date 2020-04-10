@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.images._nav')

        <form method="POST" action="{{ route('admin.images.update', $image) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="path" class="col-form-label">Path</label>
                <input id="path" class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}" name="path" value="{{ old('path', $image->path) }}" required>
                @if ($errors->has('path'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('path') }}</strong></span>
                @endif
            </div>

            <div class="form-group">
                <label for="content" class="col-form-label">Description</label>
                <textarea id="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" rows="3">{{ old('content', $image->content) }}</textarea>
                @if ($errors->has('content'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('content') }}</strong></span>
                @endif
            </div>

            <div class="form-group">
                <label for="tag" class="col-form-label">Tags</label>
                <select id="tag" class="form-control{{ $errors->has('tag') ? ' is-invalid' : '' }}" multiple name="tag[]">
                    @foreach ($tags as $value => $label)
                        <option value="{{ $value }}"{{ in_array($value, $imageTags) ? ' selected' : '' }}>{{ $label }}</option>
                    @endforeach;
                </select>
                @if ($errors->has('tag'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('tag') }}</strong></span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
