<div class="container-fluid">
    <div class="row align-items-center py-3 px-xl-5 ">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="/client/home" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">A</span>chat Express</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="/products/search" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Chercher un produit" name="keywords">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        {{--<div class="col-lg-3 col-6 text-right">
            <a href="/client/cart" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i> 
                <span class="badge">{{count($commande->lignecommandes)}}</span>
            </a>
        </div>--}}
    </div>
</div>