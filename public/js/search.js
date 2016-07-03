$('#ministry').click(function() {
    $('#ministry').autocomplete({
        source: "url('search/ministry')",
        minLength: 1,
        select: function(event, ui) {
            $('#ministry').val(ui.item.value);
        }
    });
});
$('#department').click(function(){
    $('#department').autocomplete({
        source: "/search/department",
        minLength: 1,
        select: function(event, ui) {
            $('#department').val(ui.item.value);
        }
    });
});
$('#company').click(function(){
    $('#company').autocomplete({
        source: "/search/company",
        minLength: 1,
        select: function(event, ui) {
            $('#company').val(ui.item.value);
        }
    });
});
$('#location').click(function(){
    $('#location').autocomplete({
        source: "/search/location",
        minLength: 1,
        select: function(event, ui) {
            $('#location').val(ui.item.value);
        }
    });
});
$('#role').click(function(){
    $('#role').autocomplete({
        source: "/search/role",
        minLength: 1,
        select: function(event, ui) {
            $('#role').val(ui.item.value);
        }
    });
});
$('#position').click(function(){
    $('#position').autocomplete({
        source: "/search/position",
        minLength: 1,
        select: function(event, ui) {
            $('#position').val(ui.item.value);
        }
    });
});