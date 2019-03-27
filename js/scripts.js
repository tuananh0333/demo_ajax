$(document).ready(function () {

    $.ajax({
        // type: "GET",
        url: "http://localhost/ajax-1/contact.php" , success: function(result){
        $data = JSON.parse(result);
        // console.log($data);
        $('#comments li').remove();
        $data.map(function(index,value){
            $('#comments').prepend(`<li>${index.email} : ${index.message}</li>`);
        });
    }});

    $("form").submit(function (e) {
        //prevent submit form
        e.preventDefault();
        
        //get data form contact
        var contact = {
            id: 1,//TODO: create hidden field in form
            name: $('#name').val(),
            email: $('#email').val(),
            subject: $('#subject').val(),
            message: $('#message').val(),
        };

         $.ajax({
            type: "GET",
            data: contact,
            url: "http://localhost/ajax-1/contact.php" , success: function(result){
            $data = JSON.parse(result);
            // console.log($data);

            $('#comments li').remove();
            $data.map(function(index,value){
                $('#comments').prepend(`<li>${index.email} : ${index.message}</li>`);
            });
        }});
    });
});
