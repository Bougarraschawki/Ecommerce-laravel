<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Achat Express</title>
    <link rel = "icon" href="{{ asset('dashassets/img/icons/illustrations/chariot.png') }}" sizes="32x32" type="image/png">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('mainassets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('mainassets/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
        @include('includes.guest.topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
        @include('includes.guest.navbar')
    <!-- Navbar End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1 my-href">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check m-0 mr-3" style="color: #3490dc"></h1>
                    <h5 class="font-weight-semi-bold m-0">Produit de qualité</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1 my-href">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast m-0 mr-2" style="color: #3490dc"></h1>
                    <h5 class="font-weight-semi-bold m-0">Paiement à la livraison</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1 my-href">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt m-0 mr-3" style="color: #3490dc"></h1>
                    <h5 class="font-weight-semi-bold m-0">Retour sous 14 jours</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1 my-href">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume m-0 mr-3" style="color: #3490dc"></h1>
                    <h5 class="font-weight-semi-bold m-0">Assistance 24h/7</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
        
    <!-- Categories End -->


    <!-- Offer Start -->
    
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-2 mx-auto nosProduits">
            <h2 class="section-title px-5"><span class="px-2"><a href="/" style="text-decoration: none; color: #000">Nos Produits</a></span></h2>
        </div>
        <div class="col-lg-3 col-3 text-left mx-auto mb-5">
            <form action="/products/searchAll" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control form-control-sm mb-0" placeholder="Chercher un produit" name="keywords" required>
                    <button type="submit" class="my-search bg-transparent ml-2">
                        <img src="{{ asset('dashassets/img/icons/illustrations/search-engine.png')}}" width="25rem;" class="my-search" alt="">
                    </button>
                </div>
            </form>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($products as $product)
                <div class="col-lg-2 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid" style="width: 100%; height: 200px" src="{{asset('uploads')}}/{{$product->photo}}" alt="image produit">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$product->name}}</h6>   
                            <div class="d-flex justify-content-center">
                                <h6>{{$product->price}} TND</h6>
                            </div>
                            @if ($product->qte)
                                <span class="badge bg-success text-white" >Quantité: {{$product->qte}}</span>
                            @else
                                <span class="badge bg-danger text-white" >Hors Stock</span>
                            @endif  
                            <p>{{count($product->reviews)}} Avis</p> 
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="/product/details/{{$product->id}}" class="btn btn-sm p-0"><i class="fas fa-eye mr-1 href"><span class="href"> Détails</span></i></a>
                            <a href="/product/details/{{$product->id}}" class="btn btn-sm p-0"><i class="fas fa-shopping-cart mr-1 href"><span class="href"> Ajouter Au panier</span></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->


    <!-- Subscribe Start -->
    
    <!-- Subscribe End -->


    <!-- Products Start -->
    
    <!-- Products End -->


    <!-- Vendor Start -->
    
    <!-- Vendor End -->


    <!-- Footer Start -->
        @include('includes.guest.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top" style="background-color:#3490DC; border: 1px solid #3490DC"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('mainassets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('mainassets/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('mainassets/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('mainassets/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('mainassets/js/main.js')}}"></script>
</body>

</html>