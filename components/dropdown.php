<?php
function generateDropdown($name) {
    $options = array(
        'No' => 'No',
        'Yes' => 'Yes',
        'Unknown' => 'Unknown',
        'Other' => 'Other'
    );

    return '
            <div class="justify-content-center">
                <label class="col-sm-6 col-lg-12 col-xl-12 col-form-label">' . ucwords($name) . '</label>
                    <select class="col-sm-8 col-lg-12 col-md-12 col-xl-12 custom-select" name="' . $name . '">
                        ' . implode('', array_map(function ($value, $label) {
        return '<option value="' . $value . '">' . $label . '</option>';
    }, array_keys($options), $options)) . '
                    </select>
            </div>
    ';
}
