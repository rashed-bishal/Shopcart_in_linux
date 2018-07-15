$(document).ready(function(){
    var oldSubcategoryName = '', mixed='';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#categoryModal').on('shown.bs.modal', function(e){
        $(this).find('.closeAndRefresh').focus();
    });

    $('.closeAndRefresh').click(function () {
        window.location.reload();
    });

    $('#createButton').click(function(event){
        event.preventDefault();
        var categoryId = $('#createCategorySelect').val();
        var categoryName = $('#createCategorySelect').find('option:selected').text();
        var subcategory = $('#createSubCategory').val();

        if(categoryId === $.trim(subcategory))
        {
            $('#createSubCategoryError').text('First select a category then type a subcategory name');
        }
        else if($.trim(subcategory) === '')
        {
            $('#createSubCategoryError').text('Type a subcategory for '+categoryName);
        }
        else if(categoryId === '')
        {
            $('#createSubCategoryError').text('Select a category for '+subcategory);
        }
        else
        {
            $.ajax({
                type : 'POST',
                url : '/admin/subcategory',
                data : {categoryId: categoryId, name: subcategory},
                success : function (data) {
                    if(data['warning'])
                    {
                        $('#createSubCategoryError').text(data['warning']);
                    }
                    else if(data['success'])
                    {
                        $('.modal').find('.modal-header').addClass('bg-success');
                        $('#categoryModalLabel').text('Success!');
                        $('#categoryModalBody').text(data['success']+' subcategory has been created!');
                        $('#categoryModal').modal({backdrop: 'static', keyboard: false});
                    }
                }
            });
        }
    });

    $('#updateCategorySelect').change(function () {
        $('#updateSubCategoryError').text('');
        var id = $(this).val();

        $('#updateSubCategoryFinal').replaceWith('<select class="form-control" id="updateSubCategory"><option value="">Select a sub-category</option></select>');
        $('#updateSubCategory > option').slice(1).remove();
        $.ajax({
            type : 'GET',
            url : '/admin/subcategory/'+id+'/edit',
            success : function(data) {
                $('#updateSubCategory').append(data['subcategories']);
            }
        });

        $('#updateSubCategory').change(function () {
            oldSubcategoryName = $('#updateSubCategory').find('option:selected').text();
            $('#updateSubCategory').replaceWith('<input class="form-control" type="text" name="updateSubCategory" id="updateSubCategoryFinal" placeholder="Update Category: '+oldSubcategoryName+'" value="'+oldSubcategoryName+'">');
        });

    });

    $('#updateButton').click(function(){
        var cat_id = $('#updateCategorySelect').val();
        var subcat_name = $('#updateSubCategoryFinal').val();

        if(cat_id === '' || $.trim(subcat_name) === '')
        {
            $('#updateSubCategoryError').text('Nothing to update!');
        }
        else
        {
            $.ajax({
                type : 'PATCH',
                url : '/admin/subcategory/'+cat_id,
                data : { id : cat_id, name : subcat_name, oldsubcat_name : oldSubcategoryName },
                success : function (data) {
                    if(data['warning'])
                    {
                        $('#updateSubCategoryError').text(data['warning']);
                    }
                    else if(data['success'])
                    {
                        $('.modal').find('.modal-header').addClass('bg-warning');
                        $('#categoryModalLabel').text('Success!');
                        $('#categoryModalBody').text(data['success']);
                        $('#categoryModal').modal({backdrop: 'static', keyboard: false});
                    }
                }
            });
        }
    });

    $('#deleteCategorySelect').change(function(){
        $('#deleteSubCategoryError').text('');
        var id = $(this).val();
        $('#deleteSubCategory > option').slice(1).remove();

        $.ajax({
            type : 'GET',
            url : '/admin/subcategory/'+id+'/edit',
            success : function(data) {
                $('#deleteSubCategory').append(data['subcategories']);
            }
        });
    });

    $('#deleteSubCategory').change(function(){
        $('#deleteSubCategoryError').text('');
    });

    $('#deleteButton').click(function () {
        var cat_id = $('#deleteCategorySelect').val();
        var subcat_id = $('#deleteSubCategory').val();
        var subcat_name = $('#deleteSubCategory').find('option:selected').text();
        mixed = cat_id.toString()+'+'+subcat_id.toString();
        if(cat_id === '' || subcat_id === '')
        {
            $('#deleteSubCategoryError').text('Nothing to delete!');
        }
        else
        {

            $('.modal').find('.modal-header').addClass('bg-danger');
            $('.modal-footer').find('#deleteCategoryFinal').removeAttr('hidden');
            $('#categoryModalLabel').text('Deletion Process Ahead!');
            $('#categoryModalBody').text('Do you want to delete '+subcat_name+' subcategory?');
            $('#categoryModal').modal({backdrop: 'static', keyboard: false});
        }
    });

    $('#deleteCategoryFinal').click(function () {
        $.ajax({
            type: 'DELETE',
            url : '/admin/subcategory/'+mixed,
            success: function (data) {
                window.location.reload();
            }
        });
    });



    $('#subcategoryList').change(function(){

        $('.table > tbody').html('');
        var value = $('#subcategoryList').val();

        $.ajax({

            type : 'GET',
            url : '/admin/subcategory/'+value,
            success : function(data){

                if(data['subcategories'])
                {
                    $('.table > tbody').html(data['subcategories']);
                }

            }


        });


    });









    $('#createSubCategory').keypress(function(event){
        if(event.keyCode == 13)
        {
            event.preventDefault();
            $('#createButton').click();
        }
    });

    $('body').on('keypress','#updateSubCategoryFinal',function(event){
        if(event.keyCode == 13)
        {
            event.preventDefault();
            $('#updateButton').click();
        }
    });

    $('#deleteSubCategory').keypress(function(event){
        if(event.keyCode == 13)
        {
            event.preventDefault();
            $('#deleteButton').click();
        }
    });




































});