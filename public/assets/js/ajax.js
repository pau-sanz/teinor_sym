var films;

$(document).ready(function () {
    $("#search-film").keyup(function () {
        getFilmsByTitle(this.value);
    });

    $("#orderBy").click(function () {
        if ($(this).attr('order') === 'ASC') {
            $(this).attr('order', 'DESC');
        } else {
            $(this).attr('order', 'ASC');
        }

        getFilmsByTitle(
            $("#searchingFilm").val(),
            $(this).attr('order')
        );
    });

    $("#yearFilms").change(function () {
        getFilmsByYear(
            $(this).val()
        );
    });


});

function getFilmsByTitle(title, orderBy = 'DESC')
{
    $.ajax({
        url: "/api/films/title/" + title,
        type: "GET",
        dataType: 'json',
        data: {
            "orderBy": orderBy,
        },
        success: function (request) {
            renderFilmTableInformation(request);

        }
    });
}

function getFilmsByYear(year)
{
    $.ajax({
        url: "/api/films/year/" + year,
        type: "GET",
        dataType: 'json',
        data: {
            "year": year
        },
        success: function (request) {
            renderFilmTableInformation(request);
        }

    });
}

function getAllFilms()
{
    console.log('getAllFilms');
    $.ajax({
        url: "/api/films",
        type: "GET",
        dataType: 'json',
        success: function (request) {
            console.log('doing ajax');
            renderFilmTableInformation(request);
        }

    });
}

function renderFilmTableInformation(request)
{
    $("#filmListContent").empty();
    $.each(request, function (index, film) {
        $('#filmListContent').append('<tr><th>' + film.id + '</th>' + '<td>' + film.title + '</td><td>' + film.year + '</td></tr>');
    });
}