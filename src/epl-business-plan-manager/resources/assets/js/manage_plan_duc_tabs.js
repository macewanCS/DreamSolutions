jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });
});


<!-- // <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.js"></script> -->
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
