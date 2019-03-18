$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        placeholder: "  Select a user.."
    });
});
$('#joinee').select2({
    templateSelection: function (data, container) {
        $(data.element).attr('data-custom-attribute', data.customValue);
        return data.text;
    }
});

$('#joinee').find(':selected').data('custom-attribute');