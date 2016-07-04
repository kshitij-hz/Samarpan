$('#inPublic').on('click', '#ministry', function(){
    $('#ministry').autocomplete({
        source: "/search/ministry",
        minLength: 1,
        select: function(event, ui) {
            $('#ministry').val(ui.item.value);
        }
    });
});
$('#inPublic').on('click', '#department', function(){
    $('#department').autocomplete({
        source: "/search/department",
        minLength: 1,
        select: function(event, ui) {
            $('#department').val(ui.item.value);
        }
    });
});
$('#inPublic').on('click', '#company', function(){
    $('#company').autocomplete({
        source: "/search/company",
        minLength: 1,
        select: function(event, ui) {
            $('#company').val(ui.item.value);
        }
    });
});
$('#inPublic').on('click', '#location', function(){
    $('#location').autocomplete({
        source: "/search/location",
        minLength: 1,
        select: function(event, ui) {
            $('#location').val(ui.item.value);
        }
    });
});
$('#inPublic').on('click', '#role', function(){
    $('#role').autocomplete({
        source: "/search/role",
        minLength: 1,
        select: function(event, ui) {
            $('#role').val(ui.item.value);
        }
    });
});
$('#inPublic').on('click', '#position', function(){
    $('#position').autocomplete({
        source: "/search/position",
        minLength: 1,
        select: function(event, ui) {
            $('#position').val(ui.item.value);
        }
    });
});
$('#viewercompany').click(function(){
    $('#viewercompany').autocomplete({
        source: "/search/firstnameviewer",
        minLength: 1,
        select: function(event, ui) {
            $('#viewercompany').val(ui.item.value);
        }
    });
});