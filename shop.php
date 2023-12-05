<?php
session_start();

if (!isset($_SESSION['userName'])) {
    header("Location: login_form.php");
}
?>

<html>

<head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/media.css">

    <script src="scripts/cookie.js"></script>
    <script src="scripts/cookie2.js"></script>
    <script src="scripts/price_range.js"></script>
    <script src="scripts/redirect.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <title>ZOO</title>
</head>

<body>
    <div class="home">
        <header>
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
            <button data-quantity="0" class="btn-cart">
          <svg class="icon-cart" viewBox="0 0 24.38 30.52" height="30.52" width="24.38" xmlns="http://www.w3.org/2000/svg">
            <title>icon-cart</title>
            <path transform="translate(-3.62 -0.85)" d="M28,27.3,26.24,7.51a.75.75,0,0,0-.76-.69h-3.7a6,6,0,0,0-12,0H6.13a.76.76,0,0,0-.76.69L3.62,27.3v.07a4.29,4.29,0,0,0,4.52,4H23.48a4.29,4.29,0,0,0,4.52-4ZM15.81,2.37a4.47,4.47,0,0,1,4.46,4.45H11.35a4.47,4.47,0,0,1,4.46-4.45Zm7.67,27.48H8.13a2.79,2.79,0,0,1-3-2.45L6.83,8.34h3V11a.76.76,0,0,0,1.52,0V8.34h8.92V11a.76.76,0,0,0,1.52,0V8.34h3L26.48,27.4a2.79,2.79,0,0,1-3,2.44Zm0,0"></path>
          </svg>
          <span class="quantity"></span>
        </button>
                <?php
                if (isset($_SESSION['userName'])) {
                    $userName = $_SESSION['userName'];
                    echo
                        '<a href="PHP/logout.php">
                                <button class="log-reg-btn">Logout</button>
                            </a>';

                    echo '<span class="username">' . $userName . '</span>';
                    echo '<div class="background">
                <button class="menu__icon">
                  <span></span>
                  <span></span>
                  <span></span>
                </button>
                <ul class="menu__options">
                  <li><a href="orders.php">Zamówienia</a></li>
                  <li><a href="account.php">Konto</a></li>
                </ul>
              </div>';
                } else {
                    echo
                        '<a href="login_form.php">
                                <button class="log-reg-btn">Login</button>
                            </a>';

                    echo
                        '<a href="register_form.php">
                                <button class="log-reg-btn">Register</button>
                            </a>';
                }
                ?>
            </div>
        </header>

        <div class="filter-section">
            <label for="category">Kategoria:</label>
            <select id="category">
                <option value="all">Wszystkie kategorie</option>
                <option value="tshirts">Koszulki</option>
                <option value="hoodies">Bluzy</option>
                <option value="mascots">Maskotki</option>
                <option value="tickets">Bilety</option>
            </select>

            <label for="price-range">Zakres cenowy:</label>
<div class="price-slider-container">
    <span class="min-price" id="min-price">10</span>
    <input type="range" id="price-range" min="0" max="500" step="1" oninput="updatePrice()">
    <span class="max-price" id="max-price">1500</span>
    <div class="selected-price-container">
        <span id="selected-price">Wybrana cena: 10</span>
    </div>
</div>

            <label for="sort" id="sort-label">Sortuj:</label>
            <select id="sort">
                <option value="default" selected>Domyślnie</option>
                <option value="price-asc">Cena rosnąco</option>
                <option value="price-desc">Cena malejąco</option>
                <option value="alphabetical-asc">Alfabetycznie A-Z</option>
                <option value="alphabetical-desc">Alfabetycznie Z-A</option>
            </select>

            <label for="category" style="display: none">filtr4</label for="category">
            <div class="filter-options" style="display: none">
                <button class="filter-btn" type="checkbox">opcja1</button>
                <button class="filter-btn" type="checkbox">opcja2</button>
                <button class="filter-btn" type="checkbox">opcja3</button>
            </div>

            <button class="filter-btn">Zastosuj Filtry</button>
        </div>

        <div class="shop-container">
            <div class="flip-card-section">

                <?php
                include "PHP/get_products.php";

                foreach ($products as $product) {
                    echo '<div class="flip-card">';
                    echo '<div class="flip-card-inner">';
                    echo '<div class="flip-card-front">';
                    echo '<img src="' . $product['image'] . '" style="width: 75%; height: 75%; border-radius: 20px; margin-top: 30px;">';
                    echo '<p id="product-name">' . $product['name'] . '</p>';
                    echo '<p>' . $product['price'] . ' zł</p>';
                    echo '</div>';
                    echo '<div class="flip-card-back">';
                    echo '<img src="' . $product['image'] . '" style="width: 75%; height: 75%; border-radius: 20px; margin-top: 30px;">';
                    echo '<div><button class="product-btn" onclick="redirectToProductPage(\'' . htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') . '\')">Zobacz</button>';
                    echo '<p>' . $product['price'] . ' zł</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <footer>
            <div class="footer-content">
                <h1>Zaobserwuj nas</h1>

                <div class="social-card">
                    <a class="socialContainer containerOne" target="_blank" href="https://www.instagram.com/">
                        <svg viewBox="0 0 16 16" class="socialSvg instagramSvg">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                            </path>
                        </svg>
                    </a>

                    <a class="socialContainer containerTwo" target="_blank" href="https://twitter.com/">
                        <svg viewBox="0 0 16 16" class="socialSvg twitterSvg">
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="footer-content">
        <div class="footer-link"><a href="index.php">Strona główna</a></div>
        <div class="footer-link"><a href="contact_form.php">Kontakt</a></div>
    </div>

    <div class="footer-content">
        <div class="footer-link"><a href="regulations.php">Regulamin</a></div>
        <div class="footer-link"><a href="FAQ.php">FAQ</a></div>
        <div class="footer-link"><a href="about_us.php">O nas</a></div>
    </div>

            <?php
            $showAdminButton = false; // Ustaw zmienną na true, jeśli przycisk ma być widoczny
            
            if (isset($_SESSION['userId']) && $_SESSION['userId'] == 1) {
                $showAdminButton = true; // Jeśli zalogowany użytkownik ma ID=1, ustawiamy na true
            }
            ?>

            <div class="admin" id="admin"
                style="<?php echo $showAdminButton ? 'display: block;' : 'display: none;'; ?>">
                <a href="PHP/admin_check.php">
                    <button class="admin-btn">admin panel</button>
                </a>
            </div>
        </footer>
    </div>
</body>

</html>