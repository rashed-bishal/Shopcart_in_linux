$(document).ready(function(){


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#categorySelect").change(function(){


        var id = $('#categorySelect').val();
        $('#subcategorySelect > option').slice(1).remove();

        $.ajax({
            type : 'GET',
            url : '/admin/subcategory/'+id+'/edit',
            success : function(data) {
                $('#subcategorySelect').append(data['subcategories']);
            }
        });


    });



    $('#subcategorySelect').change(function () {

        var value = $('#subcategorySelect').find('option:selected').text();

        if(value === 'Mobile')
        {
            $.ajax({

                type : 'GET',
                url : '/admin/getMobileBrands',
                success:function (data) {

                    $('.distinct').html('<select class="form-control" id="selectMobileBrand"><option value="">Select a mobile brand</option>'+data['success']+'</select>');

                }


            });
        }


    });

    $('.distinct').on('change','#selectMobileBrand',function (){

        var csrfVar = $('meta[name="csrf-token"]').attr('content');


        $('.form-title').html('<h4>Upload a '+$(this).find('option:selected').text()+' product</h4>');

        $('.form-body > form').html('<input name="_token" value="'+csrfVar+'" type="hidden">' +
            '<table class="table table-striped createForm">\n' +
            '                                <tbody>\n' +
            '                                <tr class="form-group">\n' +
            '                                        <td><label for="name">Name</label></td>\n' +
            '                                        <td><input type="text" class="form-control" name="model_name"></td>\n' +
            '                                    </tr>\n' +
            '                                <tr class="form-group">\n' +
            '                                        <td><label for="name">Name</label></td>\n' +
            '                                        <td><input type="text" class="form-control" name="model_number"></td>\n' +
            '                                    </tr>\n' +
            '                                <tr class="form-group">\n' +
            '                                        <td><label for="name">Name</label></td>\n' +
            '                                        <td><input type="text" class="form-control" name="price"></td>\n' +
            '                                    </tr>\n' +
            '                                <tr class="form-group">\n' +
            '                                        <td><label for="name">Name</label></td>\n' +
            '                                        <td><input type="text" class="form-control" name="model_name"></td>\n' +
            '                                    </tr>\n' +
            '                                <tr class="form-group">\n' +
            '                                        <td></td>\n' +
            '                                        <td><input type="submit" class="btn btn-dark" name="submit"></td>\n' +
            '                                    </tr>\n' +
            '\n' +
            '                               </tbody>\n' +
            '            </table>');

        $('.form-body > form').append('{{csrf_field()}}');




    });

































































});