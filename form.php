<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $nameErr = $ageErr = $colorErr = "";
        $name = $age = $color = "";
        $formValid = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Name cannot be empty.";
                $formValid = false;
            } else {
                $name = test_input($_POST["name"]);
            }

            if (empty($_POST["age"])) {
                $ageErr = "Age should be a number.";
                $formValid = false;
            } else {
                $age = test_input($_POST["age"]);   
            }

            if (empty($_POST["color"])) {
                $colorErr = "PLease select a color.";
                $formValid = false;
            } else {
                $color = test_input($_POST["color"]);
            }

            if ($formValid) {
                header("Location: submit.php?name=$name&age=$age&color=$color");
                exit;
            }
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <div class="container">
        <div class="form-container">
            <h1>Personal Details</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <span class="error">*<?php echo $nameErr;?></span>
                    <input type="text" id="name" name="name" value="<?php echo $name; ?>">
                </div>

                <div class="form-group">
                    <label for="age">Age:</label>
                    <span class="error">*<?php echo $ageErr;?></span>
                    <input type="number" id="age" name="age" value="<?php echo $age; ?>">
                </div>

                <div class="form-group">
                    <label for="color">Favorite Color:</label>
                    <span class="error">*<?php echo $colorErr;?></span>
                    <select id="color" name="color">
                        <option value="">Select a color</option>
                        <option value="red">Red</option>
                        <option value="blue">Blue</option>
                        <option value="green">Green</option>
                        <option value="yellow">Yellow</option>
                        <option value="pink">Pink</option>
                        <option value="purple">Purple</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
