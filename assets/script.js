
$(document).ready(function() {
    $(".button").bind("click", function() {

        var name = $('.nameField').val();
        var surname = $('.surnameField').val();
        var age = $('.ageField').val();

        // $('.nameField').val('');
        // $('.surnameField').val('');
        // $('.ageField').val('');

        $.ajax({
            url: "myform_db.php",
            type: "POST",
            data: {name: name, surname: surname, age: age}, // Передаем данные для записи
            dataType: "json",
            // success:
            success : function(data){
                if (data.code == "200"){
                    $("#myModal").modal('show');
                    $(".display-error").css("display","none");
                    $('.nameField').val('');
                    $('.surnameField').val('');
                    $('.ageField').val('');
                } else {
                    $(".display-error").html("<ul>"+data.msg+"</ul>");
                    $(".display-error").css("display","block");
                }
            }
        });
        return false;
    });
    $(".button2").bind("click", function() {

        $.ajax({
            url: "google_sheets.php",
            type: "POST",
            data: "", // Передаем данные для записи
            dataType: "json",
            success: window.open('https://docs.google.com/spreadsheets/d/1GYMw9bzYBQan8_MPjeOmm0GdR1QX17fBAtfqC7PJNcw/edit#gid=0')
        });
        return false;
    });
});