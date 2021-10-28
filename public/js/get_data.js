

function show(btn) {
    console.log('Button id:',btn.id);
    $.ajax({
        //alert('coucou');
        url: '/datas/' + btn.id,
        type: "GET",
        data: {
            "_token": "{{ csrf_token() }}"
        },
        dataType: "json",
        success: function(data) {
            console.log('data: ' + data + 'slug: '+ commune.slug1);
            //var response = JSON.parse(data);
            //console.log(response);
            if (data) {
                
            } else {
                

            }
        }
    });
  }
/*$(document).ready(function() {
    
    $('.data').on('click', function() {
       
        //let country_id = $(this).val();
        let country_id = $(this).id;
        
        alert('good !' + country_id)
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
                        $('#region').append(
                            '<option value="">-- Sélectionnez votre région --</option>');
                        $.each(data, function(key, value) {
                            $('select[name="region"]').append(
                                '<option value="' + key + '">' + value
                                 + '</option>');
                        });
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


});*/
