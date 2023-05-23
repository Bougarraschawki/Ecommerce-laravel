<div class="container-fluid">
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <a href="/" class="text-decoration-none " >
                <h1 class="m-0 display-5 font-weight-semi-bold my-href"><span class="font-weight-bold border px-3 mr-1" style="color: #3490dc">A</span>chat Express</h1>
            </a>
        </div>
        {{--<div class="col-lg-6 col-6 text-left">
            <form action="/products/search" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control form-control-sm mb-0" placeholder="Chercher un produit" name="keywords" required>
                    <button type="submit" class="my-search bg-transparent ml-2">
                        <img src="{{ asset('dashassets/img/icons/illustrations/search-engine.png')}}" width="25rem;" class="my-search" alt="">
                    </button>
                </div>
            </form>
        </div>--}}
        @if (auth()->user())
            <div class="col-lg-6 col-6 text-right" style="position: absolute; right: 0;">
                @if (auth()->user()->role == 'admin')
                    <a href="/admin/dashboard" style="margin-right: 10px; text-decoration: none;" title="Tableau de bord">
                        <img src="{{ asset('dashassets/img/icons/illustrations/settings.png')}}" width="25rem;" class="parametres" alt=""> 
                    </a>
                @else
                    <a href="/client/dashboard" style="margin-right: 10px; text-decoration: none;" title="Tableau de bord">
                        <img src="{{ asset('dashassets/img/icons/illustrations/settings.png')}}" width="25rem;" class="parametres" alt=""> 
                    </a>
                    <a href="/client/cart" class="href">
                        <img src="{{ asset('dashassets/img/icons/illustrations/shopping-cart.png')}}" title="Panier" class="panier" width="25rem;" alt=""> 
                        @foreach (auth()->user()->commandes as $commande)
                            @if ($commande->etat == "en cours")
                                <sup class="number" style="cursor: none; font-weight: bold; width:20px;"><span class="badge bg-info text-white">{{count($commande->lignecommandes)}}</span></sup>
                            @endif
                        @endforeach
                    </a>
                @endif   
            </div>
        @endif
    </div>
</div>