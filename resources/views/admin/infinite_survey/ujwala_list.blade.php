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
              <button class="btn btn-info btn-sm ms-2 text-white"><a href="/ujwala_scheme_form" class="page-title reduced-font text-decoration-none text-white">Add Data</a></button>
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
<form action="/show_ujwala_data" method="get" enctype="multipart/form-data" class="ms-2 mt-3 col-6">
    <div class="input-group">
        <input type="search" name="search" class="form-control" placeholder="Here you can search all feilds...">
        <button class="btn btn-primary btn-sm" type="submit">Search</button>
    </div>
</form>

<div class="input-group mt-5">
    <form action="/show_ujwala_data" method="get" enctype="multipart/form-data" class="mt-3">
        <div class="input-group">
            <select name="no_of_cylinders" class="form-select ms-2">
                <option value="all" {{ $no_cylindersFilter == 'all' ? 'selected' : '' }}>All</option>
                <option value="1" {{ $no_cylindersFilter == '1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ $no_cylindersFilter == '2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ $no_cylindersFilter == '3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ $no_cylindersFilter == '4' ? 'selected' : '' }}>4</option>
                <option value="5" {{ $no_cylindersFilter == '5' ? 'selected' : '' }}>5</option>
            </select>
            <button type="submit" class="btn btn-success btn-sm">Filter by Cyclinder</button>
        </div>
    </form>

    <form action="/show_ujwala_data" method="get" enctype="multipart/form-data" class="mt-3">
        <div class="input-group">
            <select name="avail_lpg" class="form-select ms-2">
                <option value="all" {{ $avail_lpgFilter == 'all' ? 'selected' : '' }}>All</option>
                <option value="Yes" {{ $avail_lpgFilter == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value="No" {{ $avail_lpgFilter == 'No' ? 'selected' : '' }}>No</option>
            </select>
            <button type="submit" class="btn btn-success btn-sm">Filter by LPG</button>
        </div>
    </form>

    <form action="/show_ujwala_data" method="get" enctype="multipart/form-data" class="mt-3">
        <div class="input-group">
            <select name="status" class="form-select ms-2">
                <option value="all" {{ $statusFilter == 'all' ? 'selected' : '' }}>All</option>
                <option value="Pending" {{ $statusFilter == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Accepted" {{ $statusFilter == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                <option value="Cancel" {{ $statusFilter == 'Cancel' ? 'selected' : '' }}>Cancel</option>
            </select>
            <button type="submit" class="btn btn-success btn-sm">Filter by Status</button>
        </div>
    </form>
      </div>

   
      @if ($show->count() > 0)
    <div class="table-responsive">
    <table class="table table-bordered mt-5" style="font-size: 13px;">
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
                                                </a><br>
                                                <form method="POST" action="/accept_ujwala/{{ $member->usd_id }}">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit" class="btn reduced-font btn-sm text-white ms-1" style="background-color: #008000 !important;">
                                                        Accept Data <i class="fa-solid ms-1 reduced-font fa-check text-white"></i>
                                                   


    <form method="POST" action="/reject_ujwala/{{ $member->usd_id }}">
    @method('PUT')
    @csrf
    <button type="submit" class="btn reduced-font btn-danger btn-sm text-dark ms-1">
        Reject Data<i class="fa-solid ms-1 reduced-font fa-xmark text-dark"></i>
    </button>
</form>
</div>
  
</td>


    @endforeach
    @endif
  </tbody>
</table>
</div>
@else
        <p class="text-center fw-bold mt-4">No Records Found.</p>
    @endif
</form>

</div>
                </div>
              </div>                        
            </div>
          </div>
  @include('admin.partials.footer')
