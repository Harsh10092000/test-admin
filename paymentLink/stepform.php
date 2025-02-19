<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Step Form with Error Messages</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .step {
            display: none;
        }
        .step.active {
            display: block;
        }
        .error {
            color: red;
            font-size: 0.9em;
            display: none; /* Hide error messages by default */
        }
    </style>
</head>
<body>
    <form id="multiStepForm">
        <!-- Step 1 -->
        <div class="step active" id="step1">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <span class="error" id="nameError"></span> <!-- Error message for name -->
            <button type="button" class="next-btn">Next</button>
        </div>

        <!-- Step 2 -->
        <div class="step" id="step2">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <span class="error" id="emailError"></span> <!-- Error message for email -->
            <button type="button" class="prev-btn">Previous</button>
            <button type="button" class="next-btn">Next</button>
        </div>

        <!-- Step 3 -->
        <div class="step" id="step3">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <span class="error" id="passwordError"></span> <!-- Error message for password -->
            <button type="button" class="prev-btn">Previous</button>
            <button type="submit" class="submit-btn">Submit</button>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            let currentStep = 1;

            // Show the current step
            function showStep(step) {
                $(".step").removeClass("active");
                $(`#step${step}`).addClass("active");
            }

            // Clear all error messages
            function clearErrors() {
                $(".error").hide().text("");
            }

            // Validate inputs in the current step
            function validateStep(step) {
                let isValid = true;
                clearErrors(); // Clear previous errors

                if (step === 1) {
                    const name = $("#name").val().trim();
                    if (name === "") {
                        $("#nameError").text("Name is required.").show();
                        isValid = false;
                    }
                } else if (step === 2) {
                    const email = $("#email").val().trim();
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (email === "") {
                        $("#emailError").text("Email is required.").show();
                        isValid = false;
                    } else if (!emailPattern.test(email)) {
                        $("#emailError").text("Please enter a valid email address.").show();
                        isValid = false;
                    }
                } else if (step === 3) {
                    const password = $("#password").val().trim();
                    if (password === "") {
                        $("#passwordError").text("Password is required.").show();
                        isValid = false;
                    } else if (password.length < 8) {
                        $("#passwordError").text("Password must be at least 8 characters long.").show();
                        isValid = false;
                    }
                }

                return isValid;
            }

            // Next button click
            $(".next-btn").click(function () {
                if (validateStep(currentStep)) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            // Previous button click
            $(".prev-btn").click(function () {
                currentStep--;
                showStep(currentStep);
            });

            // Form submission (only on the last step)
            $("#multiStepForm").on("submit", function (e) {
                e.preventDefault(); // Prevent default form submission

                if (validateStep(currentStep)) {
                    // Submit the form (you can use AJAX or allow default submission)
                    alert("Form submitted successfully!");
                    console.log("Form data:", $(this).serialize());
                    // Uncomment the line below to submit the form
                    // this.submit();
                }
            });
        });
    </script>
</body>
</html>