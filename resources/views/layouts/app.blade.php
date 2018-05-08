<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Determine if the page has meta data, if not diplay default -->
    @hasSection('meta')
        @yield('meta')
    @else
        <meta name="description" content="Free reviews for fundraisers posted by peers that have already attended.">
    @endif
    <title>Fundraiser Reviews</title>
    
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body>
  <header>
    <div class="navbar navbar-light box-shadow">
      <div class="container d-flex justify-content-between">
        <a href="/" class="navbar-brand d-flex align-items-center">
          <strong>Fundraiser Reviews</strong>
        </a>
      </div>
    </div>
  </header>
  <div id="app">
  <main role="main">
          @yield('content')
  </main>

  <footer class="text-muted">
    <div class="container">
      <p class="float-right">
        <a href="#">Back to top</a>
      </p>
    </div>
  </footer>
</div>
<script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
