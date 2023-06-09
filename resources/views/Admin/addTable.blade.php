<!DOCTYPE html>
<html lang="en">
<head>

  <base href="/public"> 
  <style>

    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
  

    
    body {
      background-color: #f2f2f2;
    }

    label {
        font-family: 'Montserrat', sans-serif;
      display: inline-block;
      width: 200px;
    }
    .card {
     
        width: 100%;
        color: black;
        margin-top: 30px;
        border-radius: 20px;
      }

      .card-body {
        padding: 0;
      }
   
  </style>
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  
  @include('admin.css')
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sideBare')
    <!-- partial -->
    @include('admin.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper" style="background-color: #FFFFFF;border-radius: 10px">
        <div class="card" style=" background-color: #f2f2f2;border-radius: 20px">
            <div class="card-body">
      <div class="container" align="center">
        <div class="container"  style="padding-top: 100px">
          @if (session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('message') }}
          </div>
          @endif
          
          <form action="{{ url('upload_table') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group" style="padding: 15px">
                <div class="row">
                    <div class="col">
                     <label for="countries" style="color: black;">Nom de table </label>
                     <input list="countries" placeholder="Nom de table" style="background-color: #ffffff;color: black; border:none;" name="name" class="form-control" style="color: black">
                    </div>
                </div>
            </div>
            <div class="form-group" style="padding: 15px">
              
    </div>
            
              <div class="form-group" style="padding: 15px">
              
              
            </div>
            <div class="form-group" style="padding: 15px">
              <button style="background-color:#FF5252FF;width:50%;margin-right:22px;color: white" type="submit"  name="add_category">Valider</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
</div>
  </div>
  
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  
  <!-- Your other scripts -->
  @include('admin.script')
</body>
</html>