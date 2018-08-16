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
    //modal de confirmation
    $('#infoLoginModal').modal('show');
    setTimeout(doIt, 3000);
});

var closeInfoLogin = function () {
    $('#infoLoginModal').modal('toggle');
};