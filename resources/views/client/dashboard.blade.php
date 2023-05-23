@include('includes.client.header')

  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">

        @include('includes.client.sidebar')
        @include('includes.client.nav')
        
        <div class="content">
          <div class="pb-0">
            <div class="row g-5">
              <div class="col-12 col-xxl-6">
                <div class="mb-8">
                  <h2 class="mb-2">Informations</h2>
                </div>
                <div class="row align-items-center g-4">
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
            </div>
          </div>
          <div class="row gx-6">
            <div class="col-12 col-xl-6">
              <div class="mb-5 mt-2">
                <h3>Vos Commandes</h3>
                <p class="text-700">Voici la liste de tous les commandes</p>
              </div>
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-striped fs--2 mb-0 ">
                  <thead>
                    <tr>
                      <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:20%;">Commande</th>
                      <th class="border-top border-200 text-end align-middle" scope="col" style="width:16%">Date</th>
                      <th class="border-top border-200 text-end align-middle" scope="col" style="width:20%">Etat</th>
                      <th class="border-top border-200 text-end pe-0 align-middle" scope="col" style="width:17%">Total</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach (auth()->user()->commandes as $index => $commande)
                      <tr>
                        <td class="white-space-nowrap ps-0" style="width:20%">
                          <div class="d-flex align-items-center">
                            <h6 class="mb-0 me-3">{{$index + 1}}.</h6>
                          </div>
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
            </div>
            <div class="col-12 col-xl-6">
              <div class="mx-4 mx-lg-n6 ms-xl-0 h-100">
                <div class="h-100 w-100">
                  <div class="bg-white" style="height: 600px;" id="mymap"></div>
                </div>
              </div>
            </div>
          </div>
          @include('includes.client.footer')
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