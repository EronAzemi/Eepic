<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foter</title>
    <link rel="stylesheet" href="footer.css">
</head>
<body>
    

<footer>
    <div class="footer">
        <div class="footer__addr">
            <h1 class="footer__logo"><img src="images/LOGO PNG 1.png" alt=""></h1>
            <h2>Contact</h2>
            <address>
                Your Address Here<br>
                <a class="footer__btn" href="mailto:azemieron7@gmail.com">Email Us</a>
            </address>
        </div>
        
        <ul class="footer__nav">
            <li class="nav__item">
                <h2 class="nav__title">Media</h2>
                <ul class="nav__ul">
                    <li><a href="#">Online</a></li>
                    <li><a href="#">Print</a></li>
                    <li><a href="#">Alternative Ads</a></li>
                </ul>
            </li>
            
            <li class="nav__item nav__item--extra">
                <h2 class="nav__title">Technology</h2>
                <ul class="nav__ul nav__ul--extra">
                    <li><a href="#">Hardware Design</a></li>
                    <li><a href="#">Software Design</a></li>
                    <li><a href="#">Digital Signage</a></li>
                    
                </ul>
            </li>
            
            <li class="nav__item">
                <h2 class="nav__title">Legal</h2>
                <ul class="nav__ul">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Sitemap</a></li>
                </ul>
            </li>
        </ul>
        
        <div class="legal">
            <p>&copy; <?php echo date("Y"); ?> Your Company. All rights reserved.</p>
            <div class="legal__links">
                <span>Made By Eron & Erzen</span>
            </div>
        </div>
    </div>
</footer>
</body>
</html>