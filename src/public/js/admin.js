$(document).ready(function() {
    $('#select-dept').change(function() {
        location.href = $(this).val() ? '?dept=' + $(this).val() : '?';
    });
});