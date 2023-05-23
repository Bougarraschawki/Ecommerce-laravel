@include('includes.admin.header')

  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">

        @include('includes.admin.sidebar')
        @include('includes.admin.nav')
        
        <div class="content">
          <div class="pb-5">
            <div class="row g-5">
              <div class="container">

                @include('includes.flash-message')

                <h2 class="mt-2">Modification Profile Admin</h2>
                <hr>
                <form action="/admin/profil/update" method="POST">
                  @csrf
                  <div class="form-group mb-3">
                    <label for="">Nom</label>
                    <input type="text" value="{{auth()->user()->name}}" name="name" class="form-control">
                  </div>
                  <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="email" value="{{auth()->user()->email}}" name="email" class="form-control">
                  </div>
                  <div class="form-group mb-3">
                    <label for="">Mot de passe</label>
                    <input type="password" name="password" class="form-control" placeholder="nouveau mot de passe...">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit">Valider</button>
                  </div>
                </form>
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