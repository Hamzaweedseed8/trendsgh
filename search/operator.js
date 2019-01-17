$(document).ready(function(){
$('#musicsearch').typeahead({
        name: 'musicsearch',
        remote:'search.php?musicsearch=%QUERY',
        limit : 10
    });
})