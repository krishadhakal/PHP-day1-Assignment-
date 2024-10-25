<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="sub-container">
            <?php
                $name = htmlspecialchars($_GET['name']);
                $age = htmlspecialchars($_GET['age']);
                $color = htmlspecialchars($_GET['color']);

                echo "<h1>Hello, " . $name . "!</h1>";
                if ($age >= 18) {
                    echo "You are an adult.<br>";
                } else {
                    echo "You are a minor.<br>";
                }
                switch ($color) {
                    case "red":
                        echo "Red is a bold choice!<br>";
                        break;
                    case "blue":
                        echo "Blue is calming.<br>";
                        break;
                    case "green":
                        echo "Green represents nature.<br>";
                        break;
                    default:
                        echo "That's an interesting choice!<br>";
                }
                echo "<p>Here is a list of the years you have lived:</p>";
                echo "<ul style=\"list-style-type: disc\">";
                for ($i = 1; $i <= $age; $i++) {
                    echo "<li>" . $i . "</li>";
                }
                echo "</ul>";
            ?>
            <a href="form.php"><button>Go Back</button></a>
        </div>
    </div>
</body>
</html>
