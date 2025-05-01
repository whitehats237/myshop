<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/Inscription.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <title>inscription page</title>
</head>
<body>
    <div class="header">
        <div class="LOGO"> <img src="https://private-user-images.githubusercontent.com/206078483/439388186-5afc6d7a-5cd9-41a6-9f0e-125ccf4efc34.png?jwt=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3NDYwNDM2NjEsIm5iZiI6MTc0NjA0MzM2MSwicGF0aCI6Ii8yMDYwNzg0ODMvNDM5Mzg4MTg2LTVhZmM2ZDdhLTVjZDktNDFhNi05ZjBlLTEyNWNjZjRlZmMzNC5wbmc_WC1BbXotQWxnb3JpdGhtPUFXUzQtSE1BQy1TSEEyNTYmWC1BbXotQ3JlZGVudGlhbD1BS0lBVkNPRFlMU0E1M1BRSzRaQSUyRjIwMjUwNDMwJTJGdXMtZWFzdC0xJTJGczMlMkZhd3M0X3JlcXVlc3QmWC1BbXotRGF0ZT0yMDI1MDQzMFQyMDAyNDFaJlgtQW16LUV4cGlyZXM9MzAwJlgtQW16LVNpZ25hdHVyZT03YTg2YTg0MGYwNDAyYmIwOGYyNzI0ZDRmZmNhN2VkNzEzNzc1ZTZiMmNlNzIyYzFiNTQyOTQxZTljZGRmNjQyJlgtQW16LVNpZ25lZEhlYWRlcnM9aG9zdCJ9.gPxTvZA85zpYscZD6Kiyix4VhvW89qcr1VDzjVDXhGw"
             alt="" 
             width="150px"
             height="90px">
            </div>
        <div class="nav_list">
            <nav>
            <ul>
                <li><a href="Home.html">Home</a></li><!--je dois changer le html en php-->
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
        <h2>Please fill out the form below </h2><br>
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" placeholder="Enter your Last Name"><br><br>

        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" placeholder="Enter your First Name"><br><br></div>

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

    <main>
    <?php
        $host = 'mysql:host=localhost;dbname=myshop;';
        $login = 'root';
        $password = '';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ];

        $pdo = new PDO($host, $login, $password, $options);
        
        // Affiche les données envoyées par formulaire
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        if (
            !empty($_POST['lastname']) && 
            !empty($_POST['firstname']) && !empty($_POST['email']) &&
            !empty($_POST['password']) && !empty($_POST['gender']) &&
            !empty($_POST['street']) && !empty($_POST['number']) &&
            !empty($_POST['city']) && !empty($_POST['postal_code'])
        ) {
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);
            $email = $_POST['email'];
            $password = $_POST['password']; // à valider avant hash
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

            if (!preg_match('/^\d+$/', $postalcode)) {
                $errors[] = "Postal code must contain only digits.";
            }

            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo '<p style="color:red;">' . $error . '</p>';
                }
            } else {
                // Hash du mot de passe
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Préparation de la requête d'insertion
                $stmt = $pdo->prepare("INSERT INTO users (lastname, firstname, email, password, gender, street, number, city, postalcode) 
                                    VALUES (:lastname, :firstname, :email, :password, :gender, :street, :number, :city, :postalcode)");

                // Exécution avec les vraies valeurs
                $stmt->execute([
                    ':lastname' => $lastname,
                    ':firstname' => $firstname,
                    ':email' => $email,
                    ':password' => $hashedPassword,
                    ':gender' => $gender,
                    ':street' => $street,
                    ':number' => $number,
                    ':city' => $city,
                    ':postalcode' => $postalcode
                ]);

                echo '<p style="color:green;">User successfully registered!</p>';
            }
        }

        // === Récupérer tous les utilisateurs ===
        $resultat = $pdo->query('SELECT * FROM users');
        $users = $resultat->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <h2>Registered Users</h2>
        <?php foreach ($users as $user): ?>
            <div class="card" style="border:1px solid #ccc; padding:15px; margin:10px; border-radius:10px;">
                <h3><?= htmlspecialchars($user['firstname'] . ' ' . $user['lastname']) ?></h3>
                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                <p><strong>Gender:</strong> <?= htmlspecialchars($user['gender']) ?></p>
                <p><strong>Address:</strong> <?= htmlspecialchars($user['street']) ?>, <?= htmlspecialchars($user['number']) ?>, <?= htmlspecialchars($user['city']) ?> (<?= htmlspecialchars($user['postalcode']) ?>)</p>
            </div>
        <?php endforeach; ?>
    </main>

</body>
</html>
