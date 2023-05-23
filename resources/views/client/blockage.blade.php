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
              
                Compte bloquer par l'administration
              
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