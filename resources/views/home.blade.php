@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-default mb-3">
            <div class="card-header">
                All News
            </div>
            <div class="card-body pb-0" style="color: #aaa">
                <div class="row">
                    @foreach ($articles as $article)
                        <div class="col-md-3">
                            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->header }}</a>
                        </div>
                        <div class="col-md-9">
                            {{ $article->content }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card card-default mb-3">
            <div class="card-header">
                All Galleries
            </div>
            <div class="card-body pb-0" style="color: #aaa">
                <div class="row">
                    @foreach ($images as $image)
                        <div class="col-md-6">
                            <a href="{{ route('images.show', $image) }}">{{ $image->content }}</a>
                        </div>
                        <div class="col-md-6">
                            @foreach ($image->tags as $tag)
                                <span class="badge badge-secondary">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
