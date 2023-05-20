<?php
function generateDropdownUpdate($fieldName, $selectedValue = '') {
    $options = [
        'No',
        'Yes',
        'Unknown',
        'Other'
    ];

    $dropdown = <<<HTML
    <div class="row justify-content-center mb-3">
        <label class="col-sm-3 col-form-label">$fieldName</label>
        <div class="col-sm-6">
            <select class="custom-select" name="$fieldName">
HTML;

    foreach ($options as $option) {
        $selected = ($option === $selectedValue) ? 'selected' : '';
        $dropdown .= <<<HTML
            <option value="$option" $selected>$option</option>
HTML;
    }

    $dropdown .= <<<HTML
        </select>
    </div>
</div>
HTML;

    return $dropdown;
}
