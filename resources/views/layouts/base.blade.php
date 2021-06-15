<!DOCTYPE html>
<html lang="en">
<meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- head start --}}
  @include('layouts.assets.css')
  {{-- head end --}}
  <body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="app">
      <!-- Page Header Start-->
      @include('layouts.header.index')
      <!-- Page Header Ends-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        @include('layouts.sidebar.index')
        <!-- Page Sidebar Ends-->
        {{-- Page Body start --}}
        @include('layouts.pages.body')
        <vue-progress-bar></vue-progress-bar>
        {{-- Page Body end --}}
        <!-- footer start-->
        {{-- @include('layouts.footer.index') --}}
      </div>
    </div>
    {{-- js start --}}
    @include('layouts.assets.js')
    {{-- js end --}}
  </body>
</html>