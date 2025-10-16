@include('admin.partials.header')
 @include('admin.partials.navbar')
 @include('admin.partials.sidebar')
<!DOCTYPE html>
<html>
<head>
	<title>Edit Ujwala Scheme Details</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<style>
  .custom-fontsize{
    font-size: 12px;
  }
</style>
<body>
    
<h4 class="text-center" style="color: darkslateblue;">Edit Ujwala Scheme Details</h4>

<form method="POST" action="update_ujwala/{{$show['usd_id']}}" enctype="multipart/form-data" class="custom-fontsize row g-3 container mb-5 mt-3 m-auto fw-bold" style="background-color: ghostwhite;">
@method('PUT')
    @csrf

<div class="col-md-6">
    <label for="avail_lpg" class="form-label">Do you avail Ujwala Scheme (LPG Cylinder)?</label>
    <select id="inputState" name="avail_lpg" class="form-select">
      <option value="Yes" {{$show->avail_lpg == "Yes" ? 'selected' : '' }}>Yes</option>
      <option value="No" {{$show->avail_lpg == "No" ? 'selected' : '' }}>No</option>
    </select>
  </div>

<div class="col-md-6">
    <label for="no_of_cylinders" class="form-label">How many LPG cylinders do you have?</label>
    <select id="inputState" name="no_of_cylinders" class="form-select">
      <option value="1" {{$show->no_of_cylinders == "1" ? 'selected' : '' }}>1</option>
      <option value="2" {{$show->no_of_cylinders == "2" ? 'selected' : '' }}>2</option>
      <option value="3" {{$show->no_of_cylinders == "3" ? 'selected' : '' }}>3</option>
      <option value="4" {{$show->no_of_cylinders == "4" ? 'selected' : '' }}>4</option>
      <option value="5" {{$show->no_of_cylinders == "5" ? 'selected' : '' }}>5</option>
    </select>
  </div>

  <div class="col-md-6">
    <label for="use_lpg_inaday" class="form-label">How many times do you use one LPG Cylinder in a day?</label>
    <select id="inputState" name="use_lpg_inaday" class="form-select">
      <option value="2" {{$show->use_lpg_inaday == "2" ? 'selected' : '' }}>2</option>
      <option value="3" {{$show->use_lpg_inaday == "3" ? 'selected' : '' }}>3</option>
      <option value="4" {{$show->use_lpg_inaday == "4" ? 'selected' : '' }}>4</option>
    </select>
  </div>

  <div class="col-md-6">
    <label for="months_onelpg_last" class="form-label">How many months does one LPG Cylinder last?</label>
    <select id="inputState" name="months_onelpg_last" class="form-select">
      <option value="2" {{$show->months_onelpg_last == "2" ? 'selected' : '' }}>2</option>
      <option value="4" {{$show->months_onelpg_last == "4" ? 'selected' : '' }}>4</option>
      <option value="6" {{$show->months_onelpg_last == "6" ? 'selected' : '' }}>6</option>
    </select>
  </div>
  

  <div class="col-md-6">
    <label for="pay_one_lpg" class="form-label">How much do you pay for one LPG Cylinder?</label>
    <input type="number" name="pay_one_lpg" class="form-control" value="{{$show['pay_one_lpg']}}">
  </div>



<div class="col-md-6">
    <label for="it_affordable" class="form-label">Do you find it affordable?</label>
    <select id="inputState" name="it_affordable" class="form-select">
      <option value="Yes" {{$show->it_affordable == "Yes" ? 'selected' : '' }}>Yes</option>
      <option value="No" {{$show->it_affordable == "No" ? 'selected' : '' }}>No</option>
    </select>
  </div>


<div class="col-md-6">
    <label for="trad_cookstove" class="form-label">Do you still use traditional cookstove?</label>
    <select id="inputState" name="trad_cookstove" class="form-select">
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
  </div>

<div class="col-md-6">
    <label for="prob_face_lpg" class="form-label">If yes, why? Or any problem you face with LPG cylinder?</label>
    <input type="text" name="prob_face_lpg" class="form-control" value="{{$show['prob_face_lpg']}}">
  </div>
  

  <div class="col-12 text-center">
    <button type="submit" class="btn mb-5 mt-2 w-50 btn-primary">UPDATE</button>
  </div>

</form>

</body>
</html>
@include('admin.partials.footer')
