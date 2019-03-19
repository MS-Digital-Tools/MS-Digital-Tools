<header>
        <div class="header">
            <div class="logo"><img src="images/MSDigitalTools.svg" alt="MS Digital Tools"></div>

            <div class="header-wrapper">
                <nav>
                    <div class="nav-bar">
                        <li><a href="index.php">Home</a></li>
                        <div class="symptoms-dropdown">
                            <li class="symptoms-drop"><a href="#">Symptoms <i class="fa fa-caret-down"></i></a></li>
                            <div class="symptoms-dropdown-content">
                                <ul>
                                    <?php
                                        $symp_query = $db->query("SELECT * FROM `Symptoms`");
                                        while($symptom = mysqli_fetch_assoc($symp_query)) {
                                    ?>
                                    <li><a href="symptom.php?ident=<?php echo $symptom['symptom_ident'];?>"> <?php echo $symptom['symptom_name'];?> </a></li>
                                    <?php
                                        }
                                    ?>
                                    
                                </ul>
                            </div>
                        </div>
                        <li><a href="using-this-site.php">Using this site</a></li>
                        <li><a href="suggest-a-tool.php">Suggest a Tool</a></li>
                    </div>
                </nav>
                <div class="admin-login">
                    <p class="admin-login-drop">Admin Login</p>
                    <div class="admin-login-dropdown">
                        <form action="#">
                            <p>Username:</p><input type="text" class="username">
                            <p>Password:</p><input type="text" class="password">
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </header>