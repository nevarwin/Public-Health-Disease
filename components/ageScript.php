<script>
    window.updateVariable = function(event) {
        var dob = document.getElementById("dob").value;
        var today = new Date();
        var birthDate = new Date(dob);
        var age;

        // Calculate the difference in years, months, and days
        var yearsDiff = today.getFullYear() - birthDate.getFullYear();
        var monthsDiff = today.getMonth() - birthDate.getMonth();
        var daysDiff = today.getDate() - birthDate.getDate();

        // Check if the birth date has not been reached this month
        if (daysDiff < 0) {
            monthsDiff--;
            var daysInLastMonth = new Date(
                today.getFullYear(),
                today.getMonth(),
                0
            ).getDate();
            daysDiff = daysInLastMonth - birthDate.getDate() + today.getDate();
        }

        // Check if the age is below 1 month
        if (yearsDiff === 0 && monthsDiff === 0) {
            // Calculate the number of days
            if (daysDiff === 0) {
                age = "Just born";
            } else {
                age = daysDiff + " days old";
            }
        } else {
            // Calculate the total number of months
            var totalMonths = yearsDiff * 12 + monthsDiff;

            if (totalMonths < 12) {
                // Calculate the number of days and months
                var remainingDays = daysDiff;
                var remainingMonths = totalMonths;

                if (remainingMonths === 0 && remainingDays === 0) {
                    age = "Less than a month";
                } else if (remainingMonths === 0) {
                    age = remainingDays + " days old";
                } else if (remainingDays === 0) {
                    age = remainingMonths + " months old ";
                } else {
                    age =
                        remainingMonths + " months and " + remainingDays + " days old";
                }
            } else {
                // Calculate the number of years, months, and days
                var remainingYears = Math.floor(totalMonths / 12);
                var remainingMonths = totalMonths % 12;
                var remainingDays = daysDiff;

                if (remainingMonths === 0 && remainingDays === 0) {
                    age = remainingYears + " years old";
                } else if (remainingMonths === 0) {
                    age =
                        remainingYears + " years and " + remainingDays + " days old";
                } else if (remainingDays === 0) {
                    age =
                        remainingYears +
                        " years and " +
                        remainingMonths +
                        " months old";
                } else {
                    age =
                        remainingYears +
                        " years, " +
                        remainingMonths +
                        " months, and " +
                        remainingDays +
                        " days old";
                }
            }
        }

        console.log("Age:", age);

        // Get the value of the input element
        var input = event.target;
        var inputValue = input.value;

        // Assign the value to the JavaScript variable
        var myVariable = inputValue;

        // Update the disabled input field with the new value
        document.getElementById("age").value = age;
    };
</script>