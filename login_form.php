<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (isset($_SESSION['userName'])) {
    header("Location: index.php");
}

//usuwanie bledow rejestracji
if (isset($_SESSION['e_nick']))
    unset($_SESSION['e_nick']);
if (isset($_SESSION['e_email']))
    unset($_SESSION['e_email']);
if (isset($_SESSION['e_password']))
    unset($_SESSION['e_password']);
if (isset($_SESSION['e_regulations']))
    unset($_SESSION['e_regulations']);
if (isset($_SESSION['e_bot']))
    unset($_SESSION['e_bot']);
?>

<html lang="en">

<head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="styles/media.css">
    <link rel="stylesheet" href="styles/media_form.css">

    <script src="scripts/autohide.js"></script>
    <script src="scripts/cookie.js"></script>
    <script src="scripts/cookie2.js"></script>
    <script src="scripts/Fetch_api.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <title>ZOO</title>
</head>

<body>
    <div class="home">

    <header></header>

        <form class="form" id="login-form" action="PHP/login.php" method="POST" name="login_form" autocomplete="off">
            <?php
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo '<div class="login-success" id="message">
                                        <h2>udalo sie zarejestrowac</h2>
                                    </div>';
            }

            if (isset($_GET['success']) && $_GET['success'] == 2) {
                echo '<div class="remind-success" id="message">
                                        <h2>wiadomosc zostala wyslana</h2>
                                    </div>';
            }

            if (isset($_GET['success']) && $_GET['success'] == 3) {
                echo '<div class="remind-success" id="message">
                                        <h2>haslo zostalo zresetowane</h2>
                                    </div>';
            }
            ?>

            <p class="title">Login </p>
            <p class="message">Log in and get full access to our app. </p>
            <?php
            if (isset($_SESSION['fail'])) {
                echo $_SESSION['fail'];
                unset($_SESSION['fail']);
            }
            ?>
            <label>
                <input required="" placeholder="" type="text" class="input" name="nick">
                <span>username</span>
            </label>

            <label>
                <input required="" placeholder="" type="password" class="input" name="password">
                <span>password</span>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name="email">
                <span>Email</span>
            </label>

            <button class="submit">Submit</button>
            <p class="signin">Forgot your password ? <a href="remind_pass_form.php">Remind me</a> </p>
        </form>

        <footer></footer>
    </div>
</body>

</html>