<?php include_once '../Head/head.php'; ?>
    <section id = "enrollSection">
        <h1 id = "greeting">Enroll yourself..</h1>
        <div id = "enrolmentDiv">
            <form action = "../Certifications/enrollCheck.php" method = "post">
                <input size = "50" type = "text" name = "username" placeholder = "Create a username.."/>
                <input size = "50" type = "text" name = "email" placeholder = "Enter your email address.."/>
                <input size = "50" type = "password" name = "password" placeholder = "Create a password.."/>
                <input size = "50" type = "password" name = "conPassword" placeholder = "Repeat password.."/>
                <button size = "50" type = "submit" name = "enroll_action">Register</button>
            </form>
        </div>
        <?php

        //errors to display to user using superglobal GET. Checks URL for conditions
        if(isset($_GET["error"])){
            if($_GET["error"] == "blankinput") {
                echo "<p class = 'userTextDisplay'>Please check for any blank fields.</p>";
            }
            else if ($_GET["error"] == "usernamedenied"){
                echo "<p class = 'userTextDisplay'>Please decide on a better username.</p>";
            }
            else if ($_GET["error"] == "usernamealreadyexists"){
                echo "<p class = 'userTextDisplay'>It appears that username already exists.</p>";
            }
            else if ($_GET["error"] == "emaildenied"){
                echo "<p class = 'userTextDisplay'>Make sure that you entered the email correctly.</p>";
            }
            else if ($_GET["error"] == "passwordsarenotmatching"){
                echo "<p class = 'userTextDisplay'>Entered passwords do not match.</p>";
            }
            else if ($_GET["error"] == "enrollfailed"){
                echo "<p class = 'userTextDisplay'>We don't know what happened there.. try again?</p>";
            }
        }
        ?>
    </section>
<?php include_once '../Footer/footer.php'; ?>
