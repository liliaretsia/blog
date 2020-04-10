@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.articles._nav')
        <form method="POST" action="{{ route('admin.articles.store') }}">
            @csrf

            <div class="form-group">
                <label for="header" class="col-form-label">Header</label>
                <input id="header" class="form-control{{ $errors->has('header') ? ' is-invalid' : '' }}" name="header" value="" required>
                @if ($errors->has('header'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('header') }}</strong></span>
                @endif
            </div>

            <div class="form-group">
                <label for="slug" class="col-form-label">Slug</label>
                <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="" required>
                @if ($errors->has('slug'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>
                @endif
            </div>

            <div class="form-group">
                <label for="content" class="col-form-label">Content</label>
                <textarea id="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" rows="3"></textarea>
                @if ($errors->has('content'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('content') }}</strong></span>
                @endif
            </div>

            <div class="form-group">
                <label for="photo_id" class="col-form-label">Main photo</label>
                <select id="photo_id" class="form-control{{ $errors->has('photo_id') ? ' is-invalid' : '' }}" name="photo_id">
                    @foreach ($photo_ids as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach;
                </select>
                @if ($errors->has('photo_id'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('photo_id') }}</strong></span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
