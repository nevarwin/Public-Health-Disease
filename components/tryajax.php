<!DOCTYPE html>
<html>

<head>
    <title>Dropdown Form Extension</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dropdown').change(function() {
                var selectedValue = $(this).val();
                if (selectedValue === 'rabies') {
                    $.ajax({
                        url: 'rabies-form.html',
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
</head>

<body>
    <form id="main-form" action="#" method="post">
        <label for="dropdown">Select an option:</label>
        <select id="dropdown" name="dropdown">
            <option value="default">Default Option</option>
            <option value="rabies">Extended Option</option>
        </select>
        <br>
        <div id="form-extension"></div>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>