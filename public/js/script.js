$(function () {
    //Hapus Kategori
    //Hapus User
    $('.hapusUser').on('click', function () {
        const id = $(this).data('id');
        $('.yesHapusUsers').on('click', function () {
            $(this).attr('href', "../../../../admin/users/" + id);
        });
    });

})
