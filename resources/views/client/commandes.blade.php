@include('includes.client.header')

  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">

        @include('includes.client.sidebar')
        @include('includes.client.nav')
        
        <div class="content">
          <div class="pb-5">
            <div class="row g-5">
              <div>
              
                <h3>Vos Commandes</h3>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Commande</th>
                            <th>Produits</th>
                            <th>Etat</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (auth()->user()->commandes as $index => $commande)
                            <tr>
                                <td>Commande N°: {{$index + 1}}</td>
                                <td class="d-flex">
                                  @foreach ($commande->lignecommandes as $Lc)
                                    <p>{{$Lc->product->name}},&nbsp;</p>
                                  @endforeach 
                                </td>
                                
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
                                  @if($commande->etat == "en cours")
                                    <a onclick="return confirm('Voulez-vous vraiment supprimer cette commande ?')" href="/client/commande/{{$commande->id}}/delete" class="btn btn-danger">Supprimer</a>
                                  @else
                                    <a onclick="return confirm('Voulez-vous vraiment supprimer cette commande ?')" class="btn btn-danger disabled">Supprimer</a>
                                  @endif
                                </td>
                            </tr>
                            <!-- Modal detail-->
                            <div class="modal fade" id="detailModal{{$commande->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title eyes-title" id="exampleModalLabel">Produits</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
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
          @include('includes.client.footer')
        </div>
      </div>
    </main>
    <script src="{{ asset('dashassets/js/phoenix.js') }}"></script>
    <script src="{{ asset('dashassets/js/ecommerce-dashboard.js') }}"></script>
  </body>

</html>