<?php
function generateDropdownUpdate($fieldName, $selectedValue) {
    $options = [
        'No',
        'Yes',
        'Unknown',
        'Other'
    ];

    $dropdown = '
    <div class="justify-content-center">
        <label class="col-sm-6 col-lg-12 col-xl-12 col-form-label">' . ucfirst($fieldName) . '</label>
        
            <select class="col-sm-8 col-lg-12 col-md-12 col-xl-12 col-sm-5 custom-select" name="' . $fieldName . '">';

    foreach ($options as $option) {
        $selected = ($option === $selectedValue) ? 'selected' : '';
        $dropdown .= '
            <option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
    }

    $dropdown .= '
        </select>
    
</div>';

    return $dropdown;
}
