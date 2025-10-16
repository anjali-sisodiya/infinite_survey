<!DOCTYPE html>
<html>
<head>
    <title>Infinite Tables</title>

    <!-- Include Bootstrap CSS and JavaScript libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        .reduced-font {
            font-size: 11px !important;
        }

        .table th {
            white-space: normal;
            word-wrap: break-word;
        }
    </style>
</head>

<body>
   @include('admin.partials.header')
    @include('admin.partials.navbar')
    @include('admin.partials.sidebar')
<!-- <div class="main-panel"> -->
          <div class="content-wrapper">
            <div class="page-header">
              <h6>Ujwala Accept List</h6>
            </div>
            <div class="row">             
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="">
                     @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                    <form  action="" class="col-6 mt-3 ms-2">
  <div class="form-group">
    <input type="search" name="search" id="" class="form-control" placeholder="Search...">
   <button class="btn btn-primary btn-sm ms-2" style="position: relative;
    left: 255px;
    bottom: 45px;
    padding: 14px;">Search</button>

  </div>
</form>
<form method="get" action="/ujwala_reject" enctype="multipart/form-data" class="mt-5">


   

    <div class="table-responsive">
    <table class="table table-bordered" style="font-size: 13px;">
  <thead>
    <tr class="fw-bold">
      <th scope="col" class="text-center fw-bold">Ujwala Scheme Id</th>
      <th scope="col" class="text-center fw-bold">Available LPG</th>
      <th scope="col" class="text-center fw-bold">No Of LPG Cylinders</th>
      <th scope="col" class="text-center fw-bold">Use_LPG Inaday</th>
      <th scope="col" class="text-center fw-bold">Months One LPG Last</th>
      <th scope="col" class="text-center fw-bold">Pay One LPG</th>
      <th scope="col" class="text-center fw-bold">It Affordabale</th>
      <th scope="col" class="text-center fw-bold">Use Traditional Cookstove </th>
      <th scope="col" class="text-center fw-bold">Problem Face In LPG</th>
      <th scope="col" class="text-center fw-bold">Status</th>
      <th scope="col" class="text-center fw-bold">Action</th>
     
    </tr>
  </thead>
  <tbody>
  @if(!empty($show))
  @foreach($show as $member)
    <tr class="text-center">
      <td>{{ $member->beneficiary_id }}</td>
      <td>{{ $member->avail_lpg }}</td>
      <td>{{ $member->no_of_cylinders }}</td>
      <td>{{ $member->use_lpg_inaday }}</td>
      <td>{{ $member->months_onelpg_last }}</td>
      <td>{{ $member->pay_one_lpg }}</td>
      <td>{{ $member->it_affordabale }}</td>
      <td>{{ $member->use_traditional_cookstove }}</td>
      <td>{{ $member->prob_face_lpg }}</td>
      <td>{{ $member->status }}</td>
      <td>
      <div class="d-flex">
                                                <a class="text-decoration-none text-dark" href="survey_datalist/{{ $member->beneficiary_id }}">
                                                    <button type="button" class="btn reduced-font btn-warning btn-sm text-dark">View <i class="fa-solid reduced-font text-dark ms-1 fa-eye text-primary"></i></button>
                                                </a>
                                                <a class="text-decoration-none text-white" href="edit_ujwala/{{ $member->usd_id  }}">
                                                    <button type="button" class="btn ms-1 reduced-font btn-info btn-sm text-white">Edit <i class="fa-solid fa-pen-to-square reduced-font ms-1"></i></button>
                                                </a>
</div>
  
</td>


    @endforeach
    @endif
  </tbody>
</table>
</div>
</form>

</div>
                </div>
              </div>                        
            </div>
          </div>
  @include('admin.partials.footer')
