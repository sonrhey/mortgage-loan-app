<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('template_resources/assets/') }}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title>Mortgage - Admin Dashboard</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ asset('template_resources/assets/img/favicon/favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('template_resources/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('template_resources/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('template_resources/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('template_resources/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('template_resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('template_resources/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <script src="{{ asset('template_resources/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('template_resources/assets/js/config.js') }}"></script>
    @yield('custom-css')
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>
          <div class="menu-inner-shadow"></div>
          @include('admin.layouts.navigation.index')
        </aside>
        <div class="layout-page">
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
            </div>
          </nav>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              @include('admin.layouts.page-title.index')
              @yield('content')
            </div>
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    @include('admin.layouts.alerts.toast.index')
    <?php
    $user = Auth::user(); 
    $token =  $user->createToken('token')->plainTextToken;
    ?>
    <script type="text/javascript">
      const base = {!! json_encode(url('/')) !!}
      const APP_URL = `${base}/api`
      const token = "{{ $token }}"
    </script>
    <script src="{{ asset('template_resources/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('template_resources/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('template_resources/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template_resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('template_resources/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('template_resources/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('template_resources/assets/js/main.js') }}"></script>
    <script src="{{ asset('template_resources/assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('js/accounting.js') }}"></script>
    <script src="{{ asset('js/waitMe.min.js') }}"></script>
    <script src="{{ asset('js/toast.js') }}"></script>
    <script src="{{ asset('js/constants/server-responses.js') }}"></script>
    <script src="{{ asset('js/constants/prompt-messages.js') }}"></script>
    <script src="{{ asset('js/common-services/index.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://kit.fontawesome.com/36dee43059.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @yield('custom-js')
  </body>
</html>
