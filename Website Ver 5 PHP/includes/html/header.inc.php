<head>
    <link rel="stylesheet" href="css/header.css">
</head>
<header>
    <div class="header container">
        <div class="row navbar navbar-light navbar-expand-lg p-0">
            <div class="msdt-logo col-4 d-inline-block">
                <a href="index.php"><img src="images/MSDigitalTools.png" alt="MS Digital Tools"></a>
            </div>
            <button class="navbar-toggler ml-auto mr-3 mt-2" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="header-wrapper nav-collapse col-12 col-lg-auto d-lg-flex align-items-center ml-lg-auto pr-3 pt-2 pb-2 pb-lg-0 collapse" id="navbarTogglerDemo01" style="">
                <div class="nav-bar navbar-nav">
                    <li class="nav-item"><a href="index.php">Home</a></li>
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
                    <li class="nav-item"><a href="using-this-site.php">Using this site</a></li>
                    <li class="nav-item"><a href="suggest-a-tool.php">Suggest a Tool</a></li>
                </div>
                <div class="social-media d-inline">
                    <a href="https://www.facebook.com/MSDigitalTools-630738694022724" target="_blank"><img src="images/facebook-icon.png" alt="Facebook Link"></a>
                    <a href="https://twitter.com/msdigitaltools" target="_blank"><img src="images/twitter-icon.png" alt="Twitter Link"></a>
                    <a href="https://www.instagram.com/msdigitaltools/" target="_blank"><img src="images/instagram-icon.png" alt="Instagram Link"></a>
                </div>
            </div>
        </div>
    </div>
    </header>