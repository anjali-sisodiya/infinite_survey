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
            <button class="btn btn-info btn-sm ms-2 text-white"><a href="/beneficiary_form" class="page-title reduced-font text-decoration-none text-white">Add Data</a></button>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
 <form action="" method="get" enctype="multipart/form-data" class="ms-2 mt-3 col-6">
    <div class="input-group">
        <input type="search" name="search" class="form-control" placeholder="Here you can search all feilds...">
        <button class="btn btn-primary btn-sm" type="submit">Search</button>
    </div>
</form>

     <div class="input-group mt-5">
    <form action="/show_beneficiary_data" method="get" enctype="multipart/form-data" class="mt-3">
        <div class="input-group">
            <select name="state" class="form-select ms-2">
                <option value="all" {{ $stateFilter == 'all' ? 'selected' : '' }}>All</option>
                <option value="Dehli" {{ $stateFilter == 'Dehli' ? 'selected' : '' }}>Dehli</option>
                <option value="Mumbai" {{ $stateFilter == 'Mumbai' ? 'selected' : '' }}>Mumbai</option>
                <option value="USA" {{ $stateFilter == 'USA' ? 'selected' : '' }}>USA</option>
            </select>
            <button type="submit" class="btn btn-success btn-sm">Filter by State</button>
        </div>
    </form>

    <form action="/show_beneficiary_data" method="get" enctype="multipart/form-data" class="mt-3">
        <div class="input-group">
            <select name="vilg_name" class="form-select ms-2">
                <option value="all" {{ $vlgFilter == 'all' ? 'selected' : '' }}>All</option>
                <option value="Aroli" {{ $vlgFilter == 'Aroli' ? 'selected' : '' }}>Aroli</option>
                <option value="Kotra" {{ $vlgFilter == 'Kotra' ? 'selected' : '' }}>Kotra</option>
                <option value="Barwai" {{ $vlgFilter == 'Barwai' ? 'selected' : '' }}>Barwai</option>
            </select>
            <button type="submit" class="btn btn-success btn-sm">Filter by Village</button>
        </div>
    </form>

    <form action="/show_beneficiary_data" method="get" enctype="multipart/form-data" class="mt-3">
        <div class="input-group">
            <select name="tehsil_block" class="form-select ms-2">
                <option value="all" {{ $tehsilFilter == 'all' ? 'selected' : '' }}>All</option>
                <option value="Kolar" {{ $tehsilFilter == 'Kolar' ? 'selected' : '' }}>Kolar</option>
                <option value="Huzur" {{ $tehsilFilter == 'Huzur' ? 'selected' : '' }}>Huzur</option>
                <option value="Raisen" {{ $tehsilFilter == 'Raisen' ? 'selected' : '' }}>Raisen</option>
            </select>
            <button type="submit" class="btn btn-success btn-sm">Filter by Tehsil</button>
        </div>
    </form>

    <form action="/show_beneficiary_data" method="get" enctype="multipart/form-data" class="mt-3">
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

                  
                    <form method="get" action="/show_beneficiary_data" enctype="multipart/form-data" class="mt-5">
                         @if ($show->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered" style="font-size: 13px;">
                                <thead>
                                    <tr class="fw-bold text-center">
                                        <th>Beneficiary Id</th>
                                        <th>Beneficiary Name</th>
                                        <th>Father Name</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Family Members</th>
                                        <th>Occupation</th>
                                        <th>Avg. Monthly Income</th>
                                        <th>Village Name</th>
                                        <th>Tehsil/Block Name</th>
                                        <th>Panchayat Name</th>
                                        <th>District Name</th>
                                        <th>State Name</th>
                                        <th>Beneficiary Photo</th>
                                        <th>Beneficiary Mobile No.</th>
                                        <th>Beneficiary Mobile Adhar/ Samagra No.</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($show))
                                    @foreach($show as $member)
                                    <tr class="text-center">

                                        <td>{{ $member->beneficiary_id }}</td>
                                        <td>{{ $member->b_name }}</td>
                                        <td>{{ $member->father_name }}</td>
                                        <td>{{ $member->gender }}</td>
                                        <td>{{ $member->age }}</td>
                                        <td>{{ $member->fmly_members }}</td>
                                        <td>{{ $member->occupation }}</td>
                                        <td>{{ $member->avg_mnthly_incm }}</td>
                                        <td>{{ $member->vlg_name }}</td>
                                        <td>{{ $member->teh_or_block_name }}</td>
                                        <td>{{ $member->panchayat_name }}</td>
                                        <td>{{ $member->district_name }}</td>
                                        <td>{{ $member->state_name }}</td>
                                        <td><img class="w-50" src="{{ asset($member->b_img) }}" /></td>
                                        <td>{{ $member->b_mobile }}</td>
                                        <td>{{ $member->b_mo_adhr_or_smgr_no }}</td>
                                        <td>{{ $member->status }}</td>
                                        <td>
                                          <div class="d-flex">
                                            <a class="text-decoration-none text-dark" href="survey_datalist/{{ $member->beneficiary_id }}">
                                                <button type="button" class="btn reduced-font ms-1 btn-warning btn-sm text-dark">View<i class="fa-solid reduced-font text-dark ms-1 fa-eye text-primary"></i></button>
                                            </a>

                                            <a class="text-decoration-none text-white" href="edit_beneficiary/{{ $member->beneficiary_id }}">
                                                <button type="button" class="btn ms-1 reduced-font btn-info btn-sm text-white">Edit<i class="fa-solid fa-pen-to-square reduced-font ms-1"></i></i></button>
                                            </a>
                                
                                            <form method="POST" action="/accept_beneficiary/{{ $member->beneficiary_id }}">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn ms-1 reduced-font btn-sm text-white" style="background-color: #008000 !important;">
                                                    Accept Data<i class="fa-solid ms-1 reduced-font fa-check text-white"></i>
                                                </button>
                                            </form>

                                            <form method="POST" action="/reject_beneficiary/{{ $member->beneficiary_id }}">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn ms-1 reduced-font btn-danger btn-sm text-dark">
                                                    Reject Data<i class="fa-solid ms-1 reduced-font fa-xmark text-dark"></i>
                                                </button>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
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
    @include('admin.partials.footer')
</body>
</html>
