var films;

$(document).ready(function () {
    $("#search-film").keyup(function () {
        getFilmsByTitle(this.value); //volvio
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

    /*
    $("#showAll").click(function () {
        $('#noFilmResult').remove();

        getFilmsByTitle(
            $("#searchingFilm").val(),
            $(this).attr('order')
        );

        $('#filmList').show();
    });*/


    $("#yearFilms").change(function () {
        getFilmsByYear(
            $(this).val()
        );
    });


});

function getFilmsByTitle(title, orderBy = 'DESC')
{
    $.ajax({
        url: "/api/films/title/" + title, //no hay que indicar en la funcion del api, de donde viene?
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

/*
1- Crear nuevo endpoint / ruta /api/films
2- Crear nuevo controller con /api/films
3- Este Controller llama al repositorio y obtiene todas films
4- Devuelve un json de todas las films en bd
 */

function renderFilmTableInformation(request)
{
    $("#filmListContent").empty();

    $.each(request, function (index, film) {
        $('#filmListContent').append('<tr><th>' + film.id + '</th>' + '<td>' + film.title + '</td><td>' + film.year + '</td></tr>');
    });
}