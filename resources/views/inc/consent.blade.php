<script type="text/javascript">
    $(document).ready(function(){
        $("#terms").keyup(function(){
            var value = document.getElementById('terms').value;
            if(value == "I Agree"){
                $("#addchild").removeAttr('disabled');
            } else {
                $("#addchild").attr('disabled', 'true');
            }
        });
    });        
</script>