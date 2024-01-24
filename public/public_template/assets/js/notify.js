
$(document).ready(function() {
    const notyf = new Notyf({
    types: [
        {
        type: 'success',
        duration: 3000
        }
    ]
    });

    notyf.open({
    type: 'success',
    message: "success"
    });
});