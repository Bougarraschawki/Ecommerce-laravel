@include('includes.admin.header')

  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">

        @include('includes.admin.sidebar')
        @include('includes.admin.nav')

        <div class="content">
          <div class="pb-5">
            <div class="row g-5">
              <div> 
                <div class="search-box d-none d-lg-block" style="width:25rem; float: right; right: 5%;">
                  <form action="/admin/client/search" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-10">
                        <input type="text" class="form-control form-control-sm search-input search min-h-auto" name="client_name" placeholder="Chercher Client..." required autocomplete="off">
                      </div>
                      <div class="col-2">
                        <button type="submit" class="btn btn-warning" style="position: absolute; right: -10%;">Chercher</button>
                      </div>
                    </div>
                  </form>
                </div>
                <h2>Liste des Clients</h2>
                <hr>
                @include('includes.flash-message')
                <div class="mt-3">
                  <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 700px;">
                    <table class="table table-bordered table-striped mb-0">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nom Client</th>
                          <th scope="col">Email</th>
                          <th scope="col">Date Creation du compte</th>
                          <th scope="col" class="text-center">Etat</th>
                          <th scope="col" class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($clients as $index => $client)
                            <tr>
                                  <th scope="row">{{$index + 1}}</th>
                                  <td>{{$client->name}}</td>
                                  <td>{{$client->email}}</td>
                                  <td>{{$client->created_at}}</td>
                                  <td class="text-center">
                                      @if ($client->is_active)
                                          <span data-feather="activity"></span>
                                          <span class="badge bg-success"><b>Utilisateur Active</b></span>
                                      @else
                                          <span data-feather="x-octagon"></span>
                                          <span class="badge bg-danger"><b>Utilisateur Bloquer</b></span>
                                      @endif
                                  </td>
                                  <td class="text-center">
                                      @if ($client->is_active)
                                          <a href="/admin/user/{{$client->id}}/bloquer" class="btn btn-primary">Bloqué</a>
                                      @else
                                          <a href="/admin/user/{{$client->id}}/activer" class="btn btn-primary">Activé</a>
                                      @endif
                                  </td>
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @include('includes.admin.footer')
        </div>
      </div>
    </main>
    <script src="{{ asset('dashassets/js/phoenix.js') }}"></script>
    <script src="{{ asset('dashassets/js/ecommerce-dashboard.js') }}"></script>
  </body>
</html>