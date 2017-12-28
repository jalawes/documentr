<div class="card">
    <header class="card-header">
        <p class="card-header-title">Profile</p>
        {{-- @if (Auth::user()->) --}}
        <a href="{{ route('logout') }}"
           class="card-header-icon"
           aria-label="more options"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <button class="button is-small">Log Out</button>
        </a>
    </header>
    <form action="{{ route('profiles.update', $profile_user) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="card-content">
            <div class="column is-12">
                {{-- Email Form Field --}}
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="email">Email</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input"
                                       type="email"
                                       placeholder="johndoe@example.com"
                                       readonly
                                       value="{{ $profile_user->email }}">
                                <span class="icon is-small is-left"><i class="fa fa-envelope"></i></span>
                                @if($errors->has('email'))
                                    <span class="icon is-small is-right has-text-warning"><i class="fa fa-warning"></i></span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                {{-- First name Form Field --}}
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="first_name">First name</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input"
                                       type="text"
                                       placeholder="John"
                                       name="first_name"
                                       value="{{ $profile_user->first_name }}">
                                <span class="icon is-small is-left"><i class="fa fa-address-card-o"></i></span>
                                @if($errors->has('first_name'))
                                    <span class="icon is-small is-right has-text-warning"><i class="fa fa-warning"></i></span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Last name Form Field --}}
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="last_name">Last name</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input"
                                       type="text"
                                       placeholder="Doe"
                                       name="last_name"
                                       value="{{ $profile_user->last_name }}">
                                <span class="icon is-small is-left"><i class="fa fa-address-card-o"></i></span>
                                @if($errors->has('last_name'))
                                    <span class="icon is-small is-right has-text-warning"><i class="fa fa-warning"></i></span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="card-footer">
            <div class="buttons is-right card-footer-item">
                <button class="button is-white is-small is-pulled-right tooltip" data-tooltip="Save">
                    <icon name="floppy-o"></icon>
                </button>
            </div>
        </footer>
    </form>
</div>
