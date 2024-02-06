<?php
// Replace with your database connection code
include('connection.php');
include('alertMessage.php');

$patientCount = 0;
$jsonData = 0;
$disease = '';

echo '<script>var pieDiseaseMode;</script>';
echo '<script>var lineSelectedDisease; </script>';

if (isset($_GET['disease']) && $_GET['pieMun'] == '' && $_GET['disease'] != '') {
    $selectedDisease = $_GET['disease'];
    // echo "Selected Disease: $selectedDisease<br>";

    $pieDiseaseMode = true;

    $countQuery = "SELECT COUNT(*) AS patientCount, YEAR(creationDate) AS creationYear 
            FROM patients 
            WHERE disease = $selectedDisease 
            GROUP BY YEAR(creationDate)";

    $countResult = mysqli_query($con, $countQuery);

    $data = array();
    while ($row = $countResult->fetch_assoc()) {
        $year = $row['creationYear'];
        $count = $row['patientCount'];
        $data[$year] = $count;
    }

    // Echo the counts per year
    // foreach ($data as $year => $count) {
    //     echo "Year: $year, Count: $count<br>";
    // }

    // Encode the PHP array as JSON
    $jsonData = json_encode($data);

    // Echo the JSON data inside a JavaScript block
    echo '<script>var selectedDisease = ' . $selectedDisease . ';</script>';
    echo '<script>var jsonData = ' . $jsonData . ';</script>';
    echo '<script>pieDiseaseMode =' . $pieDiseaseMode . ';</script>';
}
// For the municipality dropdown logic
else if (isset($_GET['pieMun'])) {
    $pieSelectedMun = $_GET['pieMun'];
    $lineSelectedDisease = $_GET['disease'];

    $pieDiseaseMode = false;

    $countQuery = " SELECT
        COUNT(*) AS patientCount,
        p.municipality,
        d.disease,
        YEAR(p.creationDate) AS creationYear
    FROM
        patients p
    JOIN municipality m ON
        p.municipality = m.munId
    JOIN diseases d ON
        p.disease = d.diseaseId
    WHERE
        m.municipality = '$pieSelectedMun' AND
        p.disease = $lineSelectedDisease
    GROUP BY
        p.disease, p.municipality, YEAR(p.creationDate);
    ";

    $countResult = mysqli_query($con, $countQuery);

    $data = array();
    // Check if the query has returned any rows
    if (mysqli_num_rows($countResult) == 0) {
        $errorMessage = "No data found for the selected disease and municipality.";
        $type = 'warning';
        $strongContent = 'Oh no!';
        $alert = generateAlert($type, $strongContent, $errorMessage);
        $disease = $lineSelectedDisease;
    } else {
        while ($row = $countResult->fetch_assoc()) {
            $year = $row['creationYear'];
            $municipality = $row['municipality'];
            $disease = $row['disease'];
            $count = $row['patientCount'];
            $data[$year] = $count;
        }
    }


    // Echo the counts per year
    // foreach ($data as $year => $count) {
    //     echo "Disease: $disease, Year: $year, Count: $count, Municipality: $municipality<br>";
    // }

    // Encode the PHP array as JSON
    $jsonData = json_encode($data);

    $encodedSelectedMun = json_encode($pieSelectedMun);
    $encodedSelectedDisease = json_encode($disease);

    // Echo the JSON data inside a JavaScript block
    echo '<script>selectedDisease = ' . $encodedSelectedMun . ';</script>';
    echo '<script>lineSelectedDisease = ' . $lineSelectedDisease . ';</script>';
    echo '<script>var jsonData = ' . $jsonData . ';</script>';

    echo '<script>pieDiseaseMode =' . var_export($pieDiseaseMode, true) . ';</script>';
}

// Select query for all available creation date in patients table
$pieYearQuery = "SELECT DISTINCT YEAR(creationDate) AS year FROM patients ORDER BY year ASC";
$pieYearResult = mysqli_query($con, $pieYearQuery);

// creating html option tag with value base on the result
$options = '';
while ($row = mysqli_fetch_assoc($pieYearResult)) {
    $year = $row['year'];
    $pieSelectedYear = $_GET['pieYear'] ?? '';
    $selected = ($year == $pieSelectedYear) ? 'selected' : '';
    $options .= "<option value=\"$year\" $selected>$year</option>";
}

// for the municipality dropdown
$municipality = ["Alfonso", "Amadeo", "Bacoor", "Carmona", "Cavite City", "Dasmariñas", "Gen. Emilio Aguinaldo", "Gen. Mariano Alvarez", "General Trias", "Imus", "Indang", "Kawit", "Magallanes", "Maragondon", "Mendez", "Naic", "Noveleta", "Rosario", "Silang", "Tagaytay City", "Tanza", "Ternate", "Trece Martires City"];

$municipalityOption = '';
$selectedMunicipality = $_GET['pieMun'] ?? '';

