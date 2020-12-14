<?php include_once '../Head/head.php'; ?>
    <header>
        <div class="container d-flex align-items-center flex-column">
            <div id="sliders">
                <div id="outer">
                    <div class="inner">
                        <?php if(isset($_SESSION["username"])){
                            echo "<p class = 'inner' style = 'color: rgba(243,0,255,1); font-weight: bold; animation: Slide_Across 0.7s ease;'>Hello, ". $_SESSION["username"]."</p>";
                        }
                        ?>
                        <h1>Fáilte, to Dijitrail </h1>
                        <p>Scroll down to get started</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="smallBox">
        <div id = "gifBlur">
            <h1 id = "bigText">Our website covers a fair bit. We'll explain how you get around.</h1>
            <br>
            <i class="fas fa-route" style = "float: left;"></i>
            <p class = "demonstrateText">Having a hard time planning your journey? No worries, we'll plan it for you with our Travel tab!</p>
            <i class="fas fa-image" style = "float: left;"></i>
            <p class = "demonstrateText">Ireland is a beautiful place. Browse the four provinces with with our Gallery tab.</p>
            <i class="fas fa-user-circle" style = "float: left;"></i>
            <p class = "demonstrateText">If you want to comment or review hiking trails you can go to the Register tab to create an account.</p>
            <i class="fas fa-book" style = "float: left;"></i>
            <p class = "demonstrateText">Read up about the website if you are interested our work in the About tab.</p>
            <i class="fas fa-home" style = "float: left;"></i>
            <p class = "demonstrateText">If you ever need to orient yourself back to here, click our logo.</p>
        </div>
    </div>
<?php include_once '../Footer/footer.php'; ?>

