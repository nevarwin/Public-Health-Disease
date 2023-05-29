<?php
// Replace with your database connection code
include('connection.php');

$piePatientCount = 0;
$pieJsonData = 0;
$totalCount = 0;

if (isset($_GET['pieDisease'])) {
    $pieSelectedDisease = $_GET['pieDisease'];
    $pieSelectedYear = $_GET['pieYear'];
    // echo "Selected Disease: $pieSelectedDisease<br>";
    // echo "Selected Year: $pieSelectedYear<br>";

    $pieCountQuery = "SELECT municipality, 
            COUNT(*) AS piePatientCount 
            FROM patients 
            WHERE disease = $pieSelectedDisease 
            AND YEAR(creationDate) = $pieSelectedYear
            GROUP BY municipality";

    $countResult = mysqli_query($con, $pieCountQuery);

    $data = array();
    while ($row = $countResult->fetch_assoc()) {
        $municipality = $row['municipality'];
        $count = $row['piePatientCount'];
        $data[$municipality] = $count;
        $totalCount += $count; // Increment the total count
    }
    // Encode the PHP array as JSON
    $pieJsonData = json_encode($data);

    // Echo the JSON data inside a JavaScript block
    echo '<script>var pieSelectedDisease = ' . $pieSelectedDisease . ';</script>';
    echo '<script>var pieSelectedYear = ' . $pieSelectedYear . ';</script>';
    echo '<script>var pieJsonData = ' . $pieJsonData . ';</script>';

    // Echo the municipality and cases as JavaScript variables
    echo '<script>';
    echo 'var municipalities = ' . json_encode(array_keys($data)) . ';';
    echo 'var cases = ' . json_encode(array_values($data)) . ';';
    echo '</script>';

    // // Display the municipalities, their counts, and the total count
    // echo '<ul>';
    // foreach ($data as $municipality => $count) {
    //     echo '<li>' . $municipality . ': ' . $count . '</li>';
    // }
    // echo '</ul>';
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
?>

<div class="row">
    <form id="form2">
        <div class="btn-group col-xl-12 col-lg-12 col-sm-12 my-2">
            <div class="dropdown mx-2">
                <select class="custom-select" name="pieDisease">
                    <?php
                    $pieDropdown = [
                        1 => 'ABD',
                        2 => 'AEFI',
                        3 => 'AES',
                        4 => 'AFP',
                        5 => 'AMES',
                        6 => 'ChikV',
                        7 => 'DIPH',
                        8 => 'HFMD',
                        9 => 'NNT',
                        10 => 'NT',
                        11 => 'PERT',
                        12 => 'Influenza',
                        13 => 'Dengue',
                        14 => 'Rabies',
                        15 => 'Cholera',
                        16 => 'Hepatitis',
                        17 => 'Measles',
                        18 => 'Meningitis',
                        19 => 'Meningo',
                        20 => 'Typhoid',
                        21 => 'Leptospirosis',
                    ];
                    $pieSelectedDisease = $_GET['pieDisease'] ?? '';

                    foreach ($pieDropdown as $key => $value) {
                        $selected = ($key == $pieSelectedDisease) ? 'selected' : '';
                        echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                    }
                    ?>
                </select>

            </div>
            <div class="dropdown mx-2">
                <select class="custom-select" name="pieYear">
                    <?php echo $options; ?>
                </select>
            </div>
            <button type="submit" class='btn btn-primary'>Submit</button>
        </div>
    </form>
</div>
<div class="card shadow">
    <!-- Card Header -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Pie Chart</h6>
    </div>
    <div class="card-body">
        <canvas id="pieChart"></canvas>
        <button id="downloadButton">Download Chart</button>
    </div>
</div>

<script>
    var pieJsonData;

    if (pieJsonData === undefined || pieJsonData === null || pieJsonData === '') {
        cases = 0;
        municipalities = [];
        pieSelectedYear = 'Sample Year';
    }

    var diseaseName;
    var selectedDisease;
    if (selectedDisease === undefined || selectedDisease === null || selectedDisease === '' ||
        selectedDisease === 0) {
        diseaseName = 'Sample Disease';
    } else {
        diseaseName = diseases[selectedDisease];
    }

    var sampleMun = ["Alfonso", "Amadeo", "Bacoor", "Carmona", "Cavite City", "Dasmariñas", "Gen. Emilio Aguinaldo", "Gen. Mariano Alvarez", "General Trias", "Imus", "Indang", "Kawit", "Magallanes", "Maragondon", "Mendez", "Naic", "Noveleta", "Rosario", "Silang", "Tagaytay City", "Tanza", "Ternate", "Trece Martires City"];

    var diseases = {
        1: 'Amebiasis',
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

    var municipality = {
        1: "Alfonso",
        2: "Amadeo",
        3: "Bacoor",
        4: "Carmona",
        5: "Cavite City",
        6: "Dasmariñas",
        7: "Gen. Emilio Aguinaldo",
        8: "Gen. Mariano Alvarez",
        9: "General Trias",
        10: "Imus",
        11: "Indang",
        12: "Kawit",
        13: "Magallanes",
        14: "Maragondon",
        15: "Mendez",
        16: "Naic",
        17: "Noveleta",
        18: "Rosario",
        19: "Silang",
        20: "Tagaytay City",
        21: "Tanza",
        22: "Ternate",
        23: "Trece Martires City",
    };

    // console.log(pieJsonData);
    // console.log(pieSelectedDisease);
    // console.log(pieSelectedYear);
    // console.log(municipalities);
    // console.log(cases);
    // let diseaseName = diseases[pieSelectedDisease];

    // this translates the municipalities from sql to the corresponding number
    // in the municipality associated array
    var translatedMunicipality = municipalities.map(function(number) {
        return municipality[number];
    });

    console.log(translatedMunicipality);


    const pie = document.getElementById("pieChart");
    let pieDelayed;

    const colors = [];
    for (let i = 0; i < 23; i++) {
        const red = Math.floor(Math.random() * 256);
        const green = Math.floor(Math.random() * 256);
        const blue = Math.floor(Math.random() * 256);
        const alpha = (Math.floor(Math.random() * 9) + 1) / 10; // Random alpha value between 0.1 and 0.9
        const color = `rgba(${red}, ${green}, ${blue}, ${alpha})`;
        colors.push(color);
    }

    const pieData = {
        labels: translatedMunicipality.length === 0 ? ["Alfonso", "Amadeo", "Bacoor", "Carmona", "Cavite City", "Dasmariñas", "Gen. Emilio Aguinaldo", "Gen. Mariano Alvarez", "General Trias", "Imus", "Indang", "Kawit", "Magallanes", "Maragondon", "Mendez", "Naic", "Noveleta", "Rosario", "Silang", "Tagaytay City", "Tanza", "Ternate", "Trece Martires City"] : translatedMunicipality,
        // label: `Number of ${diseaseName} Cases`,
        datasets: [{
            label: "Cases",
            data: cases === 0 ? [66, 50, 1362, 33, 9, 133, 16, 109, 207, 2809, 6, 108, 2, 72, 81, 14, 10, 17, 190, 301, 59, 215, 16] : cases,
            backgroundColor: colors,
            borderColor: colors,
            borderWidth: 1,
        }, ],
    }

    const pieConfig = {
        type: 'pie',
        data: pieData,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: `${diseaseName} Cases Per Municipality Year ${pieSelectedYear}`,
                    font: {
                        size: 18
                    }
                },
                legend: {
                    position: 'left',
                }
            },
            animation: {
                onComplete: () => {
                    pieDelayed = true;
                },
                delay: (context) => {
                    let delay = 0;
                    if (context.type === 'data' && context.mode === 'default' && !pieDelayed) {
                        delay = context.dataIndex * 150 + context.datasetIndex * 500;
                    }
                    return delay;
                },
            },
            responsive: true,
        },
    };


    const pieChart = new Chart(pie, pieConfig);
    const downloadButton = document.getElementById("downloadButton");
    downloadButton.addEventListener("click", () => {
        const imageUrl = pieChart.toBase64Image();
        const link = document.createElement("a");
        link.href = imageUrl;
        link.download = `${diseaseName} PieChart.png`;
        link.click();
    });
</script>