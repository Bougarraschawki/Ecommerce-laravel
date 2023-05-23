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
                  <form action="/admin/commande/search" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-10">
                        <input type="text" class="form-control form-control-sm search-input search min-h-auto" name="search" placeholder="dd/mm/yyyy" required autocomplete="off">
                      </div>
                      <div class="col-2">
                        <button type="submit" class="btn btn-warning" style="position: absolute; right: -10%;">Chercher</button>
                      </div>
                    </div>
                  </form>
                </div>
                <h3>Les Commandes</h3>
                <hr>
                <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 700px;">
                  <table class="table table-bordered table-striped mb-0">
                      <thead>
                          <tr>
                              <th>Commande</th>
                              <th>Client</th>
                              <th>Etat</th>
                              <th>Total</th>
                              <th>Date</th>
                              <th class="text-center">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($commandes as $index => $commande)
                              <tr>
                                  <td>Commande N°: {{$index + 1}}</td>
                                  <td class="text-capitalize">{{$commande->client->name}}</td>
                                  <td>
                                      @if($commande->etat == "en cours")
                                          <span class="badge bg-primary">{{$commande->etat}}</span>
                                      @else
                                          <span class="badge bg-success">{{$commande->etat}}</span>
                                      @endif
                                  </td>
                                  <td>{{$commande->getTotal()}} TND</td>
                                  <td>{{$commande->created_at}}</td>
                                  <td class="text-center">
                                    <a id="eyes" data-bs-toggle="modal" data-bs-target="#detailModal{{$commande->id}}" title="détail commande"><img class="img-fluid img-eyes" src="{{ asset('dashassets/img/icons/illustrations/eyes.png')}}" height="46" width="46"></a>
                                    @if($commande->etat == "payee")
                                      <a id="eyes" href="/downloadPDF/{{$commande->id}}" title="Imprimer commande"><img class="img-fluid img-eyes" src="{{ asset('dashassets/img/icons/illustrations/print.png')}}" height="46" width="46"></a>
                                    @else
                                      <button class="btn disabled mx-0"><img class="img-fluid" src="{{ asset('dashassets/img/icons/illustrations/print.png')}}" height="46" width="46"></button>
                                    @endif
                                    <a onclick="return confirm('Voulez-vous vraiment supprimer cette commande ?')" href="/admin/commande/{{$commande->id}}/delete" class="btn btn-danger">Supprimer</a>
                                  </td>
                              </tr>
                              <!-- Modal detail-->
                              <div class="modal fade" id="detailModal{{$commande->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title eyes-title" id="exampleModalLabel">Commande N°: {{$index + 1}}</h5>
                                      <p style="position: absolute; margin-top: 60px;">Produits</p>
                                      <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                                    </div>
                                      <div class="modal-body eyes-body">
                                        @foreach ($commande->lignecommandes as $Lc)
                                          <div class="mb-3 text-center">
                                            <div class="row">
                                              <div class="col-8">
                                                <h5>{{$Lc->product->name}}</h5> 
                                                <p>Quantité: {{$Lc->qte}}</p> 
                                                <p>Prix: {{$Lc->product->price}}</p>
                                              </div>
                                              <div class="col-4">
                                                <img class="img-fluid" width="100px" src="{{asset('uploads')}}/{{$Lc->product->photo}}" alt="">
                                              </div>
                                            </div>
                                            <hr>
                                          </div>
                                        @endforeach 
                                      </div>
                                      <div class="modal-footer">
                                        <p style="position: absolute; left: 0; text-transform: capitalize; font-weight: bold;">Client: {{$commande->client->name}}</p>
                                        <h5>Total: {{$commande->getTotal()}} TND</h5>
                                      </div>
                                  </div>
                                </div>
                              </div>
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
    <script src="{{ asset('dashassets/js/phoenix.js') }}"></script>
    <script src="{{ asset('dashassets/js/ecommerce-dashboard.js') }}"></script>
  </body>

</html>