foreach ($municipality as $municipal) {
    $selected = ($municipal == $selectedMunicipality) ? 'selected' : '';
    $municipalityOption .= "<option value=\"$municipal\" $selected>$municipal</option>";
}
?>
<?php
if (!empty($errorMessage)) {
    echo $alert;
}
?>
<div class="row">
    <form id="form1" class="col-12 p-0">
        <div class="row col-xl-12 col-lg-12 col-sm-12">
            <div class="dropdown col">
                <label for="disease">Select Disease:</label>
                <select id='selectDisease' class="custom-select" name="disease">
                    <?php
                    $sql = "SELECT diseaseId, disease FROM diseases";
                    $result = $con->query($sql);

                    $pieDropdown = [];

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $pieDropdown[$row['diseaseId']] = $row['disease'];
                        }
                    }

                    $pieSelectedDisease = $_GET['pieDisease'] ?? '';

                    foreach ($pieDropdown as $key => $value) {
                        $selected = ($key == $pieSelectedDisease) ? 'selected' : '';
                        echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="dropdown col">
                <label for="year">Select Municipality:</label>
                <select class="custom-select" name="pieMun">
                    <option value="">all</option>
                    <?php echo $municipalityOption; ?>
                </select>
            </div>
            <div class="col">
                <div class="row justify-content-end">
                    <button type="submit" class="btn btn-primary">Check</button>
                </div>
            </div>
        </div>
    </form>
    <div class="dropdown col my-2">
        <label for="year">Select Start Year:</label>
        <select class="custom-select" name="pieYear" id="startYear" onchange="filterData()">
            <?php echo $options; ?>
        </select>
    </div>
    <div class="dropdown col my-2">
        <label for="year">Select End Year:</label>
        <select class="custom-select" name="pieYear" id="endYear" onchange="filterData()">
            <?php echo $options; ?>
        </select>
    </div>
</div>
<div class="card shadow">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Yearly disease count line chart</h6>
        <button id="downloadButton" class="btn btn-primary">Download Chart</button>

    </div>
    <div class="card-body">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script>
    var diseases = {
        1: 'Amoebiasis',
        2: 'Adverse Event Following Immunization',
        3: 'Acute encephalitis syndrome',
        4: 'Alpha-Fetoprotein',
        5: 'Acute Meningitis',
        6: 'Chikungunya Virus',
        7: 'Diphtheria',
        8: 'Hand, Foot, and Mouth Disease',
        9: 'Number Needed to Treat',
        10: 'Neonatal Tetanus',
        11: 'Perthes Disease',
        12: 'Influenza',
        13: 'Dengue',
        14: 'Rabies',
        15: 'Cholera',
        16: 'Hepatitis',
        17: 'Measles',
        18: 'Meningitis',
        19: 'Meningo',
        20: 'Typhoid',
        21: 'Leptospirosis'
    };

    var diseaseName;
    var selectedDisease;
    if (selectedDisease === undefined || selectedDisease === null || selectedDisease === '') {
        diseaseName = 'Sample Disease';
    } else if (isNaN(selectedDisease)) {
        diseaseName = selectedDisease;
    } else {
        diseaseName = diseases[selectedDisease];
    }

    var years = [];
    var counts = [];
    var jsonData;

    if (jsonData === undefined || jsonData === null || jsonData === '') {
        years = 0;
        counts = 0;
        diseaseName = 'Sample Disease';
    }
    for (var year in jsonData) {
        if (jsonData.hasOwnProperty(year)) {
            var count = parseInt(jsonData[year]);
            console.log("Year: " + year + ", Count: " + count);
            years.push(year);
            counts.push(count);
        }
    }

    const ctx = document.getElementById("myChart").getContext('2d');
    let delayed;

    // line chart data
    const data = {
        labels: years === 0 ? ["2018", "2019", "2020", "2021", "2022"] : years,
        datasets: [{
            fill: true,
            label: `Number of ${diseaseName} Cases`,
            data: counts === 0 ? [2358, 3877, 2850, 3504, 5885] : counts,
            borderWidth: 1,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)'
            ],
        }, ],
    };

    var translatedDisease = diseases[lineSelectedDisease];
    let title = pieDiseaseMode == false ? `of ${translatedDisease}` : '';

    // line chart config
    const config = {
        type: 'line',
        data: data,
        options: {
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'Counts'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Years'
                    }
                }
            },
            responsive: true,
            animation: {
                onComplete: () => {
                    delayed = true;
                },
                delay: (context) => {
                    let delay = 0;
                    if (context.type === 'data' && context.mode === 'default' && !delayed) {
                        delay = context.dataIndex * 300 + context.datasetIndex * 100;
                    }
                    return delay;
                },
            },
            radius: 5,
            hitRadius: 20,
            hoverRadius: 12,
            plugins: {
                title: {
                    display: true,
                    text: `${diseaseName} Cases ${title} Per Year`,
                    font: {
                        size: 18
                    }
                }
            },
        },
    };

    const myChart = new Chart(ctx, config);

    function filterData() {
        const yearsPoints = [...years];
        const startYear = document.getElementById("startYear");
        const endYear = document.getElementById("endYear");
        //get the index number in array
        const startIndex = yearsPoints.indexOf(startYear.value);
        const endIndex = yearsPoints.indexOf(endYear.value);
        // slice the array only showing the selected section
        const filteredYears = yearsPoints.slice(startIndex, endIndex + 1);
        // replace the labels in the Chart
        myChart.config.data.labels = filteredYears;
        // datapoints
        const countsPoints = [...counts];
        const filteredCounts = countsPoints.slice(startIndex, endIndex + 1);
        // replace the data in the Chart
        myChart.config.data.datasets[0].data = filteredCounts;
        myChart.update();
    }

    const downloadButton = document.getElementById("downloadButton");
    downloadButton.addEventListener("click", () => {
        const imageUrl = myChart.toBase64Image();
        const link = document.createElement("a");
        link.href = imageUrl;
        link.download = `${diseaseName} LineChart.png`;
        link.click();
    });
</script>