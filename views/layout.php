<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

    if(!isset($start)){
        $start = false;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real State</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $start ? 'start' : ''; ?>">
        <div class="container header-content">
            <div class="bar">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Real State Logo">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Menu Icon">
                </div>
                <div class="right">
                    <img src="/build/img/dark-mode.svg" alt="Dark Mode Img" class="dark-mode-button">
                    <nav class="navigation">
                        <a href="/aboutus">About Us</a>
                        <a href="/properties">Announcements</a>
                        <a href="/blog">Blog</a>
                        <a href="/contact">Contact</a>
                        <?php if($auth){ ?>
                            <a href="/logout">Log Out</a>
                        <?php } else { ?>
                            <a href="/login">Log In</a>
                        <?php } ?>
                    </nav>
                </div>
            </div>
            <?php if($start) { ?>
                <h1>Sale of Exclusive Luxury Houses and Apartments</h1>
            <?php } ?> 
        </div>
    </header>

    <?php echo $content; ?>

    <footer class="footer section">
        <div class="container footer-content">
            <nav class="navigation">
                <a href="/aboutus">About Us</a>
                <a href="/properties">Announcements</a>
                <a href="/blog">Blog</a>
                <a href="/contact">Contact</a>
            </nav>
        </div>

        <p class="copyright">All Rights Reserved <?php echo date('Y'); ?> &copy</p>
    </footer>

    <script src="/build/js/bundle.min.js"></script>
</body>
</html>