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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Panier</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/" style="color: #3490dc">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Panier</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            @if (!$commande)
                <div id="InfoBanner"> 
                    <span class="reversed reversedRight">
                      <span>
                        &#9888;
                      </span>
                    </span>
                    <span class="reversed reversedLeft">
                      <b>Aucune Commande pour le moment !</b> 
                    </span> 
                </div>
            @else
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <tr>
                                <th>Produits</th>
                                <th>Prix</th>
                                <th>Quantités</th>
                                <th>Total</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($commande->lignecommandes as $Lcommande)
                                <tr>
                                    <td class="align-middle"><img src="{{asset('uploads')}}/{{$Lcommande->product->photo}}" alt="" style="width: 50px;"> {{$Lcommande->product->name}}</td>
                                    <td class="align-middle">{{$Lcommande->product->price}} TND</td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 100px;"> 
                                            <input type="text" class="form-control form-control-sm bg-secondary text-center" value="{{$Lcommande->qte}}" disabled>
                                        </div>
                                    </td>
                                    <td class="align-middle">{{$Lcommande->product->price * $Lcommande->qte}} TND</td>
                                    <td class="align-middle"><a href="/client/ligneCommande/{{$Lcommande->id}}/delete" class="btn btn-sm btn-primary" style="background-color: #3490dc; border: 1px solid #3490dc"><i class="fa fa-times"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <form action="/client/checkout" method="POST">
                        @csrf
                        <input type="hidden" name="commande" value="{{$commande->id}}">
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Résumé du panier</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Sous-Total</h6>
                                    <h6 class="font-weight-medium">{{$commande->getTotal()}} TND</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Livraison</h6>
                                    <h6 class="font-weight-medium">10 TND</h6>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Total</h5>
                                    <h5 class="font-weight-bold">{{$commande->getTotal() + 10}} TND</h5>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary my-3 py-3" style="background-color: #3490dc; border: 1px solid #3490dc;">Passer à la caisse</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    @include('includes.guest.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top" style="background-color:#3490DC; border: 1px solid #3490DC"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>