
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infinite Earth Survey</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<style>
.custom-css{
    font-size:14px!important;
    font-weight:bold;
}
.print-btn{
    position: relative;
    left: 6px;
    bottom: 5px;
}
.fnt-size{
    font-size:12px!important;
    font-weight:bold;
}
.custom-width{
  width: 910px;
}
.user-img{
  width: 92px;
}
</style>
<body>
    
<!-- -------------------Section-1------------------------>
<form method="get" action="" enctype="multipart/form-data" class="container col-sm-8 mt-5" style="margin-left:85px;">
<div class="d-flex container fnt-size">
    <p class="mt-3">27/09/2023, 12:04</p>
    <p class="m-auto">Infinte Earth Survey</p>
</div>

<hr class="container">

<div class="container fnt-size">
    <div class="float-start">Information of survey</div>
    <div class="float-end">
    <p class="">Select language :
    <a href="">हिन्दी |</a>
    <a href="">English</a>
    <button class="float-end print-btn">Print Data</button>
</p></div>
  </div>

  <hr class="container mb-3">

  <h1 class="container mb-3">Beneficiary Data</h1>


<table class="table mb-5 custom-width custom-css">
  <thead>
    <!-- <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
    </tr> -->
  </thead>
  <tbody>
    <tr>
      <td  class="pt-3 pb-3">Beneficiary Name :{{ $show->b_name }}</td>
      <td  class="pt-3 pb-3">Father Name : {{ $show->father_name }} </td>
      <td  class="pt-3 pb-3">Gender : {{ $show->gender }}</td>
    <tr>
      <td  class="pt-3 pb-3">Age : {{ $show->age }} </td>
      <td  class="pt-3 pb-3">Family Members :{{ $show->fmly_members }}</td>
      <td  class="pt-3 pb-3">Occupation :{{ $show->occupation }}</td>
    </tr>
    <tr>
      <td  class="pt-3 pb-3">Avg. Monthly Income : {{ $show->avg_mnthly_incm }}</td>
      <td  class="pt-3 pb-3">Village Name :{{ $show->vlg_name }}</td>
      <td  class="pt-3 pb-3">Tehsil/Block Name : {{ $show->teh_or_block_name }}</td>
    </tr>
    <tr>
      <td  class="pt-3 pb-3">Panchayat Name :{{ $show->panchayat_name }}</td>
      <td  class="pt-3 pb-3">District Name :{{ $show->state_name }}</td>
      <td  class="pt-3 pb-3">State Name :{{ $show->district_name }}</td>
    </tr>
    <tr>
      <td  class="pt-3 pb-3">Beneficiary Photo :
        <img class="rounded-circle user-img" src="{{ asset($show->b_img) }}" />
      </td>
      <td  class="pt-3 pb-3">Beneficiary Mobile No. :{{ $show->b_mobile }}</td>
      <td ></td>
    </tr>
    <tr>
      <td  class="pt-3 pb-3">Beneficiary Mobile Adhar/ Samagra No. :{{ $show->b_mo_adhr_or_smgr_no }}</td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>
</form>

<!-- -------------------Section-2--------------------- -->
<form method="get" action="" enctype="multipart/form-data" class="container col-sm-8 mt-5" style="margin-left:85px;">

  <h1 class="container">Baseline Information</h1>


<table class="table custom-width mt-5 mb-5 custom-css">
  <thead>
    <!-- <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
    </tr> -->
  </thead>
  <tbody>

    <tr class="p-3">
      <td  class="" style="position: relative;top: 20px;">Type of Cookstove Used :{{ $data->cookstove_type }} </td>
      <td  class="ms-3 px-5">Photo of the Current Cookstove : 
        <img class="w-25 px-4" src="{{ asset($data->photo_cookstove) }}" />
    </td>
    <tr>
      <td  class="pt-3 pb-3">Number of Meals Cooked per Day :{{ $data->no_of_meals }}</td>
      <td  class="pt-3 pb-3 px-5">Avg. Time Consumed per Meal (in min) :{{ $data->avg_time_per_meal }}</td>
    </tr>
    <tr>
      <td  class="pt-3 pb-3">Type of Fuel Used :{{ $data->fuel_type }}</td>
      <td  class="pt-3 pb-3 px-5">In case of Firewood and Briquettes, how is it procured? :{{ $data->prob_procured }}</td>
    </tr>
    <tr>
      <td  class="pt-3 pb-3">In case of Purchase, do you get purchase receipts? :{{ $data->purchase_receipts }}</td>
      <td  class="pt-3 pb-3 px-5">Amount of fuel used per day (in kg) :{{ $data->fuel_amount }}</td>
    </tr>
    <tr>
      <td  class="pt-3 pb-3">Problems you are facing due to current cookstove :{{ $data->problems_current_cookstove }}</td>
      <td></td>
    </tr>
  </tbody>

</table>
</form>
<!-- -------------------Section-3--------------------- -->

<form method="get" action="" class="container col-sm-8 mt-5" style="margin-left:85px;">

<h1 class="container">Ujwala Scheme Details</h1>


<table class="table custom-width mt-5 mb-5 custom-css">
  <thead>
    <!-- <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
    </tr> -->
  </thead>
  <tbody>

    <tr>
      <td  class="pt-3 pb-3">Do you avail Ujwala Scheme (LPG Cylinder)? :{{ $list->avail_lpg }}</td>
      <td  class="pt-3 pb-3 px-5">How many LPG cylinders do you have? :{{ $list->no_of_cylinders }}</td>
    <tr>
      <td  class="pt-3 pb-3">How many times do you use one LPG Cylinder in a day? :{{ $list->use_lpg_inaday }}</td>
      <td  class="pt-3 pb-3 px-5">How many months does one LPG Cylinder last? :{{ $list->months_onelpg_last }}</td>
    </tr>
    <tr>
      <td  class="pt-3 pb-3">How much do you pay for one LPG Cylinder?{{ $list->pay_one_lpg }}</td>
      <td  class="pt-3 pb-3 px-5">Do you find it affordable?{{ $list->it_affordabale }}</td>
    </tr>
    <tr>
      <td  class="pt-3 pb-3">Do you still use traditional cookstove? :{{ $list->use_traditional_cookstove	 }} </td>
      <td  class="pt-3 pb-3 px-5">If yes, why? Or any problem you face with LPG cylinder? :{{ $list->prob_face_lpg }}</td>
    </tr>

  </tbody>
</table>
   <hr class="container">
   <div class="container">
    <div class="float-start fnt-size">Copyright &copy; 2023. All rights reserved.</div>
    <div class="float-end d-flex fnt-size">
    <p class="">Infinte Earth Survey (by:
    <a href="">: SPARK23</a>
    <p>) v1.0</p>
</p></div>
  </div>
</form>

</body>
</html>