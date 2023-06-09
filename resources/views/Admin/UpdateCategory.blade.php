<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <style type="text/css">
        label{
            font-family: 'Montserrat', sans-serif;
            display: inline-block;
            width: 200px
        }
        .card {
        height: 1220px;
        width: 100%;
        color: black;
        margin-top: 30px;
        border-radius: 20px;
      }

      .card-body {
        padding: 0;
      }
      
    </style>
    @include('admin.css')
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sideBare')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="card" style=" background-color: #f2f2f2;border-radius: 20px">
                <div class="card-body">
            <div class="container" align="center" style="padding-top: 100px">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        
                    </button>
                    {{session()->get('message')}}
    
                </div>
                
            @endif
            <form action="{{ url('edite_categorie',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group" style="padding: 15px">
                    <div class="row">
                        <div class="col">
                         <label for="countries" style="color: black;">Nome de categorie </label>
                         <input list="countries" value="{{$data->name_category}}" placeholder="Name of product" style="background-color: #ffffff;color: black; border:none;" name="name" class="form-control" style="color: black">
                        </div>
                    
                    </div>
                </div>
              

        <div style="padding: 15px">
            <label for="">Old Image</label>
            <img height="100" width="100" src={{$data->icon}} alt="">
        </div>
                
                  <div class="form-group" style="padding: 15px">
                  
                    <input type="file" name="image" class="form-control-file" required>
                </div>
                <div class="form-group" style="padding: 15px">
                  <button style="background-color:#FF5252FF;width:50%;margin-right:22px;color: white" type="submit"  name="add_product">Valider</button>
                </div>
              </form>
                </div>
            </div>
        </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>