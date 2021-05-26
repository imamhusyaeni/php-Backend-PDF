<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>@yield('title')</title>
  </head>
  <body>
    <div class="container">
      <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <ul style="list-style:none;">
              @if (auth()->user()->name == "")
                <li class="navbar-brand">Hy , {{ auth()->user()->email }}</li>
              @else
                <li class="navbar-brand">Hy , {{ auth()->user()->name }}</li>
              @endif
              <li><a href="{{ route('order-history') }}">{{ $count }}</a> unpaid order</li>
            </ul>
            <div class="collapse navbar-collapse">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('prepaid') }}">Prepaid Balance</a>
                </li>
                <li class="nav-item">
                  <span class="nav-link">|</span>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('product') }}">Product Page</a>
                </li>
                <li class="nav-item">
                  <span class="nav-link">|</span>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}">Log out</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </section>

      <section>
        @yield('content')
      </section>

    </div>
  </body>
</html>