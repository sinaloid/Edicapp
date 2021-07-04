$(document).ready(function() {
    
    $('#country').on('change', function() {
       
        let country_id = $(this).val();
        
        if (country_id) {
            //alert('coucou');
            $.ajax({
                //alert('coucou');
                url: '/country/' + country_id,
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    //var response = JSON.parse(data);
                    //console.log(response);
                    if (data) {
                        $('#region').empty();
                        $('#province').empty();
                        $('#commune').empty();
                        $('#region').focus;

                        $.each(data, function(key, value){
                            $('#region').append(
                                '<div class="col-12 col-sm-6 mt-3 list-group1">' +
                                '<div class=" mx-auto form-check list-group-item list-group-item-action list-group-item-dark w-75">' +
                                    '<label class="form-check-label col">' +
                                        '<input type="checkbox" class="form-check-input checkSize my-0 " value="' + key + '">' + value +
                                    '</label>' +
                                '</div>'+
                            '</div>'
                            );
                        })
                    } else {
                        $('#region').empty();
                        $('#province').empty();
                        $('#commune').empty();

                    }
                }
            });
            
        } else {
            $('#region').empty();
            $('#province').empty();
            $('#commune').empty();

        }
    });

    $('#region').on('change', function() {
       
       let region_id = $(this).val();
       
       if (region_id) {
           //alert('coucou');
           $.ajax({
               //alert('coucou');
               url: '/region/' + region_id,
               type: "GET",
               data: {
                   "_token": "{{ csrf_token() }}"
               },
               dataType: "json",
               success: function(data) {
                   console.log(data);
                   if (data) {
                       $('#province').empty();
                       $('#commune').empty();
                       $('#province').focus;
                       $.each(data, function(key, value){
                        $('#province').append(
                            '<div class="col-12 col-sm-6 mt-3 list-group1">' +
                            '<div class=" mx-auto form-check list-group-item list-group-item-action list-group-item-dark w-75">' +
                                '<label class="form-check-label col">' +
                                    '<input type="checkbox" class="form-check-input checkSize my-0 " value="' + key + '">' + value +
                                '</label>' +
                            '</div>'+
                        '</div>'
                        );
                    });
                   } else {
                       $('#province').empty();
                       $('#commune').empty();

                   }
               }
           });
           
       } else {
           $('#province').empty();
           $('#commune').empty();

       }
   });

   $('#province').on('change', function() {
       
       let province_id = $(this).val();
       
       if (province_id) {
           //alert('coucou');
           $.ajax({
               //alert('coucou');
               url: '/province/' + province_id,
               type: "GET",
               data: {
                   "_token": "{{ csrf_token() }}"
               },
               dataType: "json",
               success: function(data) {
                   //console.log(data);
                   if (data) {
                       $('#commune').empty();
                       $('#commune').focus;
                       $.each(data, function(key, value){
                        $('#commune').append(
                            '<div class="col-12 col-sm-6 mt-3 list-group1">' +
                            '<div class=" mx-auto form-check list-group-item list-group-item-action list-group-item-dark w-75">' +
                                '<label class="form-check-label col">' +
                                    '<input type="checkbox" class="form-check-input checkSize my-0 " value="' + key + '">' + value +
                                '</label>' +
                            '</div>'+
                        '</div>'
                        );
                    });
                   } else {
                       $('#commune').empty();
                   }
               }
           });
           
       } else {
           $('#commune').empty();
       }
   });

   $('#commune').on('change', function() {
       
    let commune_id = $(this).val();
    
    if (commune_id) {

        alert("Donnée non existant pour le moment");
        //alert('coucou');
        /*$.ajax({
            //alert('coucou');
            url: '/commune/' + commune_id,
            type: "GET",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function(data) {
                //console.log(data);
                if (data) {
                    /*$('#commune').empty();
                        $('#commune').focus;
                        $('#commune').append('<option value="">-- Selectionnez votre commune --</option>');
                        $.each(data, function(key, value) {
                        $('select[name="commune"]').append('<option value="' + key + '">' + value + '</option>');
                    });*/
                    
                //} else {
                    //$('#commune').empty();
                //}
           // }
        //});
        
    } else {
        //$('#commune').empty();
    }
});
});
