<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>БД</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link href="/bd_app/assets/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="no-gutters">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/db_app/appeals">Жалобы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/db_app/doctors">Врачи</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/db_app/hour_receptions">Часы приема</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/db_app/medicines">Лекарства</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/db_app/patients">Пациенты</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/db_app/patient_receptions">Приемы пациентов</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/db_app/registrar">Регистраторы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/db_app/sales">Акции</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/db_app/services">Услуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/db_app/users">Пользователи</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/db_app/user_roles">Роли пользователей</a>
                        </li>



                    </ul>
                    <!--<form class="form-inline my-2 my-lg-0" action="search">
                        <input class="form-control mr-sm-2" name="q" type="search" placeholder="Поиск" value="<?=empty($_GET['q']) ? '' : $_GET['q'] ?>" aria-label="Поиск">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg></button>
                    </form>-->
                </div>
            </nav>
        </div>
    </div>
    <br>
    <br>

</div>
<div class="container">