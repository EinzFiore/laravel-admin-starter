
<div class="page-header">
    <div class="header-wrapper row m-0">
      <form class="form-inline search-full" action="#" method="get">
        <div class="form-group w-100">
          <div class="Typeahead Typeahead--twitterUsers">
            <div class="u-posRelative">
              <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
              <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
            </div>
            <div class="Typeahead-menu"></div>
          </div>
        </div>
      </form>
      <div class="header-logo-wrapper">
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="assets/images/logo/logo.png" alt=""></a></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="sliders"></i></div>
      </div>
      <div class="left-header col horizontal-wrapper pl-0">
      </div>
      <div class="nav-right col-8 pull-right right-header p-0">
        <ul class="nav-menus">
          {{-- notif --}}
          @include('layouts.header.partials.notif')
          <li>
            <div class="mode"><i class="fa fa-moon-o"></i></div>
          </li>
          <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
          <li class="profile-nav onhover-dropdown p-0 mr-0">
            <div class="media profile-media"><img class="b-r-10" src="assets/images/dashboard/profile.jpg" alt="">
              <div class="media-body"><span><?= auth()->user()->name ?></span>
                <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
              </div>
            </div>
            <ul class="profile-dropdown onhover-show-div">
              <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>
              <li><a href="#"><i data-feather="settings"></i><span>Settings</span></a></li>
              <li>
                <form action="<?= route('logout') ?>" method="post" id="logoutForm">
                  @csrf
                  <a type="submit" id="logout"><i data-feather="log-out"></i><span>Logout</span></a>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <script class="result-template" type="text/x-handlebars-template">
        <div class="ProfileCard u-cf">                        
        <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
        <div class="ProfileCard-details">
        <div class="ProfileCard-realName"></div>
        </div>
        </div>
      </script>
    </div>
  </div>