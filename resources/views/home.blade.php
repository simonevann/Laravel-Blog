@extends('layout.app')
@section('pageTitle', 'Home')

@section('content')
    <section id="home__content">
        <livewire:post.posts-list/>
    </section>
@endsection


