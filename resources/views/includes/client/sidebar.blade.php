<nav class="navbar navbar-light navbar-vertical navbar-vibrant navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
      <div class="navbar-vertical-content scrollbar">
        <ul class="navbar-nav flex-column" id="navbarVerticalNav">
          <li class="nav-item"><a class="nav-link active" href="/client/dashboard">
              <div class="d-flex align-items-center my-href"><span class="nav-link-icon"><img width="30rem;" src="{{ asset('dashassets/img/icons/illustrations/dash.png') }}"/></span><span class="nav-link-text">Tableau de bord</span></div>
            </a>
          </li>
          <hr>
          <li class="nav-item"><a class="nav-link active" href="/">
            <div class="d-flex align-items-center my-href"><span class="nav-link-icon"><img width="30rem;" src="{{ asset('dashassets/img/icons/illustrations/store.png') }}"/></span><span class="nav-link-text">Boutique</span></div>
            </a>
          </li>
          <hr>
          <li class="nav-item"><a class="nav-link active" href="/client/commandes">
            <div class="d-flex align-items-center my-href"><span class="nav-link-icon"><img width="30rem;" src="{{ asset('dashassets/img/icons/illustrations/order.png') }}"/></span><span class="nav-link-text">Commandes</span></div>
          </a>
        </li>
        </ul>
      </div>
      
      <div class="navbar-vertical-footer">
          <a class="btn btn-link border-0 fw-semi-bold d-flex ps-0" href="/client/profil">
            <span class="navbar-vertical-footer-icon" data-feather="log-out"></span><span>Paramètres</span>
          </a>
      </div>
    </div>
</nav>