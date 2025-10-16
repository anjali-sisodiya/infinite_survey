

<!DOCTYPE html>
<html>
<head>
	<title>Infinte Survey Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<style>
  .custom-fontsize{
    font-size: 12px;
  }
</style>
<body>
  @include('admin.partials.header')
 @include('admin.partials.navbar')
 @include('admin.partials.sidebar')
<h4 class="text-center" style="color: darkslateblue;">Edit Baseline Information</h4>
    
<form method="POST" action="update_baseline/{{$show['baseline_info_id']}}" enctype="multipart/form-data" class="custom-fontsize row g-3 container mb-5 mt-3 m-auto fw-bold" style="background-color: ghostwhite;">
@method('PUT')
    @csrf


<div class="col-md-6">
    <label for="cookstove_type" class="form-label">Type of Cookstove Used </label>
    <select id="inputState" name="cookstove_type" class="form-select" required>
        <option value="Gas" {{$show->cookstove_type == "Gas" ? 'selected' : '' }}>Gas</option>
        <option value="Electric" {{$show->cookstove_type == "Electric" ? 'selected' : '' }}>Electric</option>
        <option value="Induction" {{$show->cookstove_type == "Induction" ? 'selected' : '' }}>Induction</option>
    </select>
</div>


<div class="col-md-6">
    <label for="no_of_meals" class="form-label">Number of Meals Cooked per Day</label>
    <select id="inputState" name="no_of_meals" class="form-select">
      <option value="350 to 600 calories each1" {{$show->no_of_meals == "350 to 600 calories each" ? 'selected' : '' }}>350 to 600 calories each</option>
      <option value="between 150 and 200 calories each" {{$show->no_of_meals == "between 150 and 200 calories each" ? 'selected' : '' }}>between 150 and 200 calories each</option>
      <option value="450 to 700 calories each3" {{$show->no_of_meals == "450 to 700 calories each" ? 'selected' : '' }}>450 to 700 calories each</option>
    </select>
  </div>

  <div class="col-md-6">
    <label for="avg_time_per_meal" class="form-label">Avg. Time Consumed per Meal (in min)</label>
    <input type="text" name="avg_time_per_meal" class="form-control" value="{{$show['avg_time_per_meal']}}">
  </div>

  <div class="col-md-6">
    <label for="fuel_type" class="form-label">Type of Fuel Used</label>
    <select id="inputState" name="fuel_type" class="form-select">
      <option value="wood" {{$show->fuel_type == "wood" ? 'selected' : '' }}>wood</option>
      <option value="char-coal" {{$show->fuel_type == "char-coal" ? 'selected' : '' }}>char-coal</option>
      <option value="Solid Fuels" {{$show->fuel_type == "Solid Fuels" ? 'selected' : '' }}>Solid Fuels</option>
      <option value="Gaseous Fuels" {{$show->fuel_type == "Gaseous Fuels" ? 'selected' : '' }}>Gaseous Fuels</option>
    </select>
  </div>


  <div class="col-md-6">
    <label for="prob_procured" class="form-label">In case of Firewood and Briquettes, how is it procured?</label>
    <input type="text" name="prob_procured" class="form-control" value="{{$show['prob_procured']}}">
  </div>

  <div class="col-md-6 mt-5">
  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">purchase_receipts</legend>
    <div class="col-md-6">
      <div class="form-check">
        <input class="form-check-input ms-5" type="radio" name="receipts" value="Yes"
{{$show->purchase_receipts == "Yes" ? "checked" : ""}}>
        <label class="form-check-label" for="gridRadios1">
          Yes
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input ms-5" type="radio" name="receipts" value="No"
{{$show->purchase_receipts == "No" ? "checked" : ""}}>
        <label class="form-check-label" for="gridRadios2">
          No
        </label>
      </div>
    </div>
  </fieldset>
</div>

  <div class="col-md-6">
    <label for="fuel_amount" class="form-label">Amount of fuel used per day (in kg)</label>
    <input type="text" name="fuel_amount" class="form-control" value="{{$show['fuel_amount']}}">
  </div>

  <div class="col-md-6">
    <label for="problems_current_cookstove" class="form-label">Problems you are facing due to current cookstove</label>
    <input type="text" name="problems_current_cookstove" class="form-control" value="{{$show['problems_current_cookstove']}}">
  </div>

<div class="mb-3 col-md-6">
    <label for="photo_cookstove" class="form-label" >Photo of the Current Cookstove</label>
    <input type="file" name="photo_cookstove" class="form-control" multiple>
    <img class="w-25" src="{{ asset($show->photo_cookstove) }}" />
  </div>
  

  <div class="col-12 text-center">
    <button type="submit" class="btn mb-5 mt-2 w-50 btn-primary">UPDATE</button>
  </div>

</form>

</body>
</html>
@include('admin.partials.footer')
