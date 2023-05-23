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


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Notre Boutique</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/" style="color: #3490dc">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Boutique</p>
               
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    {{--<h2 class="text-center"><b>Les {{$categorie->name}}</b></h2>--}}
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filtrer par prix</h5>
                        
                    <form method="POST" action="/products/filter">
                        @csrf
                            <input type="hidden" name="categorie" value="{{$categorie->id}}">
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" name="price[]" value="0" id="price-all" onChange="this.form.submit()">
                                <label class="custom-control-label" for="price-all">Tous les prix</label>
                                <span class="badge border font-weight-normal">{{count($products)}}</span>
                            </div>
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" name="price[]" value="1" onChange="this.form.submit()"  id="price-1" >
                                <label class="custom-control-label" for="price-1">0TND - 100TND</label>
                                <span class="badge border font-weight-normal">3</span>
                            </div>
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" name="price[]" value="2" onChange="this.form.submit()" id="price-2" >
                                <label class="custom-control-label" for="price-2">100TND - 200TND</label>
                                <span class="badge border font-weight-normal">0</span>
                            </div>
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" name="price[]" value="3" onChange="this.form.submit()" id="price-3" >
                                <label class="custom-control-label" for="price-3">200TND - 300TND</label>
                                <span class="badge border font-weight-normal">0</span>
                            </div>
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" name="price[]" value="4" onChange="this.form.submit()" id="price-4" >
                                <label class="custom-control-label" for="price-4">300TND - 400TND</label>
                                <span class="badge border font-weight-normal">0</span>
                            </div>
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" name="price[]" value="5" onChange="this.form.submit()" id="price-5" >
                                <label class="custom-control-label" for="price-5">400TND - 500TND</label>
                                <span class="badge border font-weight-normal">1</span>
                            </div>
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" name="price[]" value="6" onChange="this.form.submit()" id="price-6" >
                                <label class="custom-control-label" for="price-6">500TND - 1000TND</label>
                                <span class="badge border font-weight-normal">1</span>
                            </div>
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" name="price[]" value="7" onChange="this.form.submit()" id="price-7" >
                                <label class="custom-control-label" for="price-7">1000TND - 5000TND</label>
                                <span class="badge border font-weight-normal">0</span>
                            </div>
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" name="price[]" value="8" onChange="this.form.submit()" id="price-8" >
                                <label class="custom-control-label" for="price-8">5000TND - 10000TND</label>
                                <span class="badge border font-weight-normal">0</span>
                            </div>
                    </form>
                </div>
                <!-- Price End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="/products/search" method="POST">
                                @csrf
                                <input type="hidden" name="categorie" value="{{$categorie->id}}">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Chercher Produit..." name="keywords" required>
                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text bg-transparent" >
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <a class="btn btn-primary mx-2" style="background-color: #3490dc; border: 1px solid #3490dc" href="/products/{{$categorie->id}}/list">Tous</a>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Trier par
                                </button>
                                <form action="/products/orderBy" method="POST">
                                    @csrf
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                        <input type="hidden" name="categorie" value="{{$categorie->id}}">
                                        <button class="dropdown-item mydrop" type="submit" value="dernier" name="dernier">Dernier</button>
                                        <button class="dropdown-item mydrop" type="submit" value="populaire" name="populaire">Popularité</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <p class="my-message">{{ $message }}</p>
                    @if ($products->isEmpty())
                        <div id="InfoProduct"> 
                            <span class="reversed reversedRight">
                            <span>
                                &#9888;
                            </span>
                            </span>
                            <span class="reversed reversedLeft">
                            <b>Aucun {{ $message }} !</b> 
                            </span> 
                        </div>
                    @else
                        <span class="my-message">
                            <p>{{ $message }}</p>
                        </span>
                        
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-12 pb-1 mt-5">
                                <div class="card product-item border-0 mb-4">
                                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0" style="height: 250px;">
                                        <img class="img-fluid " src="{{asset('uploads')}}/{{$product->photo}}" alt="">
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                                        {{--<h6 class="text-truncate mb-3">{{$product->}}</h6>--}}
                                        <div class="d-flex justify-content-center">
                                            <h6>{{$product->price}} TND</h6>
                                        </div>
                                        @if ($product->qte)
                                            <span class="badge bg-success text-white">Quantité: {{$product->qte}}</span>
                                        @else
                                            <span class="badge bg-danger text-white">Hors Stock</span>
                                        @endif 
                                        <p>{{count($product->reviews)}} Avis</p> 
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="/product/details/{{$product->id}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye mr-1 href"><span class="href"> Détails</span></i></a>
                                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart mr-1 href"><span class="href"> Ajouter Au panier</span></i></a>
                                    </div>
                                </div>
                            </div>
                         @endforeach
                        <div class="col-12 pb-1">
                            <nav aria-label="Page navigation">
                              <ul class="pagination justify-content-center mb-3">
                                <li class="page-item disabled">
                                  <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                  <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                </li>
                              </ul>
                            </nav>
                        </div>
                    @endif 
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


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