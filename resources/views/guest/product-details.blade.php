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

    {{--! Contenu page details --}}
     <!-- Page Header Start -->
     <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Détail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/" style="color: #3490dc">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Détail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-50" src="{{asset('uploads')}}/{{$product->photo}}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$product->name}}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">({{count($product->reviews)}} Avis)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">{{$product->price}} TND</h3>
                @if ($product->qte)
                    <span class="badge bg-success text-white" style="width:150px; height:22px; font-size: 15px;" >Quantité: {{$product->qte}}</span>
                @else
                    <span class="badge bg-danger text-white" style="width:150px; height:22px; font-size: 15px;">Hors Stock</span>
                @endif  
                {{--! Sizes --}}
                {{--<div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-1" name="size">
                            <label class="custom-control-label" for="size-1">XS</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-2" name="size">
                            <label class="custom-control-label" for="size-2">S</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-3" name="size">
                            <label class="custom-control-label" for="size-3">M</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-4" name="size">
                            <label class="custom-control-label" for="size-4">L</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-5" name="size">
                            <label class="custom-control-label" for="size-5">XL</label>
                        </div>
                    </form>
                </div>--}}
                {{--! Colors --}}
                {{--<div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-1" name="color">
                            <label class="custom-control-label" for="color-1">Black</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-2" name="color">
                            <label class="custom-control-label" for="color-2">White</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-3" name="color">
                            <label class="custom-control-label" for="color-3">Red</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-4" name="color">
                            <label class="custom-control-label" for="color-4">Blue</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-5" name="color">
                            <label class="custom-control-label" for="color-5">Green</label>
                        </div>
                    </form>
                </div>--}}
                <form action="/client/order/store" method="POST">
                    @csrf
                    <input type="hidden" value="{{$product->id}}" name="product_id">
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <input type="number" class="form-control bg-secondary text-center" value="1" min="1" max="{{$product->qte}}" name="qte">
                        </div>
                        @if ($product->qte)
                            <button type="submit" class="btn btn-primary px-3" style="background-color: #3490dc; border: 1px solid #3490dc"><i class="fa fa-shopping-cart mr-1"></i>Ajouter Au Panier</button> 
                        @else
                            <button type="submit" class="btn btn-primary px-3" style="background-color: #3490dc; border: 1px solid #3490dc" disabled><i class="fa fa-shopping-cart mr-1"></i>Ajouter Au Panier</button> 
                        @endif
                    </div>
                </form>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Partager sur:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1" style="color: #3490dc;">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2" style="color: #3490dc;">Information</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3" style="color: #3490dc;">Avis ({{count($product->reviews)}})</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Description Produit</h4>
                        <p>{{$product->description}}</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                  </ul> 
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                  </ul> 
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">{{count($product->reviews)}} avis pour "{{$product->name}}"</h4>
                                @foreach ($product->reviews as $review)
                                    <div class="media mb-4">
                                        <img src="{{asset('dashassets/img/users/user.jpg')}}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6>{{$review->user->name}}<small> - <i>{{$review->created_at}}</i></small></h6>
                                            <div class="text-primary mb-2">
                                                @for ($i = 0; $i < $review->rate; $i ++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                                <b> /5</b>
                                            </div>
                                            <p>{{$review->content}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Laisser un commentaire</h4>
                                <small>Votre adresse email ne sera pas publiée. les champs requis sont indiqués *</small> 
                                <form action="/client/review/store" method="POST">    
                                    @csrf
                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                    <div class="d-flex my-3">
                                        <div class="form-group">
                                            <label class="mb-0 mr-2">Votre Note * :</label>
                                            <input type="number" name="rate" max="5" min="1" class="form-control" placeholder="Note /5" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Votre Avis *</label>
                                        <textarea name="content" cols="30" rows="5" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Laissez votre avis" class="btn btn-primary px-3" style="background-color: #3490dc; border: 1px solid #3490dc">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Autres Produits</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($products as $similar_product)
                        <div class="card product-item border-0">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid" style="width: 100%; height: 200px" src="{{asset('uploads')}}/{{$similar_product->photo}}" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{$similar_product->name}}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>{{$similar_product->price}} TND</h6>
                                </div>
                                @if ($similar_product->qte)
                                    <span class="badge bg-success text-white" >Quantité: {{$similar_product->qte}}</span>
                                @else
                                    <span class="badge bg-danger text-white" >Hors Stock</span>
                                @endif  
                                <p>{{count($product->reviews)}} Avis</p> 
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="/product/details/{{$similar_product->id}}" class="btn btn-sm p-0"><i class="fas fa-eye mr-1 href"><span class="href"> Détails</span></i></a>
                                <a href="/product/details/{{$similar_product->id}}" class="btn btn-sm p-0"><i class="fas fa-shopping-cart mr-1 href"><span class="href"> Ajouter Au Panier</span></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

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