<div x-data="{ open: $wire.entangle('showLogin') }">
    <div id="login" class="login__modal" x-show="open" style="display: none;">
        <div id="login__form" class="w-100p w-50p-md">
            <form wire:submit="submit" class="p-3">
                @guest
                    <div>@error('message') {{ $message }} @enderror</div>
                    <div class="form-group">
                        <input wire:model="email" placeholder="Email" type="email" name="email" id="email"
                               class="form-control" required>
                        <div>@error('email') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group">
                        <input wire:model="password" placeholder="Password" type="password" name="password"
                               id="password" class="form-control" required>
                        <div>@error('password') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <button wire:click="closeModal" type="button" class="btn ml-1">Close</button>
                    </div>
                @endguest
                @auth
                    <div wire:click="logout" class="btn btn-primary">Logout</div>
                    <button wire:click="closeModal" type="button" class="btn ml-1">Close</button>
                @endauth
            </form>
        </div>
    </div>
</div>

@script
<script>
    console.log('Login component loaded');
    document.addEventListener('keydown', function (event) {
        console.log('Login attempt');
        if (event.ctrlKey && event.key === 'm') {
            $wire.showLogin = !$wire.showLogin;
        }
    });
</script>
@endscript
