<?php include_once '../Head/head.php'; ?>
    <section id = "signInSection">
        <h1 id = "greeting">Sign In</h1>
        <div id = "signInDiv">
            <form action = "../Certifications/signInCheck.php" method = "post">
                <input size = "50" type = "text" name = "username" placeholder = "Enter username or email.."/>
                <input size = "50" type = "password" name = "password" placeholder = "Enter password.."/>
                <button style = "width: 250px;" type = "submit" name = "signin_action">Sign In</button>
            </form>
        </div>
        <?php
        //errors to display to user
        if(isset($_GET["error"])){
            if($_GET["error"] == "blankinput") {
                echo "<p class = 'userTextDisplay'>Please check for any blank fields.</p>";
            }
            else if ($_GET["error"] == "incorrectsignininfo"){
                echo "<p class = 'userTextDisplay'>Sorry, what you entered was incorrect.</p>";
            }
        }
        ?>
    </section>
<?php include_once '../Footer/footer.php'; ?>
