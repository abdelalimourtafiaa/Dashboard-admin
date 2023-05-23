
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('Admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('Admin.sideBare')
      <!-- partial -->
      @include('Admin.navbar')
        <!-- partial -->
      @include('Admin.body')
       
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('Admin.script')
   
    <!-- End custom js for this page -->
  </body>
</html>