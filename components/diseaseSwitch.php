<form action="" method="POST">
    <label for="select">Select an option:</label>
    <select id="select" name="select">
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
        <option value="option4">Option 4</option>
    </select>
    <br>

    <?php
    if (isset($_POST['select'])) {
        $selected_option = $_POST['select'];
        switch ($selected_option) {
            case 'option1':
                // Display form for option 1
                echo '<label for="input1">Input 1:</label>';
                echo '<input type="text" id="input1" name="input1"><br>';
                break;
            case 'option2':
                // Display form for option 2
                echo '<label for="input2">Input 2:</label>';
                echo '<input type="text" id="input2" name="input2"><br>';
                break;
            case 'option3':
                // Display form for option 3
                echo '<label for="input3">Input 3:</label>';
                echo '<input type="text" id="input3" name="input3"><br>';
                break;
            case 'option4':
                // Display form for option 4
                echo '<label for="input4">Input 4:</label>';
                echo '<input type="text" id="input4" name="input4"><br>';
                break;
            default:
                // Display default message if option is not recognized
                echo 'Please select an option.';
                break;
        }
    }
    ?>

    <input type="submit" value="Submit">
</form>