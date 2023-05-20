<?php
function generateDropdown($name) {
    $options = array(
        'no' => 'No',
        'yes' => 'Yes',
        'unknown' => 'Unknown',
        'other' => 'Other'
    );

    return '
        <div class="row justify-content-center mb-3">
            <label class="col-sm-3 col-form-label">' . ucwords($name) . '</label>
            <div class="col-sm-6">
                <select class="custom-select" name="' . $name . '">
                    ' . implode('', array_map(function ($value, $label) {
        return '<option value="' . $value . '">' . $label . '</option>';
    }, array_keys($options), $options)) . '
                </select>
            </div>
        </div>
    ';
}
