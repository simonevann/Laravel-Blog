@extends('layout.app')
@section('pageTitle', $category->name )
@section('content')
    <h1 class="category__title">{{ $category->name }}</h1>
    <section id="category__content">
        <livewire:post.posts-list :categoryId="$category->id"/>
    </section>
@endsection
