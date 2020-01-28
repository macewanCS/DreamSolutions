$(document).ready(function() {
    $(".select-multiple").select2({ placeholder: 'Select filters', width: '200px',  });

    // hack to prevent select2 menu from opening when clearing it
    // See https://github.com/select2/select2/issues/3320
    var $el = $('.select-multiple');
    $el.on('select2:unselecting', function(e) {
        $el.data('unselecting', true);
    }).on('select2:open', function(e) { // note the open event is important
        if ($el.data('unselecting')) {    
            $el.removeData('unselecting'); // you need to unset this before close
            $el.select2('close');
        }
    });

    $('#update-filters').click(function() {
        var qstring = "?";
        qstring += 'start=' + $('#start-date').val();
        qstring += '&end=' + $('#end-date').val();
        var user = $('#user-filter').val();
        qstring += '&user=' + (user === 'all' ? '' : user);
        var deptteam = $('#deptteam-filter').val();
        qstring += '&dept=' + (deptteam === 'all' ? '' : deptteam);
        qstring += '&type=' + $("input[name='changetype']:checked").val();
        window.location.href=qstring;
    });
});