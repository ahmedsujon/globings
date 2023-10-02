<div>
    <a class="dropdown-item text-danger" href="{{ route('user.logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
            key="t-logout">Logout</span></a>
    <form id="logout-form" style="display: none;" method="POST"
        action="{{ route('user.logout') }}">
        @csrf
    </form>
</div>
