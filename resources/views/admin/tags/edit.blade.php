@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.tags._nav')

        <form method="POST" action="{{ route('admin.tags.update', $tag) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="col-form-label">Name</label>
                <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $tag->name) }}" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
