
$(document).ready(function() {

    $(".button").bind("click", function() {
        $("#form").validate({
            rules:{
                name:{
                    required: true,
                    maxlength: 16,
                },
                surname:{
                    required: true,
                    maxlength: 16,
                },
                age:{
                    required: true,
                    minlength: 1,
                    maxlength: 3,
                    digits: true
                }
            },
            messages:{
                name:{
                    required: "Это поле обязательно для заполнения",
                    maxlength: "Максимальное число символов - 16",
                },
                surname:{
                    required: "Это поле обязательно для заполнения",
                    maxlength: "Максимальное число символов - 16",
                },
                age:{
                    required: "Это поле обязательно для заполнения",
                    maxlength: "Максимальное число символов - 3",
                    digits: "Введите числовое значение",
                },
            },
            submitHandler: function(form) {
                var name = $('.nameField').val();
                var surname = $('.surnameField').val();
                var age = $('.ageField').val();

                $('.nameField').val('');
                $('.surnameField').val('');
                $('.ageField').val('');

                $.ajax({
                    url: "myform_db.php",
                    type: "POST",
                    data: {name: name, surname: surname, age: age}, // Передаем данные для записи
                    dataType: "json",
                    success: $("#myModal").modal('show')
                });
                return false;
            }
        });
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