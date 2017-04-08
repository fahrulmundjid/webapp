    var url = "http://localhost:8000/webuserajaxCRUD";
    //display modal form for Webuser editing
    $(document).on('click','.open_modal',function(){
        var webuser_id = $(this).val();
        
        $.get(url + '/' + webuser_id, function (data) {
            //success data
            console.log(data);
            $('#webuser_id').val(data.id);
            $('#nama').val(data.nama);
            $('#alamat').val(data.alamat);
            $('#btn-save').val("update");
            $('#myModal').modal('show');
           
        }) 
    });
    //display modal form for creating new Webuser
    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmWebusers').trigger("reset");
        $('#myModal').modal('show');
    });
    //delete Wbuser and remove it from list
    $(document).on('click','.delete-webuser',function(){
        var webuser_id = $(this).val();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            type: "DELETE",
            url: url + '/' + webuser_id,
            success: function (data) {
                console.log(data);
                $("#webuser" + webuser_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    //create new webuser / update existing webuser
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault(); 
        var formData = {
            nama: $('#nama').val(),
            alamat: $('#alamat').val(),
        }
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var webuser_id = $('#webuser_id').val();;
        var my_url = url;
        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + webuser_id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var webuser = '<tr id="webuser' + data.id + '"><td>' + data.id + '</td><td>' + data.nama + '</td><td>' + data.alamat + '</td>';
                webuser += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Edit</button>';
                webuser += ' <button class="btn btn-danger btn-delete delete-webuser" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add"){ //if user added a new record
                    $('#webusers-list').append(webuser);
                }else{ //if user updated an existing record
                    $("#webuser" + webuser_id).replaceWith( webuser );
                }
                $('#frmWebusers').trigger("reset");
                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });