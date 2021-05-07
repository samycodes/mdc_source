$(document).on('submit', '.myForm', function(e) {
    e.preventDefault();
    $.ajax({
        url : $(this).attr('action'),
        data: new FormData($("#myForm")[0]),
        method : "POST",
        processData : false,
        contentType : false,
        success : function(data)
        {
            if(data.status=='successRedirect')
            {
               toastr.success(data.message);
               window.location.reload();
               window.location.href = data.redirect;
            }
            if(data.status=='success')
            {
               toastr.success(data.message);
            }
            if(data.status=='fail')
            {
                toastr.error(data.message);
            }
        },
        error:function(error){
            toastr.error(error.message);
         }

    });
});
