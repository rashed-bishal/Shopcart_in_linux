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


        $('.form-title').html('<h4>Upload a '+$(this).find('option:selected').text()+' product</h4>');

        // $('.form-body > form').html();
        //
        // $('.form-body > form').append('@csrf');




    });

































































});