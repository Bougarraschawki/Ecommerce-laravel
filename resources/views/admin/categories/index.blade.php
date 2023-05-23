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
                  <form action="/admin/categorie/search" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-10">
                        <input id="categorie_name" type="text" class="form-control form-control-sm search-input search min-h-auto" name="categorie_name" value="{{ old('categorie_name') }}" placeholder="Chercher Categorie..." required autocomplete="off">
                      </div>
                      <div class="col-2">
                        <button type="submit" class="btn btn-warning" style="position: absolute; right: -10%;">Chercher</button>
                      </div>
                    </div>
                  </form>
                </div>
                <h2>Liste des Catégories</h2>
                <hr>
                <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary mt-3">Catégorie</a>
                <div class="mt-3">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom Catégorie</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $index => $categorie)
                        <tr>
                          <th scope="row">{{$index + 1}}</th>
                          <td>{{$categorie->name}}</td>
                          <td>{{$categorie->description}}</td>
                          <td>
                            <a data-bs-toggle="modal" data-bs-target="#editCategory{{ $categorie->id }}" class="btn btn-success">Modifier</a>
                            <a onclick="return confirm('Voulez-vous vraiment supprimer la  categotie {{$categorie->name}} ?')" href="/admin/category/{{$categorie->id}}/delete" class="btn btn-danger">supprimer</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
          @include('includes.admin.footer')
          
        </div>
      </div>
    </main>

    <!-- Modal Ajout-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter Catégorie</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
          </div>
          <form action="/admin/category/store" method="post">
            @csrf
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label" for="exampleFormControlInput1">Nom catégorie</label>
                <input name="name" class="form-control" id="exampleFormControlInput1" type="text" placeholder="catégorie...">

                @error('name')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-0">
                <label class="form-label" for="exampleTextarea">Description catégorie</label>
                <textarea name="description" class="form-control" rows="4"> </textarea>

                @error('description')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          
            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Valider</button>
              <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Annuler</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    @foreach ($categories as $index => $categorie)
      <!-- Modal Modifier-->
      <div class="modal fade" id="editCategory{{ $categorie->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modifier Catégorie: <span style="color: #FF0000; font-wight: bold;">{{ $categorie->name }}</span></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
            </div>
            <form action="/admin/category/update" method="post">
              @csrf
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label" for="exampleFormControlInput1">Nom catégorie</label>
                  <input name="name" class="form-control" id="exampleFormControlInput1" type="text" value="{{ $categorie->name }}">

                  @error('name')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-0">
                  <label class="form-label" for="exampleTextarea">Description catégorie</label>
                  <textarea name="description" class="form-control" rows="3">{{ $categorie->description }} </textarea>

                  @error('description')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <input type="hidden" value="{{ $categorie->id }}" name="id_category">
              </div>
            
              <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Modifier</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Annuler</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    @endforeach

    <script src="{{ asset('dashassets/js/phoenix.js') }}"></script>
    <script src="{{ asset('dashassets/js/ecommerce-dashboard.js') }}"></script>
  </body>
</html>