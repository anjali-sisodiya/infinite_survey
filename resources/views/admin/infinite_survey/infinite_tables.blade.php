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

    <div class="container mt-5">
        <h3 class="mb-4">Infinite Survey Tables</h3>
        <table class="table table-bordered text-center reduced-font">
            <tbody>
                <tr>
                    <td><a href="/show_beneficiary_data" class="btn btn-info">Beneficiary Data</a></td>
                    <td><a href="/show_baseline_data" class="btn btn-info ms-2">Baseline Information</a></td>
                    <td><a href="/show_ujwala_data" class="btn btn-info me-5">Ujwala Scheme Details</a></td>
                </tr>

                <tr>
                    <td><h6 class="ms-4">Beneficiary Table Records: {{ $beneficiaryCount }}</h6></td>
                    <td><h6 class="ms-4">Baseline Table Records: {{ $baselineCount }}</h6></td>
                    <td><h6 class="me-5">Ujwala Table Records: {{ $ujwalaCount }}</h6></td>
                </tr>

                 <tr>
                    <td>
                        <a href="/beneficiary_pending" class="text-decoration-none">
                            <button type="button" class="btn btn-warning text-dark ms-1 btn-sm">Pending Data <i class="fa-solid fa-spinner"></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="/baseline_pending" class="text-decoration-none">
                            <button type="button" class="btn btn-warning text-dark ms-1 btn-sm">Pending Data <i class="fa-solid fa-spinner"></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="/ujwala_pending" class="text-decoration-none">
                            <button type="button" class="btn btn-warning text-dark me-5 btn-sm">Pending Data <i class="fa-solid fa-spinner"></i></button>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td>     
                        <a href="/beneficiary_accept" class="text-decoration-none">
                            <button type="button" class="btn btn-success text-dark btn-sm">Accept Data <i class="fa-solid ms-1 reduced-font fa-check"></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="/baseline_accept" class="text-decoration-none">
                            <button type="button" class="btn btn-success text-dark btn-sm">Accept Data <i class="fa-solid ms-1 reduced-font fa-check"></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="/ujwala_accept" class="text-decoration-none">
                            <button type="button" class="btn btn-success text-dark btn-sm me-5">Accept Data <i class="fa-solid ms-1 reduced-font fa-check"></i></button>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td>
                        <a href="/beneficiary_reject" class="text-decoration-none">
                            <button type="button" class="btn btn-danger text-dark btn-sm">Rejected Data <i class="fa-solid ms-1 reduced-font fa-xmark"></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="/baseline_reject" class="text-decoration-none">
                            <button type="button" class="btn btn-danger text-dark btn-sm">Rejected Data <i class="fa-solid ms-1 reduced-font fa-xmark"></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="/ujwala_reject" class="text-decoration-none">
                            <button type="button" class="btn btn-danger text-dark btn-sm me-5">Rejected Data <i class="fa-solid ms-1 reduced-font fa-xmark"></i></button>
                        </a>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>

    @include('admin.partials.footer')
</body>
</html>
