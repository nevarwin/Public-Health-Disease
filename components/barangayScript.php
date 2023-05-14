<script>
    function updateBarangays() {
        const municipalitySelect = document.getElementById('municipality');
        const barangaySelect = document.getElementById('barangay');
        const selectedMunicipality = municipalitySelect.value;

        // Clear barangay dropdown
        barangaySelect.innerHTML = '';

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
            xhr.open('GET', 'http://localhost/admin2gh/components/get_barangay.php?municipality=' + selectedMunicipality, true);
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
            xhr.open('GET', 'http://localhost/admin2gh/components/get_barangay.php?municipality=' + selectedMunicipality, true);
            xhr.send();
        }
    }
</script>