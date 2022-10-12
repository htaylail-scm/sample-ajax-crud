$(document).ready(function () {

    // to add new user
    $(document).on('click', '.addStaff', function (e) {
        e.preventDefault();
        $('#AddStaffModal').modal('show');
        var data = {
            'name': $('.name').val(),
            'email': $('.email').val(),
            'address': $('.address').val(),
            'phone': $('.phone').val(),
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        console.log("data");
        console.log(data);
        $.ajax({
            type: "POST",
            url: "/staff",
            data: data,
            dataType: "json",
            success: function (response) {
                console.log("success");
                console.log(response);
                $('#save_msgList').html("");
                $('#success_message').addClass('alert alert-success');
                $('#success_message').text(response.message);
                $('#AddStaffModal').find('input').val('');
                $('#AddStaffModal').modal('hide');
                // location.reload();
            },
            error: function (response) {
                var errorList = JSON.parse(response.responseText);
                console.log(errorList);
                console.log(response);
                if (response.status == 403) {
                    $('#save_msgList').addClass('alert alert-danger');
                    var childNodes = $("#save_msgList").children();
                    if (childNodes.length) {
                        $.each(errorList.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        childNodes.remove();
                    } else {
                        $.each(errorList.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                    }
                }
            }
           
        })
    })

   // to clean input field when click edit reset button
   $(document).on('click', '.resetCreateBtn', function (e) {
        e.preventDefault();
        $('.name').val('');
        $('.email').val('');
        $('.phone').val('');
    })


    $(document).on('click', '.editStaff', function (e) {
        e.preventDefault();
        var staff_id = $(this).val();
        console.log(staff_id);
        $('#EditStaffModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/staff/" + staff_id + "/edit",
            success: function (response) {
                console.log(response)
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#EditStaffModal').modal('hide');
                } else {
                    $('.name').val(response.staff.name);
                    $('.email').val(response.staff.email);
                    $('.address').val(response.staff.address);
                    $('.phone').val(response.staff.phone);
                }
            }
        });

    });


    // to update user
    $(document).on('click', '.updateStaff', function (e) {
        e.preventDefault();
        var id = $('#staff_id').val();
        console.log("staff id update")
        console.log(id)
        var data = {
            'name': $('#name').val(),
            'email':$('#email').val(),
            'address':$('#address').val(),
            'phone':$('#phone').val(),
        }
        console.log("update staff data",data);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "PUT",
            url: "/staff/" + id,
            data: data,
            dataType: "json",
            success: function (response) {
                $('#update_msgList').html("");
                $('#success_message').addClass('alert alert-success');
                $('#success_message').text(response.message);
                $('#EditStaffModal').find('input').val('');
                $('#EditStaffModal').modal('hide');
            },
            error: function(response){
                var updateError = JSON.parse(response.responseText);
                if (response.status == 422) {
                    $('#update_msgList').html("");
                    $('#update_msgList').addClass('alert alert-danger');
                    // to update errors list
                    var childNodes = $("#update_msgList").children();
                    if (childNodes.length) {
                        $.each(updateError.errors, function (key, err_value) {
                            $('#update_msgList').append('<li>' + err_value + '</li>');
                        });
                        childNodes.remove();
                    } else {
                        $.each(updateError.errors, function (key, err_value) {
                            $('#update_msgList').append('<li>' + err_value + '</li>');
                        });
                    }
                }
            }
        });
    });

    // to delete staff
    $(document).on('click', '.deleteStaff', function () {
        var id = $(this).val();
        console.log("delete id");
        console.log(id);
        // confirm("Are you sure want to delete staff");
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            type: "DELETE",
            url: "staff/"+ id,
            dataType: "json",
            data: {
                "id": id,
                "_token": token,
            },
            success: function (response) {
                console.log(response.message);
                $('#success_message').addClass('alert alert-success');
                $('#success_message').text(response.message);
            }
        });
    });

    
})
