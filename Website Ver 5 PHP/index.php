<?php 
    $db = mysqli_connect("89.187.86.8", "msdigita_main_php", "q1w2e3r417", "msdigita_main");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MS Digital Tools Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main-search.css">
</head>
<body>
    <?php
        include('includes/html/header.inc.php');
    ?>

    <form action="search-result.php" method="post">
        <div class="search-container">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>What do you need help with?</p>

                        <div class="input-group mb-3 w-75 m-auto">
                            <div class="input-group-prepend">
                                <i class="fa fa-search input-group-text"></i>
                            </div>

                            <input required type="text" class="form-control ui-autocomplete-input" placeholder="Search here..." id="input" name="input">
                            
                            <div class="input-group-append">
                                <select name="search_by" id="search-by" class="custom-select">
                                    <option value="all">All</option>
                                    <option value="symptom">Symptom</option>
                                    <option value="language">Language</option>
                                    <option value="ms-type">MS Type</option>
                                    <option value="tool-type">Tool Type</option>
                                </select>
                            </div>
                        </div>
        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="main-body container">
        <div class="row">
            <div class="col-lg-8">
                <h3>The Multiple Sclerosis Digital Tool (MSDT) project</h4>
                <p>
                    We are creating a Multiple Sclerosis Digital Tools (MSDT) database to enable those with MS, their carers and MS Health Care Professionals to explore, choose and use digital tools to support the journey through diagnosis, treatment and managing the symptoms of MS.
                </p>
                <h4>Why build a Multiple Sclerosis Digital Tools database?</h4>
                <p>
                    At MS Digital Tools we want to create a space where it is possible to find tools that can help those with MS that are not specifically labelled for use with MS. For example, tools for mindfulness, relaxation, bladder and bowel management, exercise and beyond.
                </p>
                <h4>What we mean by multiple sclerosis digital tools</h4>
                <p>
                    At first, MS Digital Tools was to be focused on web and mobile apps, but it soon became evident that it could be more than this.    
                </p>
                <p>
                    At MS Digital Tools you will also be able to find MS Chat Bots, forum websites and PDF information booklets and work sheets.
                </p>
                <p>
                    As MS Digital Tools evolves, we expect to go beyond this to tools associated with the Internet of Things (IoT) and devices such as smart hubs and speakers. We welcome suggestions for other digital tools that might help those with MS.    
                </p>
                <h4>Bournemouth University co-creation project team</h4>
                <p>MS Digital Tools is a student and staff co-created Fusion project in the Department of Computing and Informatics, Faculty of Science and Technology,  Bournemouth University. </p>
                <h5>Students: Final Year Level 6</h5>
                <p>BSc (Hons) Business Information Technology</p>
                <li>Rhian Tucker - proof of concept investigation</li>
                <p>BSc (Hons) Computing</p>
                <li>Annie Fuller - user interface design, creation and testing</li>
                <li>Brendan Kirkton - database design, creation and testing</li>
                <h5>Staff: Principal Investigators</h5>
                <li>Keith Pretty - Senior Academic in Business Development and Enterprise</li>
                <li>Dr Huseyin Dogan - Principal Academic in Computing</li>
                <li>Dr Sarah Thomas - Bournemouth University Clinical Research Unit (BUCRU), Deputy Director (Methodology) and Senior Research Fellow</li>
                <h4>Project timeline</h4>
                <p>
                    We are currently testing the first version of MS Digital Tools, moving to public testing soon.
                </p>
                <p>
                    We will be collecting the views and input of those with MS, their carers and MS Health Care Professionals (HCPs) throughout 2019. 
                </p>
                <p>Annie, Brendan, Keith and Rhian</p>
                <p><a href="#">msdigitaltools@gmail.com</a></p>
            </div>
            <div class="col-lg-4">
                <h3>MS Digital Tools needs your help</h3>
                <p>
                    We are designing and creating the MS Digital Tools search platform, but we need your input to move forward. 
                    We have created two questionnaires, one for those with MS and their carers and one for Health Care Professionals (HCPs).  
                    You may complete them anonymously, with an option to get more involved with the development body.
                </p>
                <h4>Those with MS and carers</h5>
                <p>
                    It does not matter what type of multiple sclerosis you have or what type of non-clinical multiple sclerosis carer you are – we want to know if you use digital tools as part of MS support and what role they play.  
                </p>
                <h4>Health Care Professionals (HCPs)</h5>
                <p>
                    We welcome input from any person who has a clinic role in multiple sclerosis care – we want to know your views on using digital tools as part of multiple sclerosis care and management. You may complete this anonymously.
                </p>
                <p>It will take about 10 mins to complete the questionnaire. Longer if you wish to write a lot of detailed comments, which would be much appreciated.</p>
                <p>The more we know about you and your use of MS digital tools, the better we can make this site for the wider MS community.</p>
                <p>Contact us if you need help: <a href="#"> msdigitaltools@gmail.com</a></p>
                <p>Thank you for your help</p>
                <p>Annie, Brendan, Keith and Rhian</p>
            </div>
        </div>
    </div>
      
    <?php
        include('includes/html/footer.inc.php');
    ?>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    $(function() {
        var input = $("#input");
        var searchBy = $('#search-by');
        searchBy.on("change", function() {
            input.val("");
            var type = $(this).val();
            $(input).autocomplete({
                source: "search.php?type="+type,
                create: function(){
                    $(this).data('ui-autocomplete')._renderMenu = function( ul, items ) {
                        var menu = this,
                        currentCategory = "";
                        $.each( items, function( index, item ) {
                            var li;
                            if ( item.category != currentCategory ) {
                                ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
                                currentCategory = item.category;
                            }
                            li = menu._renderItemData( ul, item );
                        });
                    }
                }
            });
        });
        searchBy.trigger("change");
    });
</script>

</html>
<?php
    mysqli_close($db);
?>