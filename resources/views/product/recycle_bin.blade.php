
<!DOCTYPE html>
<html>
<head>
	<title>Product page</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body>

	<form method="get" action="/showlist" enctype="multipart/form-data" class="container col-sm-8 mt-5">
    <button type="submit" class="btn btn-success mb-3"><a class="text-decoration-none text-white" href="/addproduct">Add Product+</a></button>
    <table class="table table-bordered ">
  <thead>
    <tr>
      <th scope="col" class="text-center">Product_id</th>
      <th scope="col" class="text-center">Product_name</th>
      <th scope="col" class="text-center">Product_price</th>
      <th scope="col" class="text-center">Product_img</th>
      <th scope="col" class="text-center" colspan="2">Action</th>
     
    </tr>
  </thead>
  <tbody>
    @foreach($show as $member)
    <tr class="text-center">
      <td>{{ $member->id }}</td>
      <td>{{ $member->product_name }}</td>
      <td>{{ $member->product_price }}</td>
      <td><img class="w-25" src="{{ asset($member->image) }}" /></td>
      <td><a class="btn btn-info btn-sm text-white" href="restore/{{ $member->id }}">Restore</a></td>
      <td><a class="btn btn-danger btn-sm" href="delete/{{ $member->id }}">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

</form>

</body>
</html>
