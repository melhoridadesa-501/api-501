<?
function barra_lateral{
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Menu lateral</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <!-- Barra lateral -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Menu
                    </a>
                </li>
                <li>
                    <a href="#">Opcao 1</a>
                </li>
                <li>
                    <a href="#">Opcao 2</a>
                </li>
                <li>
                    <a href="#">Opcao 3</a>
                </li>
                <li>
                    <a href="#">Opcao 4</a>
                </li>
                <li>
                    <a href="#">Opcao 5</a>
                </li>
                <li>
                    <a href="#">Opcao 6</a>
                </li>
                <li>
                    <a href="#">Contato</a>
                </li>
            </ul>
        </div>
        <input type="button" class="btn btn-info" id="menu-toggle" value="<<||>>"/>
    </div>
    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
<?
}
?>