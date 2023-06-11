<?php
function generateDropdownUpdate($fieldName, $selectedValue) {
    $options = [
        'No',
        'Yes',
        'Unknown',
        'Other'
    ];

    $dropdown = '
    <div class="row justify-content-center mb-3">
        <label class="col-sm-5 col-form-label">' . ucfirst($fieldName) . '</label>
        <div class="col-sm-6">
            <select class="custom-select" name="' . $fieldName . '">';

    foreach ($options as $option) {
        $selected = ($option === $selectedValue) ? 'selected' : '';
        $dropdown .= '
            <option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
    }

    $dropdown .= '
        </select>
    </div>
</div>';

    return $dropdown;
}
