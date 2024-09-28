@extends('layout.app')
@section('pageTitle', $post->title )
@section('title', $post->title)
@section('meta_keywords', $post->meta_keywords)

@section('content')
    <article id="single_article" class="pr-3">
        <livewire:post.post :post="$post"/>
    </article>
@endsection
@section('header')
