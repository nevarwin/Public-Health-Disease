<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dropdown').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'extended') {
                $.ajax({
                    url: 'extended-form.html',
                    dataType: 'html',
                    success: function(response) {
                        $('#form-extension').html(response);
                    }
                });
            } else {
                $('#form-extension').empty();
            }
        });
    });
</script>