//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////CATEGORY////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var categoryId = 0;
var categoryNameElement = null;
var categoryFormulaElement = null;
$('.panel').find('.div-body-modal').find('.div-add-category-modal').find('#add-category-modal-btn').on('click', function(event){
    event.preventDefault();
    $("#addCategoryForm")[0].reset();
    $(".form-group").removeClass('has-error');
    $("h6.ErrorRed").html('');
    $('#addCategoryModal').modal();
});
$('#add_category_modal_save').on('click', function () {
    $(".form-group").removeClass('has-error');
    $("h6.ErrorRed").html('');
    $.ajax({
        method: 'POST',
        url:urlAddCategory,
        data:{
            name: $('#category_name').val(),
            formula: $('#category_formula').val(),
            _token: token}
    }).done(function () {
        $('#addCategoryModal').modal('hide');
        //$('#datatable').ajax.reload(null, true);
        $(location).attr('href',urlGetCategory);
    }).fail(function(jqXHR, textStatus, errorThrown) {

        console.log('Text Status:');
        console.log(textStatus);
        console.log('Error Thrown:');
        console.log(errorThrown);
        console.log('jqXHR:');
        console.log(jqXHR.responseText);
        var responseError = JSON.parse(jqXHR.responseText);

        $.each(responseError, function(k, v) {
            console.log('Key:');
            console.log(k);
            console.log('Value:');
            console.log(v[0]);
            $('input#category_' + k).closest('.form-group').addClass('has-error');
            $('div#error_add-category_'+ k +' h6').html(v[0]);
        });

    });
});

$('.panel').find('.div-body-modal').find('.table').find('.btn-group').find('.dropdown-menu').find('#edit-category-modal-btn').on('click', function(event){
    event.preventDefault();
    categoryId = event.target.dataset['categoryid'];
    categoryNameElement = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[3];
    categoryFormulaElement = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[5];
    var categoryName = categoryNameElement.textContent;
    var categoryFormula = categoryFormulaElement.textContent;
    $('#edit-category_name').val(categoryName);
    $('#edit-category_formula').val(categoryFormula);
    $(".form-group").removeClass('has-error');
    $("h6.ErrorRed").html('');
    $("div#edit-category-msg").html('');
    $(".edit-categories-footer").removeClass('div-hide');
    $('#edit-category-modal').modal();
});
$('#edit-categories-btn').on('click', function () {
    $(".form-group").removeClass('has-error');
    $("h6.ErrorRed").html('');
    $.ajax({
        method:'post',
        url:urlEditCategory,
        data:{name: $('#edit-category_name').val(), formula: $('#edit-category_formula').val(), id: categoryId, _token: token}

    }).fail(function(jqXHR, textStatus, errorThrown) {

        console.log('Text Status:');
        console.log(textStatus);
        console.log('Error Thrown:');
        console.log(errorThrown);
        console.log('jqXHR:');
        console.log(jqXHR.responseText);
        var responseError = JSON.parse(jqXHR.responseText);

        $.each(responseError, function(k, v) {
            console.log('Key:');
            console.log(k);
            console.log('Value:');
            console.log(v[0]);
            $('input#edit-category_' + k).closest('.form-group').addClass('has-error');
            $('div#error_edit-category_'+ k +' h6').html(v[0]);
        });

    }).done(function (msg) {
        $(".edit-categories-footer").addClass('div-hide');
        $("#edit-category-msg").html('<p class="text-success clean-edit-category" style="text-align: center"> تم التحديث بنجاح </p>');
        setTimeout(function() {$('#edit-category-modal').modal('hide');}, 600);
    });
});

$('.panel').find('.div-body-modal').find('.table').find('.btn-group').find('.dropdown-menu').find('#remove-category-modal-btn').on('click', function(event){
    event.preventDefault();
    categoryId = event.target.dataset['categoryid'];
    $('#delete-categories-modal').modal();
});

$('#delete-categories-btn').on('click', function () {
    console.log(categoryId);
    $.ajax({
        method:'post',
        url:urlDeleteCategory,
        data:{id: categoryId, _token: token}
    }).done(function (msg) {
        $('#delete-categories-modal').modal('hide');
    });
    $(location).attr('href',urlGetCategory);
});

//////////////////////////////////////END CATEGORY////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////GET CATEGORY IN PRODUCT///////////////////////////////////////////////////////
var selectCategory = null;
var selectCategoryAdd = null;
var selectCategoryEdit = null;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.ajax({
    method: 'POST',
    url:urlGetCategoryInStatement,
    dataType: 'json'
}).done(function (response) {
    var header1 = '';
    var header2 = '';
    var header3 = '';
    header1 = '<select class="form-control" name="category_id" id="category_id">';
    header2 = '<select class="form-control" name="add-category_id" id="add-category_id">';
    header3 = '<select class="form-control" name="edit-category_id" id="edit-category_id">';
    var option = '<option value="">~~إختر~~</option>';
    $.each(response, function(index, value) {
        option += '<option value="'+value.id+'">'+value.category_name+'</option>';
    });
    option += '</select><h6 class="ErrorRed"></h6>';
    header1 +=  option;
    header2 +=  option;
    header3 +=  option;
    selectCategory = header1;
    selectCategoryAdd = header2;
    selectCategoryEdit = header3;
    $("div#switchCategory").html(selectCategory);
    if (categoryIdSelect){
        $('#category_id').val(categoryIdSelect);
    }
});
///////////////////////////////////////END GET CATEGORY IN PRODUCT///////////////////////////////////////////////////////
//////////////////////////////////////STATEMENTS//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$('.panel').find('.div-body-modal').find('.div-add-statement-modal').find('#add-statement-modal-btn').on('click', function(event){
    event.preventDefault();
    $("#addStatementForm")[0].reset();
    $(".form-group").removeClass('has-error');
    $("h6.ErrorRed").html('');
    $('#addStatementModal').modal();
});
$('#add_statement_modal_save').on('click', function () {
    $(".form-group").removeClass('has-error');
    $("h6.ErrorRed").html('');
    $.ajax({
        method: 'POST',
        url:urlAddStatement,
        data:{
            name: $('#statement_title').val(),
            formula: $('#category_formula').val(),
            _token: token}
    }).done(function () {
        $('#addCategoryModal').modal('hide');
        //$('#datatable').ajax.reload(null, true);
        $(location).attr('href',urlGetCategory);
    }).fail(function(jqXHR, textStatus, errorThrown) {

        console.log('Text Status:');
        console.log(textStatus);
        console.log('Error Thrown:');
        console.log(errorThrown);
        console.log('jqXHR:');
        console.log(jqXHR.responseText);
        var responseError = JSON.parse(jqXHR.responseText);

        $.each(responseError, function(k, v) {
            console.log('Key:');
            console.log(k);
            console.log('Value:');
            console.log(v[0]);
            $('input#category_' + k).closest('.form-group').addClass('has-error');
            $('div#error_add-category_'+ k +' h6').html(v[0]);
        });

    });
});
