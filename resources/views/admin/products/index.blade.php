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
                  <form action="/admin/product/search" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-10">
                        <input type="text" class="form-control form-control-sm search-input search min-h-auto" name="product_name" placeholder="Chercher Produit..." required autocomplete="off">
                      </div>
                      <div class="col-2">
                        <button type="submit" class="btn btn-warning" style="position: absolute; right: -10%;">Chercher</button>
                      </div>
                    </div>
                  </form>
                </div>
                <h2>Liste des Produits</h2>
                <a   data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">Produit</a>
                <hr>
                
            
                <div class="mt-5">
                  <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 700px;">
                    <table class="table table-bordered table-striped mb-0">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Image</th>
                          <th scope="col">Nom Produit</th>
                          <th scope="col">Description</th>
                          <th scope="col">Prix</th>
                          <th scope="col">Quantité</th>
                          <th class="text-center" scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($products as $index => $product)
                          <tr>
                            <th scope="row">{{$index + 1}}</th>
                            <td>
                              <img class="rounded" src="{{asset('uploads')}}/{{$product->photo}}" width="80" height="60" alt="Image du produit">
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->qte}}</td>
                            
                            <td class="text-center">
                              <a data-bs-toggle="modal" data-bs-target="#editProduct{{ $product->id }}" class="btn btn-success mb-2">Modifier</a>
                              <a onclick="return confirm('Voulez-vous vraiment supprimer le produit {{$product->name}} ?')" href="/admin/product/{{$product->id}}/delete" class="btn btn-danger">supprimer</a>
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

    <!-- Modal Ajout-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter Produit</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
          </div>
          <form action="/admin/product/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label" for="exampleFormControlInput1">Catégorie</label>
                <select name="categorie" class="form-control">
                  @foreach ($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                  @endforeach 
                </select>

                @error('categorie')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="exampleFormControlInput1">Nom Produit</label>
                <input name="name" class="form-control" id="exampleFormControlInput1" type="text" placeholder="produit...">

                @error('name')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-0">
                <label class="form-label" for="exampleTextarea">Description Produit</label>
                <textarea name="description" class="form-control" rows="2"> </textarea>

                @error('description')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="exampleFormControlInput2">Prix</label>
                <input name="price" class="form-control" id="exampleFormControlInput2" type="number" placeholder="0">
  
                @error('price')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="exampleFormControlInput3">Quantité</label>
                <input name="qte" class="form-control" id="exampleFormControlInput3" type="number" placeholder="0">
  
                @error('qte')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="exampleFormControlInput4">Image</label>
                <input name="photo" class="form-control" id="exampleFormControlInput4" type="file" placeholder="catégorie...">
  
                @error('photo')
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

    @foreach ($products as $index => $product)
      <!-- Modal Modifier-->
      <div class="modal fade" id="editProduct{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modifier Produit: <span style="color: #FF0000; font-wight: bold;">{{ $product->name }}</span></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
            </div>
            <form action="/admin/product/update" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <input type="hidden" value="{{ $product->id }}" name="id_product">

                <img class="rounded" src="{{asset('uploads')}}/{{$product->photo}}" width="80" height="60" style="margin-left: 50px;"  alt="Image du produit">           
                <div class="mb-3">
                  <label class="form-label" for="exampleFormControlInput1">Nom Produit</label>
                  <input name="name" class="form-control" id="exampleFormControlInput1" type="text" value="{{ $product->name }}">

                  @error('name')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-0">
                  <label class="form-label" for="exampleTextarea">Description Produit</label>
                  <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>

                  @error('description')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="exampleFormControlInput1">Prix</label>
                  <input name="price" class="form-control" id="exampleFormControlInput1" type="number" value="{{ $product->price }}">

                  @error('price')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="exampleFormControlInput1">Quantité</label>
                  <input name="qte" class="form-control" id="exampleFormControlInput1" type="number" value="{{ $product->qte }}">

                  @error('qte')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="exampleFormControlInput4">Image</label>
                  <input name="photo" class="form-control" id="exampleFormControlInput4" type="file">
    
                  @error('photo')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
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