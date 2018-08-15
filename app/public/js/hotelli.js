$(document).ready(function () {
    console.log('ready');
    /**
     * Fonctionnement du login
     */
    // envoi du formulaire
    $('#loginModalFormSubmit').click(function (event) {
        event.preventDefault();
        $('#loginModalForm').submit();
    });
});