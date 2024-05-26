<!DOCTYPE html>
<html>
    <head>
        <title>Asistencia</title>
        <?php require_once('common/header.php'); ?>
        <?php require_once('common/datatable.php'); ?>
    </head>
    <body class="homepage">
        <div class="nav-bar uk-box-shadow-medium uk-flex uk-flex-center uk-flex-middle animate__animated animate__slideInDown">
            <div>
                <img class="logo uk-align-center" src="images/logo_animated.png">
                <h3 class="animate__animated animate__fadeInUp">Asistencia</h3>
                <p class="animate__animated animate__fadeInDown">Pick a choice to continue</p>
            </div>
        </div>
        <div class="page-container uk-flex uk-flex-center">
            <div>
                <div uk-grid class="animate__animated animate__fadeInUp">
                    <div>
                        <div class="link-card" href="add-attendance.php">
                            <img src="images/create.png">
                            <h3>Add Attendace</h3>
                            <p>Create new attendace report and upload it to server</p>
                            <a>continue</a>
                        </div>
                    </div>
                    <div>
                        <div class="link-card" href="view-attendance.php">
                            <img src="images/view.png">
                            <h3>View Attendace</h3>
                            <p>View and manipulate already uploaded attendace reports</p>
                            <a>continue</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require('common/footer.php'); ?>
    </body>
    <script>
        
    </script>
</html>