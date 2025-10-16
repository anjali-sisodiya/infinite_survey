
@include('admin.partials.header')
    @include('admin.partials.navbar')
    @include('admin.partials.sidebar')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
  .custom-fontsize{
    font-size: 12px;
  }
</style>
<body>
<h4 class="text-center" style="color: darkslateblue;">Edit Benificiary Data</h4>
    
<form method="POST" action="update_beneficiary/{{$show['beneficiary_id']}}" enctype="multipart/form-data" class="custom-fontsize row g-3 container mb-5 mt-3 m-auto fw-bold" style="background-color: ghostwhite;">
@method('PUT')
    @csrf

    <div class="col-md-6">
    <label for="b_name" class="form-label">Beneficiary Name</label>
    <input type="text" name="b_name" class="form-control" value="{{$show['b_name']}}">
  </div>

  <div class="col-md-6">
    <label for="f_name" class="form-label">Father Name</label>
    <input type="text" name="f_name" class="form-control" value="{{$show['father_name']}}">
  </div>

  <div class="col-md-6">
    <label for="age" class="form-label">Age</label>
    <input type="number" name="age" class="form-control" value="{{$show['age']}}">
  </div>

  <div class="col-md-6 mt-5">
  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
    <div class="col-md-6">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" value="Male"
{{$show->gender == "Male" ? "checked" : ""}}>
        <label class="form-check-label" for="gridRadios1">
          Male
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" value="Female"
{{$show->gender == "Female" ? "checked" : ""}}>

        <label class="form-check-label" for="gridRadios2">
          Female
        </label>
      </div>
      <div class="form-check disabled">
        <input class="form-check-input" type="radio" name="gender" value="Other"
{{$show->gender == "Other" ? "checked" : ""}}>

        <label class="form-check-label" for="gridRadios3">
          Other
        </label>
      </div>
    </div>
  </fieldset>
</div>

  <div class="col-md-6">
    <label for="f_members" class="form-label">Family Members</label>
    <input type="number" name="f_members" class="form-control" value="{{$show['fmly_members']}}">
  </div>

  <div class="col-md-6">
    <label for="occupation" class="form-label">Occupation</label>
    <input type="text" name="occupation" class="form-control" value="{{$show['occupation']}}">
  </div>

  <div class="col-md-6">
    <label for="avg_mnth_incm" class="form-label">Avg Monthly Income</label>
    <input type="number" name="avg_mnth_incm" class="form-control" value="{{$show['avg_mnthly_incm']}}">
  </div>

  <div class="col-md-6">
  <label for="vilg_name" class="form-label">Village_name</label>
  <select id="inputState" name="vilg_name" class="form-select">
    <option value="Aroli" {{$show->vlg_name == "Aroli" ? 'selected' : '' }}>Aroli</option>
    <option value="Kotra" {{$show->vlg_name == "Kotra" ? 'selected' : '' }}>Kotra</option>
    <option value="Barwai" {{$show->vlg_name == "Barwai" ? 'selected' : '' }}>Barwai</option>
  </select>
</div>



  <div class="col-md-6">
  <label for="tehsil_block" class="form-label">Tehsil/Block Name</label>
  <select id="inputState" name="tehsil_block" class="form-select">
    <option value="Kolar" {{$show->teh_or_block_name == "Kolar" ? 'selected' : '' }}>Kolar</option>
    <option value="Huzur" {{$show->teh_or_block_name == "Huzur" ? 'selected' : '' }}>Huzur</option>
    <option value="Raisen" {{$show->teh_or_block_name == "Raisen" ? 'selected' : '' }}>Raisen</option>
  </select>
</div>



  <div class="col-md-6">
  <label for="panchayat" class="form-label">Panchayat Name</label>
  <select id="inputState" name="panchayat" class="form-select">
    <option value="Gram_panchayat" {{$show->panchayat_name == "Gram_panchayat" ? 'selected' : '' }}>Gram_panchayat</option>
    <option value="jila_panchayat" {{$show->panchayat_name == "jila_panchayat" ? 'selected' : '' }}>jila_panchayat</option>
    <option value="janpad_panchayat" {{$show->panchayat_name == "janpad_panchayat" ? 'selected' : '' }}>janpad_panchayat</option>
  </select>
</div>


  <div class="col-md-6">
  <label for="district" class="form-label">District Name</label>
  <select id="inputState" name="district" class="form-select">
    <option value="Bhopal" {{$show->district_name == "Bhopal" ? 'selected' : '' }}>Bhopal</option>
    <option value="Kolar" {{$show->district_name == "Kolar" ? 'selected' : '' }}>Kolar</option>
    <option value="Raisen" {{$show->district_name == "Raisen" ? 'selected' : '' }}>Raisen</option>
  </select>
</div>

<div class="col-md-6">
  <label for="state" class="form-label">State Name</label>
<select id="inputState" name="state" class="form-select">
  <option value="Dehli" {{$show->state_name == "Dehli" ? 'selected' : '' }}>Dehli</option>
  <option value="Mumbai" {{$show->state_name == "Mumbai" ? 'selected' : '' }}>Mumbai</option>
  <option value="USA" {{$show->state_name == "USA" ? 'selected' : '' }}>USA</option>
</select>
</div>

  
  <div class="col-md-6">
    <label for="b_mo_no" class="form-label">Beneficiary Mobile Number</label>
    <input type="number" name="b_mo_no" class="form-control" value="{{$show['b_mobile']}}">
  </div>

  <div class="col-md-6">
    <label for="b_adhr_smgr_no" class="form-label">Beneficiary Adhar/Samagra No.</label>
    <input type="number" name="b_adhr_smgr_no" class="form-control" value="{{$show['b_mo_adhr_or_smgr_no']}}">
  </div>

<div class="mb-3 col-md-6">
    <label for="b_photo" class="form-label" >Beneficiary Photo</label>
    <input type="file" name="b_photo" class="form-control" multiple>
    <img class="w-25" src="{{ asset($show->b_img) }}" />
  </div>

  <div class="col-12 text-center">
    <button type="submit" class="btn mb-5 mt-2 w-50 btn-primary">UPDATE</button>
  </div>

</form>
  @include('admin.partials.footer')

</body>
</html>
