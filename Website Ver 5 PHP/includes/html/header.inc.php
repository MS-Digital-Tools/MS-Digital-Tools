<head>
    <link rel="stylesheet" href="css/header.css">
</head>
<header>
    <div class="header">
            <div class="msdt-logo">
                <a href="index.php"><img src="images/MSDigitalTools.png" alt="MS Digital Tools"></a>
            </div>

            <div class="header-wrapper">
                <div class="nav-bar">
                    <li><a href="index.php">Home</a></li>
                    <div class="symptoms-dropdown">
                        <li class="symptoms-drop"><a href="#">Symptoms <i class="fa fa-caret-down"></i></a></li>
                        <div class="symptoms-dropdown-content">
                            <ul>
                                <?php
                                    $symp_query = $db->query("SELECT * FROM `Symptoms` ORDER BY symptom_name");
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
                <div class="social-media">
                    <a href="https://www.facebook.com/MSDigitalTools-630738694022724" target="_blank"><img src="images/facebook-icon.png" alt="Facebook Link"></a>
                    <a href="https://twitter.com/msdigitaltools" target="_blank"><img src="images/twitter-icon.png" alt="Twitter Link"></a>
                    <a href="https://www.instagram.com/msdigitaltools/" target="_blank"><img src="images/instagram-icon.png" alt="Instagram Link"></a>
                </div>
            </div>

        </div>
    </header>