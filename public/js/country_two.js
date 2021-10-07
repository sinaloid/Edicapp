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
                        $('#region_2').empty();
                        $('#province_2').empty();
                        $('#commune_2').empty();
                        $('#region_2').focus;
                        $('#region_2').append(
                            '<option value="">-- Sélectionnez votre région --</option>');
                        $.each(data, function(key, value) {
                            $('select[name="region_2"]').append(
                                '<option value="' + key + '">' + value
                                 + '</option>');
                        });
                    } else {
                        $('#region_2').empty();
                        $('#province_2').empty();
                        $('#commune_3').empty();
                        $('#commune_4').empty();

                    }
                }
            });
            
        } else {
            $('#region_2').empty();
            $('#province_2').empty();
            $('#commune_3').empty();
            $('#commune_4').empty();

            $('#region').empty();
            $('#province').empty();
            $('#commune').empty();

        }
    });

    $('#region_2').on('change', function() {
       
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
                       $('#province_2').empty();
                       $('#commune_3').empty();
                       $('#commune_4').empty();
                       $('#province_2').focus;
                       $('#province_2').append(
                           '<option value="">-- Sélectionnez votre province --</option>');
                       $.each(data, function(key, value) {
                           $('select[name="province_2"]').append(
                               '<option value="' + key + '">' + value
                                + '</option>');
                       });
                   } else {
                       $('#province_2').empty();
                       $('#commune_3').empty();
                        $('#commune_4').empty();

                   }
               }
           });
           
       } else {
           $('#province_2').empty();
           $('#commune_3').empty();
           $('#commune_4').empty();

       }
   });

   $('#province_2').on('change', function() {
       
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
                       $('#commune_3').empty();
                       $('#commune_3').focus;
                       $('#commune_3').append(
                           '<option value="">-- Sélectionnez votre commune --</option>');
                       $.each(data, function(key, value) {
                           $('select[name="commune_3"]').append(
                               '<option value="' + key + '">' + value
                                + '</option>');
                       });
                   } else {
                       $('#commune_3').empty();
                   }

                   if (data) {
                    $('#commune_4').empty();
                    $('#commune_4').focus;
                    $('#commune_4').append(
                        '<option value="">-- Sélectionnez votre commune --</option>');
                    $.each(data, function(key, value) {
                        $('select[name="commune_4"]').append(
                            '<option value="' + key + '">' + value
                             + '</option>');
                    });
                } else {
                    $('#commune_4').empty();
                }
               }
           });
           
       } else {
           $('#commune_3').empty();
           $('#commune_4').empty();
       }
   });

   $('#commune_2').on('change', function() {
       
    let commune_id = $(this).val();
    
    if (commune_id) {

        //alert("Donnée non existant pour le moment");
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
                        $('#commune').append('<option value="">-- Sélectionnez votre commune --</option>');
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
