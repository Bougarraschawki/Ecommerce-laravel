<nav class="navbar navbar-light navbar-top navbar-expand">
    <div class="navbar-logo"><button class="btn navbar-toggler navbar-toggler-humburger-icon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button> <a class="navbar-brand me-1 me-sm-3" href="/client/dashboard">
        <div class="d-flex align-items-center">
          <div class="d-flex align-items-center my-href"><img src="{{ asset('dashassets/img/icons/illustrations/ecommerce.png') }}" alt="" width="32">
            <p class="logo-text ms-2 d-none d-sm-block">Achat Express</p>
          </div>
        </div>
      </a></div>
    <div class="collapse navbar-collapse">
      <div class="search-box d-none d-lg-block mt-2" style="width:50rem;">
        <h2>Tableau De Bord Client</h2>
        <h5>Bienvenue <b style="text-transform: capitalize;">{{auth()->user()->name}}</b></h5>
      </div>
      <ul class="navbar-nav navbar-nav-icons ms-auto flex-row">
        <li class="nav-item dropdown"><a class="nav-link" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-700" data-feather="bell" style="height:20px;width:20px;"></span></a></li>
        {{--<li class="nav-item dropdown"><a class="nav-link notification-indicator notification-indicator-primary" id="navbarDropdownSettings" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-700" data-feather="settings" style="height:20px;width:20px;"></span></a></li>--}}
        
        <li class="nav-item dropdown"><a class="nav-link lh-1 px-0 ms-5" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-l"><img class="rounded-circle" src="{{ asset('dashassets/img/users/user.jpg') }}" alt=""></div>
          </a>
          <div class="dropdown-menu dropdown-menu-end py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
            <div class="card bg-white position-relative border-0">
              <div class="card-body p-0 overflow-auto scrollbar" style="height: 12rem;">
                <div class="text-center pt-4 pb-3">
                  <div class="avatar avatar-xl"><img class="rounded-circle" src="{{asset('dashassets/img/users/user.jpg')}}" alt=""></div>
                  <h6 class="mt-2" style="text-transform: capitalize;">{{auth()->user()->name}}</h6>
                </div>
                <ul class="nav d-flex flex-column mb-2 pb-1">
                  <li class="nav-item"><a class="nav-link px-3" href="/client/profil"><span class="me-2 text-900" data-feather="user"></span>Profile</a></li>
                  <li class="nav-item"><a class="nav-link px-3" href="/client/dashboard"><span class="me-2 text-900" data-feather="pie-chart"></span>
                    Tableau de bord</a></li>
                </ul>
              </div>
              <div class="card-footer p-0 border-top pt-2 pb-2">
                <div class="px-3">
                  <a class="btn btn-phoenix-secondary d-flex flex-center w-100" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <span class="me-2" data-feather="log-out"></span>Déconnexion
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
</nav>