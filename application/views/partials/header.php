<!doctype html>
  <html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Porvoks">
    <title>Porvoks - <?=$title?></title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sticky-footer-navbar/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="<?=base_url('')?>assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script> 
    <script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script> 
  </head>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>
</head>
<body class="d-flex flex-column h-100">

  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?=site_url('/')?>">Porvoks</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link <?php if($this->uri->segment(1) == "" || $this->uri->segment(1) == "beranda"){echo 'active';}?>" href="<?=site_url('/')?>">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($this->uri->segment(1) == "chart"){echo 'active';}?>" href="<?=site_url('chart')?>">Chart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($this->uri->segment(1) == "import"){echo 'active';}?>" href="<?=site_url('import')?>">Import Excel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($this->uri->segment(1) == "export-excel"){echo 'active';}?>" href="<?=site_url('export-excel')?>">Export Excel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($this->uri->segment(1) == "export-pdf"){echo 'active';}?>" href="<?=site_url('export-pdf')?>">Export PDF</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($this->uri->segment(1) == "berita"){echo 'active';}?>" href="<?=site_url('berita')?>">Berita</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>