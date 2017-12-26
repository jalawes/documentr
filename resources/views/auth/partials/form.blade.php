<div class="card">
    <header class="card-header">
        <p class="card-header-title">
            Log In
        </p>
    </header>
    <div class="card-content">
        <div class="content">
            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}
                <div class="field">
                    <label class="label" for="email">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" name="email" placeholder="Email">
                        <span class="icon is-small is-left"><i class="fa fa-envelope"></i></span>
                        @if ($errors->has('email'))
                            <span class="icon is-small is-right"><i class="fa fa-warning"></i></span>@endif
                    </div>
                    @if ($errors->has('email'))<p class="help is-danger">{{ $errors->first('email') }}</p>@endif
                </div>

                <div class="field">
                    <label class="label" for="password">Password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="password" name="password" placeholder="********">
                        <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                        @if ($errors->has('password'))
                            <span class="icon is-small is-right"><i class="fa fa-warning"></i></span>@endif
                    </div>
                    @if ($errors->has('password'))<p class="help is-danger">{{ $errors->first('password') }}</p>@endif
                </div>
                <div class="field">
                    <button class="button is-info is-fullwidth">Log In</button>
                </div>
            </form>
        </div>
    </div>
</div>
