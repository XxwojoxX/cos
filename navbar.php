<?php
session_start();

// Dodaj nagłówek CORS
header("Access-Control-Allow-Origin: *");
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/style.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <a href="index.php" class="logo">ZOO</span></a>

    <ul class="navbar">
        <li><a href="index.php">Strona główna</a></li>
        <li><a href="animals.php">Zwierzęta</a></li>
        <li><a href="events.php">Wydarzenia</a></li>
        <li><a href="about_us.php">O nas</a></li>
        <li><a href="shop.php">Sklep</a></li>
        <li><a href="contact_form.php">kontakt</a></li>
    </ul>

    <div class="log-reg">
        <?php
        // Sprawdź, czy użytkownik jest zalogowany
        if (isset($_SESSION['userId'])) {
            // Fragment koszyka widoczny tylko dla zalogowanego użytkownika
            echo '<div class="cart" id="cart">';
            echo '<a href="cart.php" class="cart-link">';
            echo '<img src="img/koszyk11.png" alt="koszyk">';
            echo '<span id="cart-products" class="cart-products" data-cart-content="">';

            // Pobierz liczbę przedmiotów w koszyku
            $cartItemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

            // Wyświetl liczbę przedmiotów
            echo $cartItemCount;

            echo '</span>';
            echo '</a>';
            echo '</div>';
        }
        ?>
        <?php
        if (isset($_SESSION['userName'])) {
            $userName = $_SESSION['userName'];
            echo
            '<a href="PHP/logout.php">
                                <button class="log-reg-btn">Wyloguj</button>
                            </a>';

            echo '<span class="username">' . $userName . '</span>';
            echo '<div class="background">
                <button class="menu__icon">
                  <span></span>
                  <span></span>
                  <span></span>
                </button>
                <ul class="menu__options">
                  <li><a href="account.php">Konto</a></li>
                </ul>
              </div>';
        } else {
            echo
            '<a href="login_form.php">
                                <button class="log-reg-btn">Zaloguj</button>
                            </a>';

            echo
            '<a href="register_form.php">
                                <button class="log-reg-btn">Zarejestruj</button>
                            </a>';
        }
        ?>
    </div>
</body>

</html>