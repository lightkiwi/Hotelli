$(document).ready(function () {
    /**
     * Fonctionnement du login
     */
    $('#loginModalFormSubmit').click(function (event) {
        event.preventDefault();
        $('#loginModalForm').submit();
    });


    /**
     * Gestion dynamique des tableaux
     */
    $('.container-admin .table-responsive tbody tr').click(function () {
        $('.user-select').prop("disabled", false);
        $('.room-select').prop("disabled", false);
        $('.book-select').prop("disabled", false);
        $('.container-admin .table-responsive tbody tr').each(function () {
            $(this).removeClass('tr-selected');
        });
        $(this).addClass('tr-selected');
    });
    /*
     * Gestion des utilisateurs
     */
    $('#user-select-del').click(function () {
        if (confirm('êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
            var id = $('.tr-selected').attr('data-id');
            window.location.replace('/admin/users/del/' + id);
        }
    });

    /**
     * Gestion des chambres
     */

    $('#room-select-del').click(function () {
        if (confirm('êtes-vous sûr de vouloir supprimer cette chambre ?')) {
            var id = $('.tr-selected').attr('data-id');
            window.location.replace('/admin/rooms/del/' + id);
        }
    });
    $('#room-select-change').click(function () {
//        if (confirm('êtes-vous sûr de vouloir supprimer cette réservation ?')) {
        var id = $('.tr-selected').attr('data-id');
        window.location.replace('/admin/rooms/change/' + id);
//        }
    });
    /**
     * Gestion des chambres
     */

    $('#book-select-del').click(function () {
        if (confirm('êtes-vous sûr de vouloir supprimer cette réservation ?')) {
            var id = $('.tr-selected').attr('data-id');
            window.location.replace('/admin/booking/del/' + id);
        }
    });

    $(document).ready(function () {
        $('.js-example-basic-single').select2();
    });
});
