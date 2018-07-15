$(document).ready(function () {
    var updateID;
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
        $('#createCategoryError').val();
        var value = $('#createCategory').val();
        if($.trim(value) === '')
        {
            $('#createCategoryError').text('Category cannot be empty');
        }
        else
        {
            $.ajax({
                type : 'POST',
                url : '/admin/category',
                data : { name : value },
                success : function(data){
                    if(data['warning'])
                    {
                        $('#createCategoryError').text(data['warning']);
                    }
                    else if(data['success'])
                    {
                        $('#createCategory').val('');
                        $('#createCategoryError').text('');
                        $('.modal').find('.modal-header').addClass('bg-success');
                        $('#categoryModalLabel').text('Success!');
                        $('#categoryModalBody').text(data['success']+' category has been created!');
                        $('#categoryModal').modal({backdrop: 'static', keyboard: false});
                    }
                },
                fail: function () {
                    $('#createCategory').val('');
                    $('#createCategoryError').text('');
                    $('.modal').find('.modal-header').addClass('bg-info');
                    $('#categoryModalLabel').text('Database Connnection Error!');
                    $('#categoryModalBody').text('You require action is failed due to connection error!');
                    $('#categoryModal').modal({backdrop: 'static', keyboard: false});
                }
            });
        }
    });

    $('#updateCategory').change(function () {
        updateID = $(this).val();
        var name = $(this).find('option:selected').text();
        $('#updateCategory').replaceWith('<input class="form-control" type="text" name="updateCategory" id="updateCategoryFinal" placeholder="Update Category: '+name+'" value="'+name+'">');
    });

    $('#deleteCategory').change(function () {
        $('#deleteCategoryError').text('');
    });

    $('#deleteButton').click(function(){
        var id = $('#deleteCategory').val();
        var name = $('#deleteCategory').find('option:selected').text();
        if(id === '')
        {
            $('#deleteCategoryError').text('Nothing to delete!');
        }
        else
        {
            $('.modal').find('.modal-header').addClass('bg-danger');
            $('.modal-footer').find('#deleteCategoryFinal').removeAttr('hidden');
            $('#categoryModalLabel').text('Deletion Process Ahead!');
            $('#categoryModalBody').text('Do you want to delete '+name+' category?');
            $('#categoryModal').modal({backdrop: 'static', keyboard: false});

        }

    });

    $('#deleteCategoryFinal').click(function () {
        var id = $('#deleteCategory').val();
        $.ajax({
            type: 'DELETE',
            url : '/admin/category/'+id,
            success: function (data) {
                window.location.reload();
            },
            fail: function () {

                $('#deleteCategoryError').text('');
                $('.modal').find('.modal-header').addClass('bg-info');
                $('#categoryModalLabel').text('Database Connnection Error!');
                $('#categoryModalBody').text('You require action is failed due to connection error!');
                $('#categoryModal').modal({backdrop: 'static', keyboard: false});
            }

        });

    });






    $('#updateButton').click(function(){
        var name = $.trim($('#updateCategoryFinal').val());
        if(name === '')
        {
            $('#updateCategoryError').text('Category cannot be empty!');
        }
        else
        {
            $.ajax({
                type : 'PATCH',
                url : '/admin/category/'+updateID,
                data : { name : name },
                success : function (data) {
                    if(data['warning'])
                    {
                        $('#updateCategoryError').text(data['warning']);
                    }
                    else if(data['success'])
                    {
                        $('#updateCategoryError').text('');
                        $('.modal').find('.modal-header').addClass('bg-warning');
                        $('#categoryModalLabel').text('Success!');
                        $('#categoryModalBody').text(data['success']);
                        $('#categoryModal').modal({backdrop: 'static', keyboard: false});
                    }
                },
                fail: function () {

                    $('#updateCategoryError').text('');
                    $('.modal').find('.modal-header').addClass('bg-info');
                    $('#categoryModalLabel').text('Database Connnection Error!');
                    $('#categoryModalBody').text('You require action is failed due to connection error!');
                    $('#categoryModal').modal({backdrop: 'static', keyboard: false});
                }
            });
        }
    });


    $('#createCategory').keypress(function(event){
        if(event.keyCode == 13)
        {
            event.preventDefault();
            $('#createButton').click();
        }
    });

    $('body').on('keypress','#updateCategoryFinal',function(event){
        if(event.keyCode == 13)
        {
            event.preventDefault();
            $('#updateButton').click();
        }
    });

    $('#deleteCategory').keypress(function(event){
        if(event.keyCode == 13)
        {
            event.preventDefault();
            $('#deleteButton').click();
        }
    });



});