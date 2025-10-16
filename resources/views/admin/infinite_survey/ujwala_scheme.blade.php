@include('admin.partials.header')
 @include('admin.partials.navbar')
 @include('admin.partials.sidebar')
<!DOCTYPE html>
<html>
<head>
	<title>Infinte Survey Form</title>

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
    
<h4 class="text-center" style="color: darkslateblue;">Ujwala Scheme Details</h4>

<form method="post" action="/store_ujwala_data" class="custom-fontsize row g-3 container mb-5 mt-3 m-auto fw-bold" style="background-color: ghostwhite;">
@csrf  

<div class="col-md-6">
    <label for="avail_lpg" class="form-label">Do you avail Ujwala Scheme (LPG Cylinder)?</label>
    <select id="inputState" name="avail_lpg" class="form-select">
      <option selected>Electric Stove</option>
      <option>Gas Stove</option>
      <option>Induction Stove</option>
    </select>
  </div>

<div class="col-md-6">
    <label for="no_of_cylinders" class="form-label">How many LPG cylinders do you have?</label>
    <select id="inputState" name="no_of_cylinders" class="form-select">
      <option selected>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>

  <div class="col-md-6">
    <label for="use_lpg_inaday" class="form-label">How many times do you use one LPG Cylinder in a day?</label>
    <select id="inputState" name="use_lpg_inaday" class="form-select">
      <option selected>2</option>
      <option>3</option>
      <option>4</option>
    </select>
  </div>

  <div class="col-md-6">
    <label for="months_onelpg_last" class="form-label">How many months does one LPG Cylinder last?</label>
    <select id="inputState" name="months_onelpg_last" class="form-select">
      <option selected>2</option>
      <option>4</option>
      <option>6</option>
    </select>
  </div>
  

  <div class="col-md-6">
    <label for="pay_one_lpg" class="form-label">How much do you pay for one LPG Cylinder?</label>
    <input type="number" name="pay_one_lpg" class="form-control" placeholder="procured?">
    <span class="text-danger">
    @error('pay_one_lpg')
  {{$message}}
  @enderror
</span>
  </div>



<div class="col-md-6">
    <label for="it_affordable" class="form-label">Do you find it affordable?</label>
    <select id="inputState" name="it_affordable" class="form-select">
      <option selected>Yes</option>
      <option>No</option>
    </select>
  </div>


<div class="col-md-6">
    <label for="trad_cookstove" class="form-label">Do you still use traditional cookstove?</label>
    <select id="inputState" name="trad_cookstove" class="form-select">
      <option selected>Yes</option>
      <option>No</option>
    </select>
  </div>

<div class="col-md-6">
    <label for="prob_face_lpg" class="form-label">If yes, why? Or any problem you face with LPG cylinder?</label>
    <input type="text" name="prob_face_lpg" class="form-control" placeholder="procured?">
    <span class="text-danger">
    @error('prob_face_lpg')
  {{$message}}
  @enderror
</span>
  </div>
  

  <div class="col-12 text-center">
    <button type="submit" class="btn mb-5 mt-2 w-50 btn-success">Submit</button>
  </div>

</form>

</body>
</html>
@include('admin.partials.footer')
