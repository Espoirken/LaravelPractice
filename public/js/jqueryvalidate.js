$(document).ready(function () {
    $('#child_create').validate({
        rules: {
            name: {
                required: true
            },
            birthdate: {
                required: true,
            },
            batting: {
                required: true,
            },
            gender: {
                required: true,
            },
            sport: {
                required: true,
            },
            throwing_hand: {
                required: true,
            },
            condition: {
                required: true,
            },
        }
    });
    $('#user_create').validate({
        rules: {
            username: {
                required: true
            },
            email: {
                required: true,
            },
            password: {
                required: true,
            },
            password_confirmation: {
                required: true,
            },
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            landline: {
                required: true,
            },
            mobile: {
                required: true,
            },
            expiration: {
                required: true,
            },
        }
    });
    $('#user_edit').validate({
        rules: {
            username: {
                required: true
            },
            email: {
                required: true,
            },
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            landline: {
                required: true,
            },
            mobile: {
                required: true,
            },
            expiration: {
                required: true,
            },
        }
    });
    $('#event').validate({
        rules: {
            title: {
                required: true
            },
            detail: {
                required: true,
            },
            ended_at: {
                required: true,
            },
        }
    });
});