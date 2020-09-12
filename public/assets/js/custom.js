$(document).ready(function () {

    $("#add").click(function () {
        if (!$("#sendFilm").is(":visible")) {
            $("#sendFilm").show();
        } else {
            $("#sendFilm").hide();
        }
    });

    $("#yearFilm").datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy',
        yearRange: '1910:2020',
        onClose: function (dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });

    for (i = new Date().getFullYear(); i > 1899; i--)
    {
        $('#yearFilms').append($('<option />').val(i).html(i));
    }

});