<body>
    <div class="container mt-4">
        <h1 class="text-center">List of Diseases</h1>

        <!-- Add Disease Section -->
        <div class="mb-4">
            <h2>Add New Disease</h2>
            <form class="form-inline" method="post" action="">
                <div class="form-group">
                    <input type="text" class="form-control mr-2" name="newDiseaseName" placeholder="New Disease Name">
                    <button type="submit" class="btn btn-primary" name="add_disease">Add Disease</button>
                </div>
            </form>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Disease ID</th>
                    <th>Disease Name</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('connection.php');

                // Check if a form was submitted for editing
                if (isset($_POST['edit_disease'])) {
                    $diseaseId = $_POST['diseaseId'];
                    $newDiseaseName = $_POST['newDiseaseName'];

                    // Update the disease name in the database
                    $updateSql = "UPDATE diseases SET disease = '$newDiseaseName' WHERE diseaseId = $diseaseId";
                    if ($con->query($updateSql) === TRUE) {
                        echo "Disease updated successfully.";
                    } else {
                        echo "Error updating disease: " . $con->error;
                    }
                }

                // Check if a form was submitted for adding a new disease
                if (isset($_POST['add_disease'])) {
                    $newDiseaseName = $_POST['newDiseaseName'];

                    // Insert the new disease into the database
                    $insertSql = "INSERT INTO diseases (disease) VALUES ('$newDiseaseName')";
                    if ($con->query($insertSql) === TRUE) {
                        echo "Disease added successfully.";
                    } else {
                        echo "Error adding disease: " . $con->error;
                    }
                }

                // SQL query to fetch diseases
                $sql = "SELECT * FROM diseases";

                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["diseaseId"] . "</td>";
                        echo "<td>" . $row["disease"] . "</td>";
                        echo "<td>
                            <form class='form-inline' method='post' action=''>
                                <div class='form group'>
                                    <input class='form-control' type='hidden' name='diseaseId' value='" . $row["diseaseId"] . "'>
                                    <input class='form-control' type='text' name='newDiseaseName' placeholder='New Disease Name'>
                                    <input type='submit' class='btn btn-primary' name='edit_disease' value='Edit'>
                                </div>
                            </form>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No diseases found in the database.";
                }
                ?>
            </tbody>
        </table>
    </div>