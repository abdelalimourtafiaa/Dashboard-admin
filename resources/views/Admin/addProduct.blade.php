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
        height: 1170px;
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
          
          <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group" style="padding: 15px">
                <div class="row">
                    <div class="col">
                     <label for="countries" style="color: black;">Name</label>
                     <input list="countries" placeholder="Name of product" style="background-color: #ffffff;color: black; border:none;" name="name" class="form-control" style="color: black">
                    </div>
                <div class="col">
                    <label for="banktype" style="color: black"  >Description</label>
                    <input list="banktype" placeholder="Description of product" style="background-color: #ffffff;color: black; border:none;"  name="Description" class="form-control" style="color: black">
                </div>
                </div>
            </div>
            <div class="form-group" style="padding: 15px">
                <div class="row">
                    <div class="col">
                    <label for="width" style="color: black">Prix</label>
                    <input type="number" style="background-color: #ffffff;color: black; border:none;" placeholder="Prix" name="prix" class="form-control" style="color: black">
                  </div>
                  <div class="col">
                    <label for="height" style="color: black">Category</label>
                    <select name="id_category" class="form-control" style="color: black; background-color: #ffffff; border: none;">
                        @foreach ($categorys as $category)
                            <option value="{{$category->id}}">{{$category->name_category}}</option>
                        @endforeach
                    </select>
                </div>
                
        </div>
    </div>
            
              <div class="form-group" style="padding: 15px">
              
                <input type="file" name="image" class="form-control-file" required>
            </div>
            <div class="form-group" style="padding: 15px">
              <button style="background-color:#00C0EF;width:50%;margin-right:22px;color: black" type="submit"  name="add_product">Valider</button>
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