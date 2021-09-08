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
                        $('#commune_1').empty();
                        $('#commune_2').empty();
                        $('#region').focus;
                        $('#region').append(
                            '<option value="">-- Selectionnez votre region --</option>');
                        $.each(data, function(key, value) {
                            $('select[name="region"]').append(
                                '<option value="' + key + '">' + value
                                 + '</option>');
                        });
                    } else {
                        $('#region').empty();
                        $('#province').empty();
                        $('#commune_1').empty();
                        $('#commune_2').empty();

                    }
                }
            });
            
        } else {
            $('#region').empty();
            $('#province').empty();
            $('#commune_1').empty();
            $('#commune_2').empty();

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
                       $('#commune_1').empty();
                       $('#commune_2').empty();
                       $('#province').focus;
                       $('#province').append(
                           '<option value="">-- Selectionnez votre province --</option>');
                       $.each(data, function(key, value) {
                           $('select[name="province"]').append(
                               '<option value="' + key + '">' + value
                                + '</option>');
                       });
                   } else {
                       $('#province').empty();
                       $('#commune').empty();

                   }
               }
           });
           
       } else {
           $('#province').empty();
           $('#commune_1').empty();
           $('#commune_2').empty();

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
                       $('#commune_1').empty();
                       $('#commune_1').focus;
                       $('#commune_1').append(
                           '<option value="">-- Selectionnez votre commune --</option>');
                       $.each(data, function(key, value) {
                           $('select[name="commune_1"]').append(
                               '<option value="' + key + '">' + value
                                + '</option>');
                       });
                   } else {
                       $('#commune_1').empty();
                   }

                   if (data) {
                    $('#commune_2').empty();
                    $('#commune_2').focus;
                    $('#commune_2').append(
                        '<option value="">-- Selectionnez votre commune --</option>');
                    $.each(data, function(key, value) {
                        $('select[name="commune_2"]').append(
                            '<option value="' + key + '">' + value
                             + '</option>');
                    });
                } else {
                    $('#commune_2').empty();
                }
               }
           });
           
       } else {
           $('#commune_1').empty();
           $('#commune_2').empty();
       }
   });

   $('#commune').on('change', function() {
       
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
