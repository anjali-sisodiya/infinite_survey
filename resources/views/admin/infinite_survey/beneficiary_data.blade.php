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
<h4 class="text-center" style="color: darkslateblue;">Benificiary Data</h4>
    
<form method="post" action="/store_beneficiary_data" enctype="multipart/form-data" class="custom-fontsize row g-3 container mb-5 mt-3 m-auto fw-bold" style="background-color: ghostwhite;">
@csrf  

    <div class="col-md-6">
    <label for="b_name" class="form-label">Beneficiary Name</label>
    <input type="text" name="b_name" class="form-control" placeholder="Beneficiary Name">
    <span class="text-danger">
  @error('b_name')
  {{$message}}
  @enderror
    </span>
  </div>

  <div class="col-md-6">
    <label for="f_name" class="form-label">Father Name</label>
    <input type="text" name="f_name" class="form-control" placeholder="Father Name">
    <span class="text-danger">
    @error('f_name')
  {{$message}}
  @enderror
</span>
  </div>

  <div class="col-md-6">
    <label for="age" class="form-label">Age</label>
    <input type="number" name="age" class="form-control" placeholder="Age">
    <span class="text-danger">
    @error('age')
  {{$message}}
  @enderror
</span>
  </div>

  <div class="col-md-6 mt-5">
  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
    <div class="col-md-6">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" value="male" checked>
        <label class="form-check-label" for="gridRadios1">
          Male
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" value="female">
        <label class="form-check-label" for="gridRadios2">
          Female
        </label>
      </div>
      <div class="form-check disabled">
        <input class="form-check-input" type="radio" name="gender" value="other">
        <label class="form-check-label" for="gridRadios3">
          Other
        </label>
      </div>
    </div>
  </fieldset>
</div>

  <div class="col-md-6">
    <label for="f_members" class="form-label">Family Members</label>
    <input type="number" name="f_members" class="form-control" placeholder="Family Members">
    <span class="text-danger">
    @error('f_members')
  {{$message}}
  @enderror
</span>
  </div>

  <div class="col-md-6">
    <label for="occupation" class="form-label">Occupation</label>
    <input type="text" name="occupation" class="form-control" placeholder="Occupation">
    <span class="text-danger">
    @error('occupation')
  {{$message}}
  @enderror
</span>
  </div>

  <div class="col-md-6">
    <label for="avg_mnth_incm" class="form-label">Avg Monthly Income</label>
    <input type="number" name="avg_mnth_incm" class="form-control" placeholder="Avg Monthly Income">
    <span class="text-danger">
    @error('avg_mnth_incm')
  {{$message}}
  @enderror
</span>
  </div>

  <div class="col-md-6">
    <label for="vilg_name" class="form-label">Village_name</label>
    <select id="inputState" name="vilg_name" class="form-select">
      <option selected>Aroli</option>
      <option>Kotra</option>
      <option>Barwai</option>
    </select>
  </div>


  <div class="col-md-6">
    <label for="tehsil_block" class="form-label">Tehsil/Block Name</label>
    <select id="inputState" name="tehsil_block" class="form-select">
      <option selected>Kolar</option>
      <option>Huzur</option>
      <option>Raisen</option>
    </select>
  </div>


  <div class="col-md-6">
    <label for="panchayat" class="form-label">Panchayat Name</label>
    <select id="inputState" name="panchayat" class="form-select">
      <option selected>Gram Panchayat</option>
      <option>jila Panchayat</option>
      <option>janpad Panchayat</option>
    </select>
  </div>

  <div class="col-md-6">
    <label for="district" class="form-label">District Name</label>
    <select id="inputState" name="district" class="form-select">
      <option selected>Bhopal</option>
      <option>Kolar</option>
      <option>Raisen</option>
    </select>
  </div>

  <div class="col-md-6">
    <label for="state" class="form-label">State Name</label>
    <select id="inputState" name="state" class="form-select">
      <option selected>Dehli</option>
      <option>Mumbai</option>
      <option>USA</option>
    </select>
  </div>
  
  <div class="col-md-6">
    <label for="b_mo_no" class="form-label">Beneficiary Mobile Number</label>
    <input type="number" name="b_mo_no" class="form-control" placeholder="Beneficiary Mobile Number">
    <span class="text-danger">
    @error('b_mo_no')
  {{$message}}
  @enderror
</span>
  </div>

  <div class="col-md-6">
    <label for="b_adhr_smgr_no" class="form-label">Beneficiary Adhar/Samagra No.</label>
    <input type="number" name="b_adhr_smgr_no" class="form-control" placeholder="Beneficiary Adhar/Samagra No.">
    <span class="text-danger">
    @error('b_adhr_smgr_no')
  {{$message}}
  @enderror
</span>
  </div>

  <div class="input-group mb-3">
  <label class="input-group-text" for="b_photo">Beneficiary Photo</label>
  <input type="file" name="b_img" class="form-control" id="inputGroupFile01">
  <span class="text-danger">
  @error('b_img')
  {{$message}}
  @enderror
</span>
</div>

  <div class="col-12 text-center">
    <button type="submit" class="btn mb-5 mt-2 w-50 btn-success">NEXT</button>
  </div>

</form>

</body>
</html>
@include('admin.partials.footer')
