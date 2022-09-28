$(document).ready(() => {
    SelectBarang();

    var table2 = document.getElementById("table-2c")
    if(table2)
    {
        $('#table-2c').DataTable( {
            paging: true
        } );
    }

    var successElement = document.getElementById("success");
    var failElement = document.getElementById("error");
    if(successElement){
        swal({
            text: successElement.innerHTML,
            icon: "success",
        });
    } else if (failElement) {
        swal({
            text: failElement.innerHTML,
            icon: "error",
        });
    }
});


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
        


//preview image
function previewImage() {
    const image = document.querySelector("#image");
    const imgPreview = document.querySelector(".img-preview");

    imgPreview.style.display = "block";

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };
}

//select barang 
function SelectBarang(tipe) {
    var barangObj = document.getElementById("id_barang");
    var barangObjvalue ="";
    if (barangObj) {
        if (tipe == "tambah") {
            barangObjvalue = barangObj.options[barangObj.selectedIndex].value;
        } else if (tipe == "edit") {
            barangObjvalue = barangObj.value;
        }

        if (barangObjvalue != null && barangObjvalue!="" && barangObjvalue!=undefined) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:'POST',
                url: "/ajaxRequest/" + barangObjvalue,
                dataType:"JSON",
                data: {
                    _token: CSRF_TOKEN
                },
                success:function(data){
                    // alert(data.success);
                    document.getElementById("jumlah_stok").value = data.stok;
                },
                error: function (jqXHR, exception) {
                    console.log(jqXHR.responseText)
                    alert("Stok Tidak Tersedia!");
                    document.getElementById("jumlah_stok").value = 0;
                }
            });  
        }
    }
}

//select barang 
function SelectBarangEdit() {
    var barangObj = document.getElementById("id_barang");
    
    if (barangObj) {
        var barangObjvalue = barangObj.value;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:'POST',
            url: "/ajaxRequest/" + barangObjvalue,
            dataType:"JSON",
            data: {
                _token: CSRF_TOKEN
            },
            success:function(data){
                // alert(data.success);
                document.getElementById("jumlah_stok").value = data.stok;
            },
            error: function (jqXHR, exception) {
                console.log(jqXHR.responseText)
                alert("Stok Tidak Tersedia!");
                document.getElementById("jumlah_stok").value = 0;
            }
        });  
    }
}

//count total barang + edit
function total_barang_masuk() {
    let x = parseInt(document.getElementById("jumlah_stok").value);
    let y = parseInt(document.getElementById("jumlah_masuk").value);
    let total = '';
    if (y<1) {
        document.getElementById("jumlah_masuk").value = 1;
        swal({
            text: "Jumlah Stok Masuk Tidak Sesuai!  ",
            icon: "error",
        });
    } else {
        total = x+y;
        document.getElementById("total_stok").value = total;
    }
    
}

function total_barang_keluar() {
    let x = parseInt(document.getElementById("jumlah_stok").value);
    let y = parseInt(document.getElementById("jumlah_keluar").value);
    let total = '';
    if (y<1) {
        document.getElementById("jumlah_keluar").value = 1;
        swal({
            text: "Jumlah Stok Keluar Tidak Sesuai!  ",
            icon: "error",
        });
    } else if (y>x) {
        document.getElementById("jumlah_keluar").value = 1;
        swal({
            text: "Jumlah Stok Keluar Tidak Boleh Melebihi Stock!  ",
            icon: "error",
        });
    } else {
        total = x-y;
        document.getElementById("total_stok").value = total;
    }
    
}

function edit_total_barang_masuk() {
    let x = parseInt(document.getElementById("jumlah_stok").value);
    let y = parseInt(document.getElementById("jumlah_masuk").value);
    let z = parseInt(document.getElementById("old_stok").value);
    let total = '';
    let jumlah_stok = '';
    if (y < 1) {
        y = 1;
        swal({
            text: "Jumlah Barang Masuk Tidak Sesuai!  ",
            icon: "error",
        });
    } else {
        // total = x + y;
        jumlah_stok = (x-z) + y;
        // document.getElementById("total_stok").value = total;
        document.getElementById("total_stok").value = jumlah_stok;
    }
    
}

function edit_total_barang_keluar() {
    let x = parseInt(document.getElementById("jumlah_stok").value);
    let y = parseInt(document.getElementById("jumlah_keluar").value);
    let z = parseInt(document.getElementById("old_stok").value);
    let total = '';
    let jumlah_stok = '';
    if (y <1) {
        document.getElementById("jumlah_keluar").value = 1;
        swal({
            text: "Jumlah Stok Keluar Tidak Sesuai!  ",
            icon: "error",
        });
    } else if (y>z) {
        document.getElementById("jumlah_keluar").value = 1;
        swal({
            text: "Jumlah Barang Keluar Tidak Boleh Melebihi Stock!  ",
            icon: "error",
        });
    }else {
        // total = x + y;
        jumlah_stok = (x+z) - y;
        // document.getElementById("total_stok").value = total;
        document.getElementById("total_stok").value = jumlah_stok;
    }
}

//filter hari / bulanan
function showVal()
{
    var x = document.getElementById("pilihan").value;
    var y = document.getElementById("pilhari");
    var z = document.getElementById("pilbulan");
    if (x == "hari") {
        z.classList.add("pilihan");
        y.classList.remove("pilihan");
    } else if (x == "bulan") {
        z.classList.remove("pilihan");
        y.classList.add("pilihan");
    }
}

function showVal2()
{
    var x = document.getElementById("pilihan2").value;
    var y = document.getElementById("pilhari2");
    var z = document.getElementById("pilbulan2");
    if (x == "hari") {
        z.classList.add("pilihan");
        y.classList.remove("pilihan");
    } else if (x == "bulan") {
        z.classList.remove("pilihan");
        y.classList.add("pilihan");
    }
}

function logout()
{
    swal({
        title: "Apakah anda yakin?",
        text: "Apakah anda yakin ingin keluar dari sistem ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
            
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById("logout").submit();
                }
            });

    // document.getElementById("logout").submit();
}

// function jaya (e) {
//           e.preventDefault();
// var form = $(this);
// alert("form");
// }