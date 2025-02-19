<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Step Form with More Fields</title>
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
        <!-- Step 1: Personal Information -->
        <div class="step active" id="step1">
            <h2>Step 1: Personal Information</h2>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>
            <span class="error" id="firstNameError"></span><br>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>
            <span class="error" id="lastNameError"></span><br>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
            <span class="error" id="phoneError"></span><br>

            <button type="button" class="next-btn">Next</button>
        </div>

        <!-- Step 2: Address Information -->
        <div class="step" id="step2">
            <h2>Step 2: Address Information</h2>
            <label for="street">Street Address:</label>
            <input type="text" id="street" name="street" required>
            <span class="error" id="streetError"></span><br>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>
            <span class="error" id="cityError"></span><br>

            <label for="zip">Zip Code:</label>
            <input type="text" id="zip" name="zip" required>
            <span class="error" id="zipError"></span><br>

            <button type="button" class="prev-btn">Previous</button>
            <button type="button" class="next-btn">Next</button>
        </div>

        <!-- Step 3: Account Information -->
        <div class="step" id="step3">
            <h2>Step 3: Account Information</h2>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <span class="error" id="emailError"></span><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <span class="error" id="passwordError"></span><br>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
            <span class="error" id="confirmPasswordError"></span><br>

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
                    // Step 1: Personal Information
                    const firstName = $("#firstName").val().trim();
                    const lastName = $("#lastName").val().trim();
                    const phone = $("#phone").val().trim();

                    if (firstName === "") {
                        $("#firstNameError").text("First Name is required.").show();
                        isValid = false;
                    }
                    if (lastName === "") {
                        $("#lastNameError").text("Last Name is required.").show();
                        isValid = false;
                    }
                    if (phone === "") {
                        $("#phoneError").text("Phone Number is required.").show();
                        isValid = false;
                    } else if (!/^\d{10}$/.test(phone)) {
                        $("#phoneError").text("Phone Number must be 10 digits.").show();
                        isValid = false;
                    }
                } else if (step === 2) {
                    // Step 2: Address Information
                    const street = $("#street").val().trim();
                    const city = $("#city").val().trim();
                    const zip = $("#zip").val().trim();

                    if (street === "") {
                        $("#streetError").text("Street Address is required.").show();
                        isValid = false;
                    }
                    if (city === "") {
                        $("#cityError").text("City is required.").show();
                        isValid = false;
                    }
                    if (zip === "") {
                        $("#zipError").text("Zip Code is required.").show();
                        isValid = false;
                    } else if (!/^\d{5}$/.test(zip)) {
                        $("#zipError").text("Zip Code must be 5 digits.").show();
                        isValid = false;
                    }
                } else if (step === 3) {
                    // Step 3: Account Information
                    const email = $("#email").val().trim();
                    const password = $("#password").val().trim();
                    const confirmPassword = $("#confirmPassword").val().trim();

                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (email === "") {
                        $("#emailError").text("Email is required.").show();
                        isValid = false;
                    } else if (!emailPattern.test(email)) {
                        $("#emailError").text("Please enter a valid email address.").show();
                        isValid = false;
                    }
                    if (password === "") {
                        $("#passwordError").text("Password is required.").show();
                        isValid = false;
                    } else if (password.length < 8) {
                        $("#passwordError").text("Password must be at least 8 characters long.").show();
                        isValid = false;
                    }
                    if (confirmPassword === "") {
                        $("#confirmPasswordError").text("Confirm Password is required.").show();
                        isValid = false;
                    } else if (password !== confirmPassword) {
                        $("#confirmPasswordError").text("Passwords do not match.").show();
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