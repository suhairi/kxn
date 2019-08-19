<!-- Page Wrapper -->
  <div id="wrapper">



    @include('layouts._sidebar')

    @include('layouts._topbar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      @yield('content')
    </div>
    <!-- End of Content Wrapper -->

    @include('layouts._footer')

  </div>
  <!-- End of Page Wrapper -->