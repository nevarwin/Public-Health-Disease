<?php
if (isset($_SESSION['id'])) {
    $deptid = $_SESSION['id'];
    // echo ($deptid);
}
?>

<style>
    label {
        display: flex;
        align-items: center;
    }

    .dataTables_wrapper .dataTables_length select {
        display: inline-block;
        width: 100%;
        height: calc(1.5em + 0.75rem + 2px);
        padding: 0.375rem 1.75rem 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #6e707e;
        vertical-align: middle;
        background: #fff url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%235a5c69' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") right 0.75rem center/8px 10px no-repeat;
        border: 1px solid #d1d3e2;
        border-radius: 0.35rem;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
        color: #212529;
        background-color: #fff;
        border-color: #86b7fe;
        outline: 0;
        box-shadow: 0 0 0 0.01rem rgba(13, 110, 253, 0.25);
    }

    #myTable_paginate {
        display: flex;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        z-index: 3;
        color: #fff !important;
        background: #007bff !important;
        border-color: #007bff !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        z-index: 2;
        color: #0056b3 !important;
        text-decoration: none !important;
        background: #e9ecef !important;
        border-color: #dee2e6 !important;
    }
</style>


<body>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <h2 class="m-0 font-weight-bold text-primary">Update Logs</h2>

            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table cell-border hover" id="tableAdmins" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Patient Id</th>
                            <th>Patient First Name</th>
                            <th>Patient Last Name</th>
                            <th>Updated By</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($user_data['positionId'] == 1) {
                            // read all the data from db table
                            $sql = "SELECT *
                            FROM patients
                            LEFT JOIN clients ON id = nurse_id
                            ORDER BY updated_at DESC
                            ";
                            $result = mysqli_query($con, $sql);
                        }
                        if ($user_data['positionId'] == 2) {
                            // read all the data from db table
                            $sql = "SELECT *
                            FROM patients
                            LEFT JOIN clients ON id = nurse_id
                            WHERE patients.createdby_id = $deptid
                            ORDER BY updated_at DESC
                            ";
                            $result = mysqli_query($con, $sql);
                        }

                        // check if there is data in the table
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $admins) {
                        ?>
                                <tr>
                                    <td><?= $admins['patientId']; ?></td>
                                    <td><?= $admins['firstName']; ?></td>
                                    <td><?= $admins['lastName']; ?></td>
                                    <td><?= $admins['name']; ?></td>
                                    <td><?= $admins['creationDate']; ?></td>
                                    <td><?= $admins['updated_at']; ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>