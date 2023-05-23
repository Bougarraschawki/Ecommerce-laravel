@include('includes.admin.header')

  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">

        @include('includes.admin.sidebar')
        @include('includes.admin.nav')
        

        <div class="content">
          <div class="pb-0">
            <div class="row g-5">
              <div class="col-6 col-xxl-6">
                <div class="mb-8">
                  <h2 class="mb-2">Informations</h2>
                </div>
                
                <div class="row align-items-center g-4">
                  <div class="col-3 col-md-auto">
                    <div class="d-flex align-items-center"><img src="{{ asset('dashassets/img/icons/illustrations/4.png')}}" alt="" height="46" width="46">
                      <div class="ms-2">
                        <h4 class="mb-0">{{count($products)}} Produits</h4>
                        <p class="text-800 fs--1 mb-0">En Stock</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-3 col-md-auto">
                    <div class="d-flex align-items-center"><img src="{{ asset('dashassets/img/icons/illustrations/3.png')}}" alt="" height="46" width="46">
                      <div class="ms-2">
                        <h4 class="mb-0">{{count($productsHorsStock)}} Produits</h4>
                        <p class="text-800 fs--1 mb-0">Hors stock</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-3 col-md-auto">
                    <div class="d-flex align-items-center"><img src="{{ asset('dashassets/img/icons/illustrations/categorie.png')}}" alt="" height="46" width="46">
                      <div class="ms-2">
                        <h4 class="mb-0">{{count($categories)}} Catégories</h4>
                        <p class="text-800 fs--1 mb-0">Tous Catégories</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-3 col-md-auto">
                    <div class="d-flex align-items-center"><img src="{{ asset('dashassets/img/icons/illustrations/client.png')}}" alt="" height="46" width="46">
                      <div class="ms-2">
                        <h4 class="mb-0">{{count($clients)}} Clients</h4>
                        <p class="text-800 fs--1 mb-0">Tous Clients</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-3 col-md-auto">
                    <div class="d-flex align-items-center"><img src="{{ asset('dashassets/img/icons/illustrations/2.png')}}" alt="" height="46" width="46">
                      <div class="ms-2">
                        <h4 class="mb-0">{{count($commandesEncours)}} Commandes</h4>
                        <p class="text-800 fs--1 mb-0">En cours</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-3 col-md-auto">
                    <div class="d-flex align-items-center"><img src="{{ asset('dashassets/img/icons/illustrations/payante.png')}}" alt="" height="46" width="46">
                      <div class="ms-2">
                        <h4 class="mb-0">{{count($commandesPayee)}} Commandes</h4>
                        <p class="text-800 fs--1 mb-0">Payantes</p>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <hr class="bg-200 mb-6 mt-4">
              </div>
              <div class="col-6 col-xxl-6" style="overflow-y: scroll; height: 280px;">
                @foreach ($products as $product) 
                  @if ($product->qte == 0)
                    <div class="alert alert-soft-danger d-flex align-items-center w-5" role="alert" id="alert">
                      <span class="fas fa-times-circle text-danger fs-3 me-3"></span>
                      <p class="mb-0 flex-1">Le produit {{$product->name}} est hors stock</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                  @if ($product->qte >= 1 && $product->qte < 5)
                    <div class="alert alert-soft-warning d-flex align-items-center" role="alert" id="alert">
                      <span class="fas fa-exclamation-triangle text-warning fs-3 me-3"></span>
                      <p class="mb-0 flex-1">Vous avez seulement {{$product->qte}} {{$product->name}} en stock</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
          <div class="row gx-6">
            <div class="col-12 col-xl-6">
              <div class="mb-5">
                <h3>Commandes</h3>
                <p class="text-700">Voici la liste de tous les commandes</p>
              </div>
              <div class="table-wrapper-scroll-y my-custom-scrollbar" style="width: 800px;">
                <table class="table table-striped fs--2 mb-0" >
                  <thead>
                    <tr>
                      <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:20%;">Commande</th>
                      <th class="border-top border-200 align-middle" scope="col" style="width:17%">Client</th>
                      <th class="border-top border-200 text-end align-middle" scope="col" style="width:16%">Date</th>
                      <th class="border-top border-200 text-end align-middle" scope="col" style="width:20%">Etat</th>
                      <th class="border-top border-200 text-end pe-0 align-middle" scope="col" style="width:17%">Total</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($commandes as $index => $commande)
                      <tr>
                        <td class="white-space-nowrap ps-0" style="width:20%">
                          <div class="d-flex align-items-center">
                            <h6 class="mb-0 me-3">{{$index + 1}}.</h6><a href="#!">
                              {{--<div class="d-flex align-items-center"><img src="assets/img/country/india.png" alt="" width="24">
                                <p class="mb-0 ps-3 text-primary fw-bold fs--1">India</p>
                              </div>--}}
                            </a>
                          </div>
                        </td>
                        <td class="align-middle" style="width:17%">
                          <h6 class="mb-0">{{$commande->client->name}}</h6>
                        </td>
                        <td class="align-middle text-end" style="width:17%">
                          <h6 class="mb-0">{{$commande->created_at}}</h6>
                        </td>
                        <td class="align-middle text-end" style="width:17%">
                          @if($commande->etat == "en cours")
                            <span class="badge bg-primary">{{$commande->etat}}</span>
                          @else
                              <span class="badge bg-success">{{$commande->etat}}</span>
                          @endif
                        </td>
                        <td class="align-middle text-end pe-0" style="width:17%">
                          <h6>{{$commande->getTotal()}} TND</h6>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              {{--<div class="d-flex align-items-center justify-content-between py-2 fs--1 mb-1">
                <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="">1 to 5 <span class="text-600">Items of </span>15</p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-2" data-fa-transform="down-1"></span></a>
              </div>--}}
            </div>
            <div class="col-12 col-xl-6">
              <div class="mx-4 mx-lg-n6 ms-xl-0 h-100">
                <div class="h-100 w-100">
                  <div class="bg-white" style="height: 500px; top: 32px;" id="mymap"></div>
                </div>
              </div>
            </div>
          </div>
        
          <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white pt-7 border-y border-300">
            <div data-list='{"valueNames":["product","customer","rating","review","time"],"page":6}'>
              <div class="row align-items-end justify-content-between pb-5 g-3">
                <div class="col-auto">
                  <h3>Clients</h3>
                  <p class="text-700 lh-sm mb-0">Voici la liste de tous les clients</p>
                </div>
                <div class="col-12 col-md-auto">
                  <div class="row g-2">
                    <div class="col-auto flex-1">
                      <div class="search-box">
                        <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control form-control-sm search-input search" type="search" placeholder="Chercher" aria-label="Search"> <span class="fas fa-search search-box-icon"></span></form>
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="/admin/dashboard" class="btn btn-sm btn-phoenix-secondary bg-white hover-bg-100" type="button">Clients</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive mx-n1 px-1 scrollbar">
                <table class="table table-striped fs--1 mb-0">
                  <thead>
                    <tr>
                      <th class="white-space-nowrap fs--1 border-top ps-0 align-middle">
                        <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                      </th>
                      <th class="sort border-top white-space-nowrap align-middle" scope="col"></th>
                      <th class="sort border-top white-space-nowrap align-middle" scope="col" style="min-width:360px;" data-sort="nom">Nom</th>
                      <th class="sort border-top align-middle" scope="col" data-sort="customer" style="min-width:360px;">Email</th>
                      <th class="sort border-top align-middle" scope="col" data-sort="rating" style="min-width:360px;">Date Creation du compte</th>
                      <th class="sort border-top align-middle" scope="col" style="min-width:360px;" data-sort="status">Status</th>
                    </tr>
                  </thead>
                  <tbody class="list" id="table-latest-review-body">
                    @foreach ($clients as $index => $client)
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="assets/img//products/1.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap">
                          <h6 class="fw-semi-bold mb-0">{{$client->name}}</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap">{{--<a class="d-flex align-items-center" href="#!">
                            <div class="avatar avatar-l">
                              <div class="avatar-name rounded-circle"><span>R</span></div>
                            </div>
                            <h6 class="mb-0 ms-3 text-900">Richard Dawkins</h6>
                          </a></td>--}}
                          <h6 class="mb-0 ms-3 text-900">{{$client->email}}</h6>
                        </td>
                        <td class="align-middle product white-space-nowrap">
                          <h6 class="fw-semi-bold mb-0">{{$client->created_at}}</h6>
                        </td>
                        <td class="align-middle text-start ps-5 status">
                          @if ($client->is_active)
                            <span class="badge fs--1 badge-light-success">Active<span class="ms-2 fas fa-check"></span>
                          @else
                            <span class="badge fs--1 badge-light-danger">Bloquer<span class="ms-2 fas fa-lock"></span>
                          @endif
                        </span></td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="row align-items-center py-1">
                <div class="pagination d-none"></div>
                <div class="col d-flex fs--1">
                  <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info></p><a class="fw-semi-bold" href="#!" data-list-view="*">Voir Tout<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">Voir Moins</a>
                </div>
                <div class="col-auto d-flex"><button class="btn btn-link px-1 me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left me-2"></span>Précédent</button><button class="btn btn-link px-1 ms-1" type="button" title="Next" data-list-pagination="next">Suivant<span class="fas fa-chevron-right ms-2"></span></button></div>
              </div>
            </div>
          </div>
          @include('includes.admin.footer')
        </div>
      </div>
    </main>

    <script type="text/javascript">
        function initMap() {
          navigator.geolocation.getCurrentPosition(function(position) {
              latt = position.coords.latitude;
              long = position.coords.longitude;
            const myLatLng = { lat: latt, lng: long};
            const map = new google.maps.Map(document.getElementById("mymap"), {
              zoom: 15,
              center: myLatLng,
            });
            new google.maps.Marker({
              position: myLatLng,
              map,
              title: "Ma Position",
            });
          });
        }   
        window.initMap = initMap;
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNdpXcuLDb26QUSLCkqW2kBs7aEO9u1dM&callback=initMap" async></script>
    <script src="{{ asset('dashassets/js/phoenix.js') }}"></script>
    <script src="{{ asset('dashassets/js/ecommerce-dashboard.js') }}"></script>
  </body>

</html>