<div class="row">
    <form id="form1" class="col-12 p-0">
        <div class="row col-xl-12 col-lg-12 col-sm-12">
            <div class="dropdown col">
                <label for="disease">Select Disease:</label>
                <select id='selectDisease' class="custom-select" name="disease">
                    <?php
                    $diseases = [
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
                    $selectedDisease = $_GET['disease'] ?? '';

                    foreach ($diseases as $key => $value) {
                        $selected = ($key == $selectedDisease) ? 'selected' : '';
                        echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <div class="row justify-content-end">
                    <button type="submit" class="btn btn-primary">Check</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="card shadow">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Line Chart</h6>
        <button id="downloadButton" class="btn btn-primary">Download Chart</button>

    </div>
    <div class="card-body">
        <canvas id="myChart"></canvas>
    </div>
</div>


<?php
// Replace with your database connection code
include('connection.php');

$patientCount = 0;
$jsonData = 0;

if (isset($_GET['disease'])) {
    $selectedDisease = $_GET['disease'];
    // echo "Selected Disease: $selectedDisease<br>";

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
}
?>

<script>
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

    var diseaseName;
    var selectedDisease;
    if (selectedDisease === undefined || selectedDisease === null || selectedDisease === '' ||
        selectedDisease === 0) {
        diseaseName = 'Sample Disease';
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
    console.log(typeof counts);
    console.log(years);

    const ctx = document.getElementById("myChart").getContext('2d');
    let delayed;

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

    const config = {
        type: "line",
        data: data,
        options: {
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
                    text: `${diseaseName} Cases Per Year`,
                    font: {
                        size: 18
                    }
                }
            },
        },
    };

    const myChart = new Chart(ctx, config);

    const downloadButton = document.getElementById("downloadButton");
    downloadButton.addEventListener("click", () => {
        const imageUrl = myChart.toBase64Image();
        const link = document.createElement("a");
        link.href = imageUrl;
        link.download = `${diseaseName} LineChart.png`;
        link.click();
    });
</script>