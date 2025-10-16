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

<div class="content-wrapper">
    <div class="page-header">
 <button class="btn btn-info btn-sm ms-2 text-white"><a href="/baseline_info_form" class="page-title reduced-font text-decoration-none text-white">Add Data</a></button>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                  <form action="/show_baseline_data" method="get" enctype="multipart/form-data" class="ms-2 mt-3 col-6">
    <div class="input-group">
        <input type="search" name="search" class="form-control" placeholder="Here you can search all feilds...">
        <button class="btn btn-primary btn-sm" type="submit">Search</button>
    </div>
</form>

    <div class="input-group mt-5">
    <form action="/show_baseline_data" method="get" enctype="multipart/form-data" class="mt-3">
        <div class="input-group">
            <select name="cookstove_type" class="form-select ms-2">
                <option value="all" {{ $cookstoveFilter == 'all' ? 'selected' : '' }}>All</option>
                <option value="Gas" {{ $cookstoveFilter == 'Gas' ? 'selected' : '' }}>Gas</option>
                <option value="Electric" {{ $cookstoveFilter == 'Electric' ? 'selected' : '' }}>Electric</option>
                <option value="Induction" {{ $cookstoveFilter == 'Induction' ? 'selected' : '' }}>Induction</option>
            </select>
            <button type="submit" class="btn btn-success btn-sm">Filter by Cookstove</button>
        </div>
    </form>

     <form action="/show_baseline_data" method="get" enctype="multipart/form-data" class="mt-3">
        <div class="input-group">
            <select name="receipts" class="form-select ms-2">
                <option value="all" {{ $receiptsFilter == 'all' ? 'selected' : '' }}>All</option>
                <option value="Yes" {{ $receiptsFilter == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value=" No" {{ $receiptsFilter == 'No' ? 'selected' : '' }}> No</option>
            </select>
            <button type="submit" class="btn btn-success btn-sm">Filter by Receipts</button>
        </div>
    </form>

    <form action="/show_baseline_data" method="get" enctype="multipart/form-data" class="mt-3">
        <div class="input-group">
            <select name="fuel_type" class="form-select ms-2">
                <option value="all" {{ $fuelFilter == 'all' ? 'selected' : '' }}>All</option>
                <option value="wood" {{ $fuelFilter == 'wood' ? 'selected' : '' }}>wood</option>
                <option value="char-coal" {{ $fuelFilter == 'char-coal' ? 'selected' : '' }}>char-coal</option>
                <option value="Solid Fuels" {{ $fuelFilter == 'Solid Fuels' ? 'selected' : '' }}>Solid Fuels</option>
                <option value="Gaseous Fuels" {{ $fuelFilter == 'Gaseous Fuels' ? 'selected' : '' }}>Gaseous Fuels</option>
            </select>
            <button type="submit" class="btn btn-success btn-sm">Filter by Fuel</button>
        </div>
    </form>

    <form action="/show_baseline_data" method="get" enctype="multipart/form-data" class="mt-3">
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

                    <form method="get" action="/show_baseline_data" enctype="multipart/form-data" class="mt-5">
                         @if ($show->count() > 0)

                        <div class="table-responsive">
                            <table class="table table-bordered" style="font-size: 13px;">
                                <thead>
                                <tr class="fw-bold">
                                    <th scope="col" class="text-center fw-bold">Baseline Id</th>
                                    <th scope="col" class="text-center fw-bold">Cookstove type</th>
                                    <th scope="col" class="text-center fw-bold">Cookstove Photo</th>
                                    <th scope="col" class="text-center fw-bold">No of Meals</th>
                                    <th scope="col" class="text-center fw-bold">Average Time Per Meal</th>
                                    <th scope="col" class="text-center fw-bold">Fuel Type</th>
                                    <th scope="col" class="text-center fw-bold">Problem Procured</th>
                                    <th scope="col" class="text-center fw-bold">Purchase Receipts</th>
                                    <th scope="col" class="text-center fw-bold">Fuel Amount</th>
                                    <th scope="col" class="text-center fw-bold">Problems Current Cookstove</th>
                                    <th scope="col" class="text-center fw-bold">Status</th>
                                    <th scope="col" class="text-center fw-bold">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($show))
                                    @foreach($show as $member)
                                        <tr class="text-center">
                                            <td>{{ $member->beneficiary_id }}</td>
                                            <td>{{ $member->cookstove_type }}</td>
                                            <td><img class="w-50" src="{{ asset($member->photo_cookstove) }}" /></td>
                                            <td>{{ $member->no_of_meals }}</td>
                                            <td>{{ $member->avg_time_per_meal }}</td>
                                            <td>{{ $member->fuel_type }}</td>
                                            <td>{{ $member->prob_procured }}</td>
                                            <td>{{ $member->purchase_receipts }}</td>
                                            <td>{{ $member->fuel_amount }}</td>
                                            <td>{{ $member->problems_current_cookstove }}</td>
                                            <td>{{ $member->status }}</td>
                                            <td>
                                              <div class="d-flex">
                                                <a class="text-decoration-none text-dark" href="survey_datalist/{{ $member->beneficiary_id }}">
                                                    <button type="button" class="btn reduced-font btn-warning btn-sm text-dark">View <i class="fa-solid reduced-font text-dark ms-1 fa-eye text-primary"></i></button>
                                                </a>
                                                <a class="text-decoration-none text-white" href="edit_baseline/{{ $member->baseline_info_id }}">
                                                    <button type="button" class="btn reduced-font ms-1 btn-info btn-sm text-white">Edit <i class="fa-solid fa-pen-to-square reduced-font ms-1"></i></button>
                                                </a><br>
                                                <form method="POST" action="/accept_baseline/{{ $member->baseline_info_id }}">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit" class="btn reduced-font btn-sm text-white ms-1" style="background-color: #008000 !important;">
                                                        Accept Data <i class="fa-solid ms-1 reduced-font fa-check text-white"></i>
                                                   


    <form method="POST" action="/reject_baseline/{{ $member->baseline_info_id }}">
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
        <p class="text-center fw-bold">No Records Found.</p>
    @endif
</form>

</div>
                </div>
              </div>                        
            </div>
          </div>
  @include('admin.partials.footer')
