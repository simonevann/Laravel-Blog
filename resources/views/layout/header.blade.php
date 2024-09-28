<header>
    <div id="header__logo">
        <livewire:site-logo/>
    </div>
    @auth
        <livewire:login.user-menu/>
    @endauth
    {{--<livewire:nav.categories-list />--}}
</header>
