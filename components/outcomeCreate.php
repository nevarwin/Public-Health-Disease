<div class="row justify-content-center mb-3">
    <label for="outcome" class="col-sm-3 col-form-label">Outcome</label>
    <div class="col-sm-6">
        <select class="custom-select" id="outcome" name="outcome" onchange="toggleDateDied()">
            <?php
            $outcomeOptions = array('alive', 'dead', 'other'); // Add more options if needed
            foreach ($outcomeOptions as $option) {
                $selected = ($outcome === $option) ? 'selected' : '';
                echo '<option value="' . $option . '" ' . $selected . '>' . ucfirst($option) . '</option>';
            }
            ?>
        </select>
    </div>
</div>
<div class="row justify-content-center mb-3">
    <label for="dateDied" class="col-sm-3 col-form-label">Date Died</label>
    <div class="col-sm-6">
        <input type="datetime-local" class="form-control" id="dateDied" name="dateDied">
    </div>
</div>
<div class="row justify-content-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

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