<?php
function generateAlert($type, $strongContent, $message) {
    $alert = '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
        <strong>' . $strongContent . '</strong> ' . $message . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';

    return $alert;
}
