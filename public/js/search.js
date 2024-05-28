$(document).ready(function () {
    $("#search-input").on("input", function () {
        var query = $(this).val();
        var searchUrl = $('form[role="search"]').data("search-url"); // Mengambil URL dari atribut data

        $.ajax({
            url: searchUrl, // Menggunakan URL yang telah diambil

            method: "GET",
            data: { query: query },
            success: function (response) {
                // Tampilkan hasil pencarian
                $("#search-results").empty();
                $.each(response, function (index, programStudi) {
                    $("#search-results").append(
                        "<li>" + programStudi.nama_prodi + "</li>"
                    );
                });
            },
        });
    });
});
