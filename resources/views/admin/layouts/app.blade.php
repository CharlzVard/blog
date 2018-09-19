
<!doctype html>
<html lang="en">
<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Vard's Site.">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="Charlz Vard">
  <!-- For IE 9 and below. ICO should be 32x32 pixels in size -->
  <!--[if IE]><link rel="shortcut icon" href="{{ asset('/favicon-32x32.png') }}"><![endif]-->
  <!-- Touch Icons - iOS and Android 2.1+ 180x180 pixels in size. --> 
  <link rel="apple-touch-icon-precomposed" href="{{ asset('/apple-touch-icon-180x180.png') }}">
  <!-- Firefox, Chrome, Safari, IE 11+ and Opera. 196x196 pixels in size. -->
  <link rel="icon" href="{{ asset('/favicon-32x32.png') }}">
  <!-- Bootstrap CSS & Font Awesome JS -->
  <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('/css/select2.min.css') }}" crossorigin="anonymous">
  <script defer src="{{ asset('/js/fontawesome.min.js') }}" crossorigin="anonymous"></script>
  <!-- User style -->
  <link rel="stylesheet" href="{{ asset('/css/redactor.min.css') }}" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('/css/filemanager.min.css') }}" crossorigin="anonymous">
	
  <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}" crossorigin="anonymous">

  <title>@yield('title')</title>
</head>
<body>

    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('admin.index') }}">{{ config('app.name', 'Laravel') }}</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="{{ url('/') }}">2 site</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link{{{ Route::is('admin.index') ? ' active' : '' }}}" href="{{ route('admin.index') }}">
                  <span data-feather="home"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link{{{ Request::is('admin/category*') ? ' active' : '' }}}" href="{{ route('admin.category.index') }}">
                  <span data-feather="file"></span>
                  Категории
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link{{{ Request::is('admin/article*') ? ' active' : '' }}}" href="{{ route('admin.article.index') }}">
                  <span data-feather="file"></span>
                  Статьи
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Integrations
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

            @yield('content')

        </main>
      </div>
    </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{ asset('/js/jquery-3.3.1.min.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('/js/popper.min.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('/js/select2.min.js') }}" crossorigin="anonymous"></script>

  <!-- Icons -->
  <script src="{{ asset('/js/feather.min.js') }}"></script>
  <script>
    feather.replace()
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select2').select2({
            closeOnSelect: false,
        });
        $(".tags").select2({
            tags: true,
            closeOnSelect: false,
            tokenSeparators: [',', ' ']
        })
    });
  </script>

  <!-- js -->
  <script src="{{ asset('/js/redactor.js') }}"></script>

  <!-- plugin js -->
  <script src="{{ asset('/js/plugins/alignment.min.js') }}"></script>
  <script src="{{ asset('/js/plugins/imagemanager.min.js') }}"></script>
  <script src="{{ asset('/js/plugins/table.min.js') }}"></script>
  <script src="{{ asset('/js/plugins/fullscreen.min.js') }}"></script>
  <script src="{{ asset('/js/plugins/counter.min.js') }}"></script>
  <script src="{{ asset('/js/plugins/filemanager.min.js') }}"></script>
  <script src="{{ asset('/js/plugins/properties.min.js') }}"></script>
  <script src="{{ asset('/js/plugins/specialchars.min.js') }}"></script>
  <script src="{{ asset('/js/plugins/video.min.js') }}"></script>


  <!-- call -->
  <script>
    $R('#redactor', { 
      plugins: [
        'counter',
        'alignment',
        'specialchars',
        'table',
        'imagemanager',
        'filemanager',
        'video',
        'properties',
        'fullscreen',
      ],
      imageUpload: '{{ route("uploadImage") }}',
      imageManagerJson: '{{ route("images") }}',
      imagePosition: true,
      imageResizable: true,
      fileUpload: '{{ route("uploadFile") }}',
      fileManagerJson: '{{ route("files") }}',
    });
  </script>

</body>
</html>