@extends('partials.layout')
@section('title', $post->title)
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 shadow-xl min-h-full">
            @if ($post->image)
                <figure>
                    <img src="{{ $post->image }}" alt="Shoes" />
                </figure>
            @endif
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p>{!! $post->displayBody !!}</p>
                <p class="text-neutral-content">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
@endsection
