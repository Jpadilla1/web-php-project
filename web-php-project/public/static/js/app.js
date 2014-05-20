$(document).ready(function() {
	$.fn.dataTableExt.oStdClasses.sPageButton = "btn btn-default btn-margin";
    $.fn.dataTableExt.oStdClasses.sPageButtonActive = "btn btn-primary btn-margin";
    $.fn.dataTableExt.oStdClasses.sPageButtonStaticDisabled = "btn btn-default disabled btn-margin";
	$('#users_table').dataTable({
        "oLanguage": {
         "sSearch": "",
         "sLengthMenu" :"_MENU_"
       },
	});

	$('div.dataTables_length').addClass('form-inline');
    $('div.dataTables_length select').addClass('form-control');
    $('div.dataTables_length select').addClass('select-wd');
    $('div.dataTables_length select').attr('id', "show-x-dropdown");
    $('div.dataTables_length label').contents().unwrap();
    $('div.dataTables_length select').before("<label for='show-x-dropdown' style='margin-right:10px;'>Show: </label>");
    
    $('div.dataTables_filter input').addClass('form-control');
    $('div.dataTables_filter input').attr('placeholder', "Search...");
    $('div.dataTables_filter label').before("<i class='glyphicon glyphicon-search'></i>");
    $('div.dataTables_filter label').contents().unwrap();
    $('div.dataTables_filter').after("<br><br>");
    $('div.dataTables_filter').addClass("left-inner-addon col-md-4 pull-right");
    $('#users_table').addClass('clearfix');
});