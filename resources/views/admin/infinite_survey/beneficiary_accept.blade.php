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
            <h6>Beneficiary Accept Data</h6>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form action="" class="col-6 mt-3 ms-2">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control" placeholder="Search...">
                            <button class="btn btn-primary btn-sm ms-2" style="position: relative; right: 81px;">Search</button>
                        </div>
                    </form>
                    <form method="get" action="/show_beneficiary_data" enctype="multipart/form-data" class="mt-5">
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
                                            </div>
                                        </td>
                                    </tr>
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
    @include('admin.partials.footer')
</body>
</html>
