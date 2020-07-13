<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
        <title>Dashboard Admin</title>
    </head>
    <body>
        <header>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </header>
        <main class="dashboard-wrapper">
            <aside class="dashboard-navbar">
                <a href=" {{ route("admin.home") }}">Home</a>
            </aside>
            <div class="dashboard-content">
                @yield("content")
            </div>
        </main>
    </body>
</html>
