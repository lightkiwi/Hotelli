$(document).ready(function () {
    /**
     * Fonctionnement du login
     */
    $('#loginModalFormSubmit').click(function (event) {
        event.preventDefault();
        $('#loginModalForm').submit();
    });
});