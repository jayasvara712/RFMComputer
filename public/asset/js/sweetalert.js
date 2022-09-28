
function deleteData(btnID, idData, urlDelete, title) {
    $('#btndelete'+btnID).click(function (e) {
        //var deleteid = $("#_delte_jenis_id").val();

        swal({
                title: "Apakah anda yakin?",
                text: "Data "+title+" dan data yang berelasi akan terhapus sehingga tidak dapat dipulihkan kembali!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    //parameter ajax
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    var data = {
                        "_token": CSRF_TOKEN
                    };

                    //ajax call (ex. '/admin/jenis/ + id')
                    $.ajax({
                        type: "DELETE",
                        url: urlDelete + idData,
                        data: data,
                        dataType: 'json',
                        success: function (response) {
                            if(response.response_code == 200){
                                console.log(response.result);
                                swal(response.result, {
                                    icon: "success",
                                })
                                .then((result) => {
                                    location.reload();
                                });
                            }else{
                                console.log(response.response_code + " <==> Throw error <==> "+ response.error_message )
                            }
                        },
                        error: function (err,e) {
                            for(var x in err){
                                console.log(x + " <=> error index of <=> " + err[x])
                            }
                        }
                    });


                }
            });
    });
}
        
