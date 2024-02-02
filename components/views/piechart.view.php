<?php
if (!empty($errorMessage)) {
    echo $alert;
}
?>
<div class="row">
    <form id="form2" class="col-12 p-0">
        <div class="row col-xl-12 col-lg-12 col-sm-12">
            <div class="dropdown col">
                <label for="disease">Select Disease:</label>
                <select class="custom-select" name="pieDisease">
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
                <label>Select Year:</label>
                <select class="custom-select" name="pieYear">
                    <?php echo $options; ?>
                </select>
            </div>
            <div class="dropdown col">
                <label>Select Municipality:</label>
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
</div>
<div class="card shadow">
    <!-- Card Header -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Disease cases per municipality pie chart</h6>
        <button id="downloadButton" class="btn btn-primary">Download Chart</button>
    </div>
    <div class="card-body">
        <canvas id="pieChart"></canvas>
    </div>
</div>

<script>
    var pieJsonData;
    let pieDelayed;

    if (pieJsonData === undefined || pieJsonData === null || pieJsonData === "") {
        cases = 0;
        municipalities = [];
        pieSelectedYear = "Sample Year";
    }

    var diseases = {
        1: "Amoebiasis",
        2: "Adverse Event Following Immunization",
        3: "Acute encephalitis syndrome",
        4: "Alpha-Fetoprotein",
        5: "Acute Meningitis",
        6: "Chikungunya Virus",
        7: "Diphtheria",
        8: "Hand, Foot, and Mouth Disease",
        9: "Number Needed to Treat",
        10: "Neonatal Tetanus",
        11: "Perthes Disease",
        12: "Influenza",
        13: "Dengue",
        14: "Rabies",
        15: "Cholera",
        16: "Hepatitis",
        17: "Measles",
        18: "Meningitis",
        19: "Meningo",
        20: "Typhoid",
        21: "Leptospirosis",
    };

    var diseaseName;
    var selectedDisease;
    if (
        selectedDisease === undefined ||
        selectedDisease === null ||
        selectedDisease === ""
    ) {
        console.log("first if");
        diseaseName = "Sample Disease";
    } else if (isNaN(selectedDisease)) {
        console.log("2nd if");
        diseaseName = selectedDisease;
    } else {
        diseaseName = diseases[selectedDisease];
    }

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
    console.log(pieDiseaseMode);

    if (pieDiseaseMode == 1) {
        var translatedMunicipality = municipalities.map(function(number) {
            return municipality[number];
        });
    } else if (pieDiseaseMode == false) {
        var translatedMunicipality = municipalities.map(function(number) {
            return diseases[number];
        });
    } else if (pieDiseaseMode == undefined) {
        var translatedMunicipality = Object.values(municipalities);
    }

    const pie = document.getElementById("pieChart");

    const colors = [];
    for (let i = 0; i < 23; i++) {
        const red = Math.floor(Math.random() * 256);
        const green = Math.floor(Math.random() * 256);
        const blue = Math.floor(Math.random() * 256);
        const alpha = (Math.floor(Math.random() * 9) + 1) / 10;
        const color = `rgba(${red}, ${green}, ${blue}, ${alpha})`;
        colors.push(color);
    }

    // variables for the values of object translatedMunicipality and cases
    let munValue = [];
    let casesValue = [];
    let casesTotal = 0;

    // pushing the values of translatedMunicipality and cases to the their respective variables
    for (const key in translatedMunicipality) {
        const value = translatedMunicipality[key];
        munValue.push(value);
    }
    for (const key in cases) {
        const value = cases[key];
        const intValue = parseInt(cases[key]);
        casesTotal += intValue;
        casesValue.push(value);
    }

    // variable for the concat values of mun and cases
    let munCasesValues = [];

    // pushing of values
    if (munValue.length === casesValue.length) {
        for (let i = 0; i < munValue.length; i++) {
            munCasesValues.push(`${munValue[i]} : ${casesValue[i]}`);
        }
    } else {
        console.log("Arrays must have the same length.");
    }

    // for the pie chart
    const pieData = {
        labels: translatedMunicipality.length === 0 ? [
            "Alfonso",
            "Amadeo",
            "Bacoor",
            "Carmona",
            "Cavite City",
            "Dasmariñas",
            "Gen. Emilio Aguinaldo",
            "Gen. Mariano Alvarez",
            "General Trias",
            "Imus",
            "Indang",
            "Kawit",
            "Magallanes",
            "Maragondon",
            "Mendez",
            "Naic",
            "Noveleta",
            "Rosario",
            "Silang",
            "Tagaytay City",
            "Tanza",
            "Ternate",
            "Trece Martires City",
        ] : munCasesValues,
        datasets: [{
            label: "Cases",
            data: cases === 0 ? [
                66, 50, 1362, 33, 9, 133, 16, 109, 207, 2809, 6, 108, 2, 72, 81,
                14, 10, 17, 190, 301, 59, 215, 16,
            ] : cases,
            backgroundColor: colors,
            borderColor: colors,
            borderWidth: 1,
        }, ],
    };

    let title = 'Sample Disease';
    if (pieDiseaseMode == 1) {
        title = 'Municipality';
    } else if (pieDiseaseMode == false) {
        title = 'Disease';
    } else if (pieDiseaseMode == undefined) {
        if (cases === 0) {
            title = "Municipality";
        } else {
            title = 'Barangay';
        }
    }
    // for the pie chart configuration
    const pieConfig = {
        type: "pie",
        data: pieData,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: `${diseaseName} Cases Per ${title} Year ${pieSelectedYear}: Total of ${casesTotal}`,
                    font: {
                        size: 18,
                    },
                },
                legend: {
                    position: "left",
                },
            },
            animation: {
                onComplete: () => {
                    pieDelayed = true;
                },
                delay: (context) => {
                    let delay = 0;
                    if (
                        context.type === "data" &&
                        context.mode === "default" &&
                        !pieDelayed
                    ) {
                        delay = context.dataIndex * 150 + context.datasetIndex * 500;
                    }
                    return delay;
                },
            },
            responsive: true,
        },
    };

    // displaying the pie chart using the data and config
    const pieChart = new Chart(pie, pieConfig);

    // download button to download the generated pie chart
    const downloadButton = document.getElementById("downloadButton");
    downloadButton.addEventListener("click", () => {
        const imageUrl = pieChart.toBase64Image();
        const link = document.createElement("a");
        link.href = imageUrl;
        link.download = `${diseaseName} PieChart.png`;
        link.click();
    });
</script>