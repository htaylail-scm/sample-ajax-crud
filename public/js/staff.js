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
                location.reload();
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
            url: "/staff/" + staff_id,
            success: function (response) {
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#EditStaffModal').modal('hide');
                } else {
                    $('#name').val(response.staff.name);
                    $('#email').val(response.staff.email);
                    $('#address').val(response.staff.address);
                    $('#phone').val(response.staff.phone);
                }
            }
        });

    });
})
