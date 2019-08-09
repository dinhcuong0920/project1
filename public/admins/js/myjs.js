<script type="text/javascript">
                $(document).ready(function () {
                    //add a new user
                    $("#form-add").submit(function (e) {
                        e.preventDefault();
                        var url = $(this).attr('data-url');
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: {
                                email: $('#email').val(),
                                password: $('#password').val(),
                                full: $('#fullname').val(),
                                address: $('#address').val(),
                                phone: $('#telephone').val(),
                                level: $('#level').val(),
                            },
                            success: function (response) {
                                $('#modal-add').modal('hide');
                                $('tbody').prepend(`
                                        <tr id="tr--`+response.data.id+`">
                                            <td id="--`+response.data.id+`">`+response.data.id+`</td>
                                            <td id="email--`+response.data.id+`">`+response.data.email+`</td>
                                            <td id="full--`+response.data.id+`">`+response.data.full+`</td>
                                            <td id="address--`+response.data.id+`">`+response.data.address+`</td>
                                            <td id="phone--`+response.data.id+`">`+response.data.phone+`</td>
                                            <td id="level--`+response.data.id+`">`+ response.data.level+`</td>
                                            <td>
                                                <button  data-url="{{ route('users.show','') }}/`+response.data.id+`" class='btn btn-warning edit-user' ><i class='fa fa-pencil'
                                                        aria-hidden='true'></i> Sửa</button>
                                                <button data-url="{{ route('users.show','') }}/`+response.data.id+`" class='btn btn-danger delete-user'><i class='fa fa-trash'
                                                        aria-hidden='true'></i> Xóa</button>
                                            </td>
                                        </tr>`);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {}
                        });
                    });
                    //show user
                    $(".edit-user").click(function(e){
                        e.preventDefault();
                        var url = $(this).attr('data-url');
                        $('#modal-edit').modal('show');
                        $.ajax({
                            type: "get",
                            url: url,
                            success: function (response) {
                                $('#email-edit').val(response.data.email);
                                $('#fullname-edit').val(response.data.full);
                                $('#address-edit').val(response.data.address);
                                $('#telephone-edit').val(response.data.phone);
                                $('#level-edit').val(response.data.level);
                                $('#form-edit').attr('data-url','{{ route('users.update','')}}/'+response.data.id)
                            }
                        });
                    });
                    //edit user
                    $('#form-edit').submit(function(e){
                        e.preventDefault();
                        var url = $(this).attr('data-url');
                        $.ajax({
                            type: "put",
                            url: url,
                            data: {
                                email: $('#email-edit').val(),
                                full: $('#fullname-edit').val(),
                                address: $('#address-edit').val(),
                                phone: $('#telephone-edit').val(),
                                level: $('#level-edit').val(),
                            },
                            success: function (response) {
                                $('#modal-edit').modal('hide');
                                $('#--'+response.userid).text(response.infouser.id);
                                $('#email--'+response.userid).text(response.infouser.email);
                                $('#full--'+response.userid).text(response.infouser.full);
                                $('#phone--'+response.userid).text(response.infouser.phone);
                                $('#address--'+response.userid).text(response.infouser.address);
                                $('#level--'+response.userid).text(response.infouser.level);
                            }
                        });
                    })
                    //delete-user
                    $('.delete-user').click(function(e){
                        e.preventDefault();
                        $('#modal-delete').modal('show');
                        var url = $(this).attr('data-url');
                        $.ajax({
                            type: "get",
                            url: url,
                            success: function (response) {
                                console.log(response.data);
                                $('#userdelete').text(response.data.full);
                                $('#form-delete').attr('data-url','{{ route('users.destroy','')}}/'+response.data.id)
                            }
                        });
                    })
                    $('#form-delete').submit(function(e){
                        e.preventDefault();
                        $('#modal-delete').modal('hide');
                        var url = $(this).attr('data-url');
                        $.ajax({
                            type: "delete",
                            url: url,
                            success: function (response) {
                                $('#tr--'+response.userid).remove();
                            }
                        });
                        
                    })
                    //search user
                    $('.search-user').keyup(function (e) { 
                        e.preventDefault();
                        var key = $(this).val();
                        $.ajax({
                            type: "get",
                            url: "",
                            data: [
                                key:key
                            ],
                            success: function (response) {
                                
                            }
                        });
                    });
                });
</script>