<script type="text/javascript">
    $(document).ready(function(){
        $('#birthdate').flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });

        $('#expiration').flatpickr({
            enableTime: true,
            altInput: true,
            altFormat: "F j, Y h:i:S K",
            dateFormat: "Y-m-d H:i:S",
            enableSeconds:true
        });
    });
</script>