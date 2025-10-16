
@include('admin.partials.header')
 @include('admin.partials.navbar')
 @include('admin.partials.sidebar')
 <!DOCTYPE html>
<html>
<head>
    <title>Infinite Tables</title>

    <!-- Include Bootstrap CSS and JavaScript libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<style>
  .custom-fontsize{
    font-size: 12px;
  }
</style>
<body>
<h4 class="text-center" style="color: darkslateblue;">Baseline Information</h4>
    
<form method="post" action="/store_baseline_data" enctype="multipart/form-data" class="custom-fontsize row g-3 container mb-5 mt-3 m-auto fw-bold" style="background-color: ghostwhite;">
@csrf 


<div class="col-md-6">
    <label for="cookstove_type" class="form-label">Type of Cookstove Used </label>
    <select id="inputState" name="cookstove_type" class="form-select" required>
        <option selected>Gas</option>
        <option>Electric</option>
        <option>Induction</option>
    </select>
</div>


<div class="col-md-6">
    <label for="no_of_meals" class="form-label">Number of Meals Cooked per Day</label>
    <select id="inputState" name="no_of_meals" class="form-select">
      <option selected>350 to 600 calories each</option>
      <option>between 150 and 200 calories each</option>
      <option>450 to 700 calories each</option>
    </select>
  </div>

  <div class="col-md-6">
    <label for="avg_time_per_meal" class="form-label">Avg. Time Consumed per Meal (in min)</label>
    <input type="text" name="avg_time_per_meal" class="form-control" placeholder="Avg. Time">
    <span class="text-danger">
    @error('avg_time_per_meal')
  {{$message}}
  @enderror
</span>
  </div>

  <div class="col-md-6">
    <label for="fuel_type" class="form-label">Type of Fuel Used</label>
    <select id="inputState" name="fuel_type" class="form-select">
      <option selected>wood</option>
      <option>char-coal</option>
      <option>Solid Fuels</option>
      <option>Gaseous Fuels</option>
    </select>
  </div>


  <div class="col-md-6">
    <label for="prob_procured" class="form-label">In case of Firewood and Briquettes, how is it procured?</label>
    <input type="text" name="prob_procured" class="form-control" placeholder="procured?">
    <span class="text-danger">
    @error('prob_procured')
  {{$message}}
  @enderror
</span>
  </div>

  <div class="col-md-6 mt-5">
  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">purchase_receipts</legend>
    <div class="col-md-6">
      <div class="form-check">
        <input class="form-check-input ms-5" type="radio" name="receipts" value="Yes" checked>
        <label class="form-check-label" for="gridRadios1">
          Yes
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input ms-5" type="radio" name="receipts" value="No">
        <label class="form-check-label" for="gridRadios2">
          No
        </label>
      </div>
    </div>
  </fieldset>
</div>

  <div class="col-md-6">
    <label for="fuel_amount" class="form-label">Amount of fuel used per day (in kg)</label>
    <input type="text" name="fuel_amount" class="form-control" placeholder="Amount of fuel">
    <span class="text-danger">
    @error('fuel_amount')
  {{$message}}
  @enderror
</span>
  </div>

  <div class="col-md-6">
    <label for="problems_current_cookstove" class="form-label">Problems you are facing due to current cookstove</label>
    <input type="text" name="problems_current_cookstove" class="form-control" placeholder="Problems you are facing">
    <span class="text-danger">
    @error('problems_current_cookstove')
  {{$message}}
  @enderror
</span>
  </div>

  
  <div class="input-group mb-3">
  <label class="input-group-text" for="photo_cookstove">Photo of the Current Cookstove</label>
  <input type="file" name="photo_cookstove" class="form-control" id="inputGroupFile01">
  <span class="text-danger">
    @error('photo_cookstove')
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
