<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"></meta>
    <title>Business Plan Manager</title>
    <link rel="stylesheet" type="text/css" href="/css/header.css"></link>
    <link rel="stylesheet" type="text/css" href="/css/manage_plan.css"></link>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.js"></script>
</head>
<body>
    <div id="header-area">
        <header id="main-header">
            <img id="epl-logo" src="images/epl-logo.jpg" alt="EPL Logo">
            <h3>Business Plan Manager</h3>
        </header>
        <hr>
        <div id="nav">
            <ul>
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#view_plan" class="active">View Plan</a></li>
                <li><a href="#manage_plan">Manage Plan</a></li>
            </ul>
            <div>
            	<img style="float: right;" src="https://static.xx.fbcdn.net/rsrc.php/v2/yB/r/Unmn04Ngmxd.gif">
            	<input type="text" name="search" placeholder="Search" style="float: right;">
            </div>
        </div>
    </div>

    <div id="manage-plan-area">

        <div class="duc-tabs">
            <ul class="duc-tab-links">
                <li class="active"><a href="#tab1">Create</a></li>
                <li><a href="#tab2">Update</a></li>
                <li><a href="#tab3">Delete</a></li>
            </ul>

            <div class="tab-content">
                <div id="tab1" class="tab active">
                    <p>Tab #1 content goes here!</p>
                </div>
                <div id="tab2" class="tab">
                    <p>Lorem ipsum hgocbijdcbks</p>
                </div>
                <div id="tab3" class="tab">
                    <p>Tab #3gfgfgfgfgfgfgfgfgfgfgfgfgfg content goes here!</p>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(function() {

                $('.duc-tabs .duc-tab-links li').on('click', function() {

                    var $tab = $(this).closest('.duc-tabs');

                    $tab.find('.duc-tab-links li.active').removeClass('active');

                    $(this).addClass('active');

                    // figure out which tab to show
                    var tabToShow = $(this).attr('href'); // Problem is here, undefined.
                    alert(tabToShow);

                    // hide current panel
                    $tab.find('.tab.active').hide(showNewTab);

                    function showNewTab() {
                        // Remove active class
                        $(this).removeClass('active');
                        alert('Inmore');

                        // Show current pannel
                        $('#'+tabToShow).show(function() {

                        // add active class
                        $(this).addClass('active');
                        alert('End');
                        });
                    }

                });
            })
        </script>

    </div>

</body>
</html>
