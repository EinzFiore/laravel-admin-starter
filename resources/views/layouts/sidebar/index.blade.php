<div class="sidebar-wrapper">
    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="<?= url('assets/images/logo/logo.png')?>" alt=""><img class="img-fluid for-dark" src="assets/images/logo/logo_dark.png" alt=""></a>
      <div class="back-btn"><i class="fa fa-angle-left"></i></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="assets/images/logo/logo-icon.png" alt=""></a></div>
    <nav class="sidebar-main">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="sidebar-menu">
        <ul class="sidebar-links custom-scrollbar">
          <li class="back-btn"><a href="index.html"><img class="img-fluid" src="assets/images/logo/logo-icon.png" alt=""></a>
            <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
          </li>
          <li class="sidebar-main-title">
            <div>
              <h6 class="lan-1">General</h6>
              <p class="lan-2">Dashboards,widgets & layout.</p>
            </div>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link" href="#"><i data-feather="home"></i><span class="lan-3">Dashboard</span></a>
          </li>
          @can('manage-user')
          <li class="sidebar-main-title">
            <div>
              <h6>Management User</h6>
              <p>create users and roles</p>
            </div>
          </li>
            <li class="sidebar-list">
              <a class="sidebar-link active" href="{{route('admin.users.list')}}"><i data-feather="users"></i><span>Users</span></a>
          </li>
          @endcan
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
  </div>