<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style\Inscription.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <title>Inscription</title>
</head>
<body>
    <div class="header">
        <div class="LOGO">
            <img src="images shoes\logo.png" alt="" width="130px" height="90px">
        </div>
        <div class="nav_list">
            <nav>
                <ul>
                    <li><a href="Home.html">Home</a></li>
                    <li><a href="registration.php">Registration</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="Contact_us.html">Contact Us</a></li>
                    <li><a href="about_us.html">About Us</a></li>
                </ul>
            </nav>
        </div>
    </div> 
    
    <div class="banner">
        <h1>Welcome to our registration page</h1><br>
    </div><br><br><br>
        
    <div class="card">
        <form action="registration.php" method="POST">
            <div>
                <h2>Please fill out the form below</h2><br>
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" placeholder="Enter your Last Name"><br><br>

                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" placeholder="Enter your First Name"><br><br>
            </div>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email"><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password"><br><br>

            <label for="gender">Gender:</label><br>
            <input type="radio" id="male" name="gender" value="Homme">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="Femme">
            <label for="female">Female</label><br>
            <input type="radio" id="other" name="gender" value="Autre">
            <label for="other">Other</label><br><br>

            <label for="street">Street:</label><br>
            <input type="text" id="street" name="street" placeholder="Enter your street"><br><br>

            <label for="number">Street Number:</label><br>
            <input type="text" id="number" name="number" placeholder="Enter your number"><br><br>

            <label for="city">City:</label><br>
            <input type="text" id="city" name="city" placeholder="Enter your city"><br><br>

            <label for="postal_code">Postal Code:</label><br>
            <input type="text" id="postal_code" name="postal_code" placeholder="Enter your Postal Code"><br><br>

            <input type="checkbox" id="conditions" name="accepted_conditions" value="1">
            <label for="conditions">I have read and accept the general terms of use</label><br><br>

            <input type="submit" value="SEND">
        </form>
    </div><br><br><br>

    </form>
</div><br><br><br>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");

        form.addEventListener("submit", function (event) {
            let errors = [];
            
            // Vérification des champs texte
            const lastname = document.getElementById("lastname").value.trim();
            const firstname = document.getElementById("firstname").value.trim();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value.trim();
            const street = document.getElementById("street").value.trim();
            const number = document.getElementById("number").value.trim();
            const city = document.getElementById("city").value.trim();
            const postalCode = document.getElementById("postal_code").value.trim();

            if (lastname.length < 3) {
                errors.push("Last name must be at least 3 characters long.");
            }

            if (firstname.length < 3) {
                errors.push("First name must be at least 3 characters long.");
            }

            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                errors.push("Invalid email address.");
            }

            if (password.length < 6 || !/[A-Z]/.test(password) || !/[0-9]/.test(password)) {
                errors.push("Password must be at least 6 characters long and include at least one uppercase letter and one number.");
            }

            if (street.length === 0) {
                errors.push("Street cannot be empty.");
            }

            if (!/^\d+$/.test(number)) {
                errors.push("Street number must contain only digits.");
            }

            if (city.length === 0) {
                errors.push("City cannot be empty.");
            }

            if (!/^\d+$/.test(postalCode)) {
                errors.push("Postal code must contain only digits.");
            }

            // Vérification du genre
            const gender = document.querySelector('input[name="gender"]:checked');
            if (!gender) {
                errors.push("Please select a gender.");
            }

            // Vérification des conditions générales
            const conditions = document.getElementById("conditions").checked;
            if (!conditions) {
                errors.push("You must accept the terms and conditions.");
            }

            // Affichage des erreurs
            if (errors.length > 0) {
                event.preventDefault(); // Empêche l'envoi du formulaire
                alert(errors.join("\n"));
            }
        });
    });
</script>


    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $host = 'mysql:host=localhost;dbname=myshop;';
        $login = 'root';
        $password = '';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ];

        try {
            $pdo = new PDO($host, $login, $password, $options);

            if (
                !empty($_POST['lastname']) && 
                !empty($_POST['firstname']) && 
                !empty($_POST['email']) &&
                !empty($_POST['password']) && 
                !empty($_POST['gender']) &&
                !empty($_POST['street']) && 
                !empty($_POST['number']) &&
                !empty($_POST['city']) && 
                !empty($_POST['postal_code'])
            ) {
                $firstname = trim($_POST['firstname']);
                $lastname = trim($_POST['lastname']);
                $email = $_POST['email'];
                $password = $_POST['password'];
                $gender = $_POST['gender'];
                $street = $_POST['street'];
                $number = $_POST['number'];
                $city = $_POST['city'];
                $postal_code = $_POST['postal_code'];

                $errors = [];

                if (strlen($firstname) < 3) {
                    $errors[] = "Firstname must be at least 3 characters long.";
                }

                if (strlen($lastname) < 3) {
                    $errors[] = "Lastname must be at least 3 characters long.";
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Invalid email address.";
                }

                if (
                    strlen($password) < 6 ||
                    !preg_match('/[A-Z]/', $password) ||
                    !preg_match('/[0-9]/', $password)
                ) {
                    $errors[] = "Password must be at least 6 characters long and include at least one uppercase letter and one number.";
                }

                if (!preg_match('/^\d+$/', $postal_code)) {
                    $errors[] = "Postal code must contain only digits.";
                }

                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        echo '<p style="color:red;">' . $error . '</p>';
                    }
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    $stmt = $pdo->prepare("INSERT INTO users (lastname, firstname, email, password, gender, street, number, city, postal_code) 
                                        VALUES (:lastname, :firstname, :email, :password, :gender, :street, :number, :city, :postal_code)");

                    $stmt->execute([
                        ':lastname' => $lastname,
                        ':firstname' => $firstname,
                        ':email' => $email,
                        ':password' => $hashedPassword,
                        ':gender' => $gender,
                        ':street' => $street,
                        ':number' => $number,
                        ':city' => $city,
                        ':postal_code' => $postal_code
                    ]);

                    echo '<p style="color:green;">User successfully registered!</p>';
                }
            }
        } catch (PDOException $e) {
            echo '<p style="color:red;">Database error: ' . $e->getMessage() . '</p>';
        }
    }

    $users = []; // Initialisation vide 
?>

        <h2>Registered Users</h2>

        <?php foreach ($users as $user): ?>
            <div class="card">
                <h3><?= htmlspecialchars($user['firstname'] . ' ' . $user['lastname']) ?></h3>
                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p> <br>
                <p><strong>Gender:</strong> <?= htmlspecialchars($user['gender']) ?></p> <br>
                <p><strong>Address:</strong> <?= htmlspecialchars($user['street']) ?>, 
                <?= htmlspecialchars($user['number']) ?>,
                <?= htmlspecialchars($user['city']) ?> (<?= htmlspecialchars($user['postal_code']) ?>)</p>
            </div>
        <?php endforeach; ?>
    

    <footer>
        <div class="rounded-social-buttons">
            <p>Follow us</p>
            <a class="social-button facebook" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a class="social-button twitter" href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
            <a class="social-button tiktok" href="https://www.tiktok.com/" target="_blank"><i class="fab fa-tiktok"></i></a>
            <a class="social-button youtube" href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
            <a class="social-button instagram" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

   
</body>
</html>