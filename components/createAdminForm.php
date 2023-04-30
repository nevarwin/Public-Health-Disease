<?php
include('code.php');
include('barangayScript.php');
?>

<form action="code.php" method="post">
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Name</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='name' value='<?php echo $name; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Email</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='email' value='<?php echo $email; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Password</label>
        <div class="col-sm-6">
            <input type="password" class='form-control' name='password' value='<?php echo $password; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Contact Number</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='contact' value='<?php echo $contact; ?>'>
        </div>
    </div>
    <!-- Municipality Dropdown -->
    <div class="row mb-3">
        <label class='col-sm-3 col-form-label' for="municipality">Municipality</label>
        <div class="col-sm-6">
            <select class="form-select" id="municipality" onchange="updateBarangays()" name="municipality">
                <option value="">Select municipality</option>
                <?php
                // Connect to database and fetch municipalities
                include('connection.php');

                $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                $result = mysqli_query($con, 'SELECT * FROM municipality');

                // Display each municipalities in a dropdown option
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['munId'] . '">' . $row['municipality'] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <!-- Barangay Dropdown -->
    <div class="row mb-3">
        <label class='col-sm-3 col-form-label' for="barangay">Barangay</label>
        <div class="col-sm-6">
            <select class="form-select" id="barangay" name="barangay">
                <option>Select Barangay</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Address</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='address' value='<?php echo $address; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class='btn btn-primary' name="createAdmin">Submit</button>
        </div>
        <div class="col-sm-3 d-grid">
            <a href="http://localhost/admin2gh/createAdmin.php" class="btn btn-outline-primary" role="button">Cancel</a>
        </div>
    </div>
</form>