$("#polo_check").click(function(){
    if($('input[type=checkbox]').prop('checked')){
        $("#polo").removeAttr('readonly');
    } else {
        $("#polo").attr('readonly', 'true');
        $("#polo").val('');
    }
    
});

$(document).ready(function(){
    if($("#polo").val() != ""){
        $("#polo").removeAttr('readonly');
        $("#polo_check").attr('checked', 'checked');
    }
});