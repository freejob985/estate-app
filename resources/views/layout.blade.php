<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Design with Side Navigation</title>

    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Material Design Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

    <!-- Material Design CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/13.0.0/material-components-web.min.css">

    <!-- Other CSS files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.0.19/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.2/css/mdb.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.tiny.cloud/1/no-api-key/tinymce/6.3.1/skins/ui/oxide/skin.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap');

        body {
            font-family: "Cairo", sans-serif;
        }

        /* Dark Mode */
        body.dark-mode {
            background-color: #333;
            color: #fff;
        }

        /* Side Navigation */
        .sidenav {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 0;
            right: 0;
            background-color: #fff;
            overflow-x: hidden;
            padding-top: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.16), 0 2px 10px rgba(0, 0, 0, 0.12);
        }

        .sidenav a {
            padding: 16px 32px 16px 16px;
            text-decoration: none;
            font-size: 16px;
            color: #333;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #3f51b5;
            background-color: #f1f1f1;
        }

        .sidenav i {
            margin-left: 10px;
        }

        /* Main Content */
        main {
            margin-right: 250px;
            padding: 20px;
        }

        /* Table */
        .table thead th {
            background-color: #3f51b5;
            color: #fff;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .sidenav {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidenav a {
                float: right;
            }

            main {
                margin-right: 0;
            }
        }


.sidenav a {
    direction: rtl;
    text-align: right;
    font-size: larger;
    font-weight: 500;
}

  body.dark-mode {
            background-color: #212121;
            color: #ffffff;
        }

        .dark-mode .sidenav {
            background-color: #303030;
        }

        .dark-mode .sidenav a {
            color: #ffffff;
        }

        .dark-mode .sidenav a:hover {
            background-color: #424242;
        }

        .dark-mode .table thead th {
            background-color: #424242;
            color: #ffffff;
        }

        .dark-mode .table-striped tbody tr:nth-of-type(odd) {
            background-color: #2e2e2e;
        }

        .dark-mode .table-hover tbody tr:hover {
            background-color: #3e3e3e;
        }
    </style>
</head>
<body>
    <!-- Side Navigation -->
    <nav class="sidenav mdc-elevation--z4">
        <a href="#"><i class="material-icons">home</i> الرئيسية</a>
        <a href="#"><i class="material-icons">settings</i> الإعدادات</a>
        <a href="#"><i class="material-icons">info</i> حول</a>
        <a href="#"><i class="material-icons">contact_mail</i> اتصل بنا</a>
     <a href="#" onclick="toggleDarkMode()"><i class="material-icons">contact_mail</i>  الوضع المظلم</a>
    </nav>

<style>

</style>

    <!-- Main Content -->
    <main>
        <h1>تصميم متجاوب مع القائمة الجانبية</h1>
        <table class="table table-striped table-hover">
            <!-- Table header -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم الأول</th>
                    <th>اسم العائلة</th>
                    <th>البريد الإلكتروني</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>جون</td>
                    <td>دو</td>
                    <td>john@example.com</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>جين</td>
                    <td>سميث</td>
                    <td>jane@example.com</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>بوب</td>
                    <td>جونسون</td>
                    <td>bob@example.com</td>
                </tr>
            </tbody>
        </table>
    </main>

    <!-- Material Design JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/13.0.0/material-components-web.min.js"></script>

    <!-- Other JavaScript files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.0.19/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.2/js/mdb.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6.3.1/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/7e1mldkbut3yp4tyeob9lt5s57pb8wrb5fqbh11d6n782gm7/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script>
        // Toggle Dark Mode
        function toggleDarkMode() {
            var body = document.body;
            body.classList.toggle("dark-mode");
        }
    </script>
</body>
</html>
