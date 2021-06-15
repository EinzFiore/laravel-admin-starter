<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               @yield('page-title')</h3>
          </div>
          @include('layouts.pages.partials.breadcumb')
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <router-view></router-view>
    @yield('content')
    <!-- Container-fluid Ends-->
  </div>