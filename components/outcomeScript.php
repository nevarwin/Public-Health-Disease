<script>
    function toggleDateDied() {
        const outcome = document.getElementById('outcome').value;
        const dateDied = document.getElementById('dateDied');

        if (outcome === 'dead') {
            dateDied.disabled = false;
        } else {
            dateDied.disabled = true;
        }
    }

    // Call the function on page load to set the initial state
    // toggleDateDied();
    window.onload = toggleDateDied;
</script>