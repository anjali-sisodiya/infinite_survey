
<!DOCTYPE html>
<html>
<head>
	<title>product page</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<style>
.p_img{
    width: 82px;
    position: relative;
    left: 2px;
    top: 4px;
    }
</style>
<body>

	<form method="POST" action="update/{{$show['id']}}" enctype="multipart/form-data" class="container col-sm-8 mt-5">
    @method('PUT')
    @csrf
    <div class="mb-3">
    <input type="hidden" name="_method" value="PUT">
   
  </div>
  
	<div class="mb-3">
    <label for="Product_name" class="form-label">Product_name</label>
    <input type="text" name="p_name" class="form-control" value="{{$show['product_name']}}">
   
  </div>

  <div class="mb-3">
    <label for="Product_price" class="form-label">Product_price</label>
    <input type="number" name="p_price" class="form-control" value="{{$show['product_price']}}">
   
  </div>

  <div class="mb-3">
    <label for="Product_img" class="form-label" >Product_img</label>
    <input type="file" name="image" class="form-control" multiple>
    <img class="p_img" src="{{ asset($show->image) }}" />
  </div>
  
  <button type="submit" name="submit" class="btn btn-warning">Update</button>
</form>

</body>
</html>