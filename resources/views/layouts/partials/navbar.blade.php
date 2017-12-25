<nav class="navbar is-transparent">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ env('APP_URL') }}">
      <img src="{{ asset('img/documentr-512w.png') }}" alt="Documentr: Realtime Markdown Editing for Developers" width="112" height="28">
    </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
    <div class="navbar-start">
      {{-- <a class="navbar-item" href="{{ env('APP_URL') }}">
        Home
      </a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="/documentation/overview/start/">
          Docs
        </a>
      </div> --}}
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
          @auth
          <figure class="image is-32x32">
            <img src="https://bulma.io/images/placeholders/32x32.png" class="is-profile-image">
          </figure>
          @else
          <p class="field">
            <a class="button is-primary">
              <icon name="github"></icon>
              <span>Github</span>
            </a>
          </p>
          </button>
          @endauth
        </div>
      </div>
    </div>
  </div>
</nav>
