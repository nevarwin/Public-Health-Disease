<?php
include("connection.php");

// PHP code handling the file upload and processing
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $targetDir = "uploads/"; // Directory where files will be uploaded
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo json_encode(['error' => 'File already exists']);
        $uploadOk = 0;
    }

    // Check file size (adjust as needed)
    if ($_FILES["file"]["size"] > 500000) {
        echo json_encode(['error' => 'File is too large']);
        $uploadOk = 0;
    }

    // Allow only CSV files
    if ($fileType !== "csv") {
        echo json_encode(['error' => 'Only CSV files are allowed']);
        $uploadOk = 0;
    }

    // If no errors, try to upload the file and import data to the database
    if ($uploadOk === 1) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            $csvFile = fopen($targetFile, "r");
            while (($data = fgetcsv($csvFile)) !== false) {
                $createdby_id = $data[1];
                $nurse_id = $data[2];
                $latitude = $data[3];
                $longitude = $data[4];
                $creationDate = $data[5];
                $firstName = $data[6];
                $lastName = $data[7];
                $middleName = $data[8];
                $contact = $data[9];
                $munCityOfDRU = $data[10];
                $brgyOfDRU = $data[11];
                $addressOfDRU = $data[12];
                $gender = $data[13];
                $dob = $data[14];
                $age = $data[15];
                $municipality = $data[16];
                $barangay = $data[17];
                $street = $data[18];
                $unitCode = $data[19];
                $subd = $data[20];
                $postalCode = $data[21];
                $disease = $data[22];

                // Insert data into the 'patients' table
                $sql = "INSERT INTO patients (createdby_id, nurse_id, latitude, longitude, creationDate, firstName, lastName, middleName, contact, munCityOfDRU, brgyOfDRU, addressOfDRU, gender, dob, age, municipality, barangay, street, unitCode, subd, postalCode, disease, updated_at) 
                        VALUES ('$createdby_id', '$nurse_id', '$latitude', '$longitude', '$creationDate', '$firstName', '$lastName', '$middleName', '$contact', '$munCityOfDRU', '$brgyOfDRU', '$addressOfDRU', '$gender', '$dob', '$age', '$municipality', '$barangay', '$street', '$unitCode', '$subd', '$postalCode', '$disease', NOW())";

                if ($con->query($sql) === TRUE) {
                    // Data inserted successfully
                    echo json_encode(['success' => 'Data imported successfully']);
                } else {
                    // Error during data insertion
                    echo json_encode(['error' => 'Error importing data: ' . $con->error]);
                }
            }
            fclose($csvFile);
        } else {
            echo json_encode(['error' => 'Error uploading file']);
        }
    }
    exit;
}
$con->close();
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

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <h2 class="m-0 font-weight-bold text-primary">Patient's Data</h2>
            <!-- <input class="col-sm-3 form-control" type="text" id="searchInput" placeholder="Search"> -->
            <div class="ml-auto">
                <a href="patientPage-create.php" class="btn btn-primary mb-2" role="button">Add new patient</a>
                <form method="post" name="upload_excel" enctype="multipart/form-data">
                    <div class="input-group mb-2">
                        <div class="custom-file">
                            <input type="file" id="fileInput" class="custom-file-input" name="file">
                            <label class="custom-file-label" for="fileInput">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="importButton">Import CSV</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table cell-border hover display" id="tablePatients" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Patient Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Disease</th>
                        <th>Dob</th>
                        <th>Age</th>
                        <th>Barangay</th>
                        <th>Municipality</th>
                        <th>Year</th>
                        <th class="no-export">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("connection.php");
                    // read all the data from db table
                    if ($user_data['positionId'] == 1 || $user_data['positionId'] == 2) {
                        $deptid = $user_data['id'];
                    } else {
                        $deptid = $user_data['createdby_id'];
                    }
                    if ($user_data['positionId'] == 1) {
                        $sql = "SELECT *
                        FROM patients
                        LEFT JOIN barangay ON patients.barangay = barangay.id
                        LEFT JOIN municipality ON patients.municipality = municipality.munId
                        LEFT JOIN diseases ON patients.disease = diseases.diseaseId
                        LEFT JOIN genders ON patients.gender = genders.genderId
                        ORDER BY patientId DESC
                        ";
                    } else {
                        $sql = "SELECT *
                        FROM patients
                        LEFT JOIN barangay ON patients.barangay = barangay.id
                        LEFT JOIN municipality ON patients.municipality = municipality.munId
                        LEFT JOIN diseases ON patients.disease = diseases.diseaseId
                        LEFT JOIN genders ON patients.gender = genders.genderId
                        WHERE createdby_id = $deptid
                        ORDER BY patientId DESC
                        ";
                    }
                    $result = mysqli_query($con, $sql);
                    // check if there is data in the table
                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $patients) {
                            $creationDate = $patients['creationDate'];
                            $year = date('Y', strtotime($creationDate));
                    ?>
                            <tr>
                                <td><?= $patients['patientId'] ?></td>
                                <td><?= $patients['firstName'] ?></td>
                                <td><?= $patients['lastName'] ?></td>
                                <td><?= $patients['gender'] ?></td>
                                <td><?= $patients['disease'] ?></td>
                                <td><?= $patients['dob'] ?></td>
                                <td><?= $patients['age'] ?></td>
                                <td><?= $patients['barangay'] ?></td>
                                <td><?= $patients['municipality'] ?></td>
                                <td><?= $year ?></td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm btn-block my-1" href="patientPage-view.php?patientId=<?= $patients['patientId']; ?>">View</a>
                                    <a class="btn btn-primary btn-sm btn-block my-1" href="patientPage-update.php?patientId=<?= $patients['patientId']; ?>">Update</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Patient Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Disease</th>
                        <th>Dob</th>
                        <th>Age</th>
                        <th>Barangay</th>
                        <th>Municipality</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>