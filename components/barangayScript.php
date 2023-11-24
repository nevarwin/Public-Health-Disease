<script>
    const postalCodes = {
        1: '4123', // Alfonso
        2: '4119', // Amadeo
        3: '4102', // Bacoor
        4: '4116', // Carmona
        5: '4100', // Cavite City
        6: '4114', // Dasmariñas
        7: '4124', // General Emilio Aguinaldo
        8: '4117', // General Mariano Alvarez
        9: '4107', // General Trias
        10: '4103', // Imus
        11: '4122', // Indang
        12: '4104', // Kawit
        13: '4113', // Magallanes
        14: '4112', // Maragondon
        15: '4121', // Mendez
        16: '4110', // Naic
        17: '4105', // Noveleta
        18: '4106', // Rosario
        19: '4118', // Silang
        20: '4120', // Tagaytay City
        21: '4108', // Tanza
        22: '4111', // Ternate
        23: '4109' // Trece Martires City
    };

    function updateBarangays() {
        const municipalitySelect = document.getElementById('municipality');
        const barangaySelect = document.getElementById('barangay');
        const postalCodeInput = document.getElementById('postalCode');
        const selectedMunicipality = municipalitySelect.value;
        console.log(selectedMunicipality);

        // Clear barangay dropdown
        barangaySelect.innerHTML = '';

        // Clear postal code input
        postalCodeInput.value = '';

        if (selectedMunicipality) {
            // Retrieve postal code for the selected municipality
            const postalCode = postalCodes[selectedMunicipality];

            // Set the postal code value
            postalCodeInput.value = postalCode;
        }

        if (selectedMunicipality) {
            // Fetch barangays for selected country using AJAX
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    const barangays = JSON.parse(this.responseText);

                    // Populate barangay dropdown
                    barangays.forEach(function(barangay) {
                        const option = document.createElement('option');
                        option.text = barangay.barangay;
                        option.name = barangay.id;
                        option.value = barangay.id;
                        barangaySelect.add(option);
                    });
                }
            };
            xhr.open('GET', 'components/get_barangay.php?municipality=' + selectedMunicipality, true);
            xhr.send();
        }
    }

    function updateBarangaysDRU() {
        const municipalitySelect = document.getElementById('municipalityDRU');
        const barangayDRUSelect = document.getElementById('barangayDRU');
        const selectedMunicipality = municipalitySelect.value;

        // Clear barangay dropdown
        barangayDRUSelect.innerHTML = '';

        if (selectedMunicipality) {
            // Fetch barangays for selected country using AJAX
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    const barangays = JSON.parse(this.responseText);

                    // Populate barangay dropdown
                    barangays.forEach(function(barangay) {
                        const option = document.createElement('option');
                        option.text = barangay.barangay;
                        option.name = barangay.id;
                        option.value = barangay.id;
                        barangayDRUSelect.add(option);
                    });
                }
            };
            xhr.open('GET', 'components/get_barangay.php?municipality=' + selectedMunicipality, true);
            xhr.send();
        }
    }
</script>