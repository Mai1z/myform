
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My form</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Отлично!</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">Данные успешно сохранены</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="container col-6">
    <h1>My simple Form <b>v2</b></h1>
    <div class="alert alert-danger display-error" style="display: none">
    </div>
    <form action="" method="post" id="form">
        <div class="form-group">
            <label for="exampleInputName">Имя:</label>
            <input type="text" name="name" class="nameField form-control" id="exampleInputName">
        </div>
        <div class="form-group">
            <label for="exampleInputSurname">Фамилия:</label>
            <input type="text" name="surname" class="surnameField form-control" id="exampleInputSurname">
<!--            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
            <label for="exampleInputAge">Возраст:</label>
            <input type="text" name="age" class="ageField form-control" id="exampleInputAge">
        </div>
        <button type="submit" class="btn btn-success button">Сохранить</button>
    </form>
    <form action="google_sheets.php" method="post" class="form2">
        <button type="submit" class="btn btn-info button2">Выгрузить</button>
    </form>
</div>
</body>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="assets/script.js"></script>
</html>