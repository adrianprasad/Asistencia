<?php
require_once('env.php');
require_once('core/db-framework.php');
require_once('core/db-connection.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Asistencia | View Attendance</title>
        <?php require_once('common/header.php'); ?>
        <?php require_once('common/datatable.php'); ?>
    </head>
    <body>
        <?php
            $nav_bar = [
                "title" => "View Attendance",
                "content" => "Get attendance from server",
                "back-link" => "index.php",
            ];
            require_once('common/nav-bar.php');
        ?>

        <div class="page-container uk-flex uk-flex-center">
            <div class="form-status-card uk-width-1-1 hide-in-desktop-block animate__animated animate__fadeInUp">
                <div uk-grid class="uk-grid-small">
                    <div class="uk-width-auto uk-flex uk-flex-middle">
                        <button class="info-icon"><i class="icon-alert-triangle"></i></button>
                    </div>
                    <div class="uk-width-expand">
                        <h3>Please use desktop</h3>
                        <p>Open via a pc to continue</p>
                    </div>
                </div>
            </div>

            <div class="view-page-inner animate__animated animate__fadeInUp hide-in-mobile-block">
                <div class="form-table-filter-container">
                    <form action="view-attendance.php" method="GET">
                        <div uk-grid>
                            <div class="uk-width-expand">
                                <legend class="uk-margin-top">Pick department</legend>
                                <select required name="department" class="uk-select form-select">
                                    <option value="" disabled selected>Select a department</option>
                                    <?php require('model/department.php'); ?>
                                </select>
                            </div>
                            <div class="uk-width-expand">
                                <legend class="uk-margin-top">Pick date</legend>
                                <input type="date" value="<?php echo $_GET['date']; ?>" autocomplete="off" required name="date" class="form-select uk-width-1-1"/>
                            </div>
                            <div class="uk-width-expand">
                                <legend class="uk-margin-top">Pick year</legend>
                                <select value="" required name="year" class="uk-select form-select">
                                    <option disabled selected>Select a year</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="uk-width-auto">
                                <input class="form-submit" type="submit" value="search">
                            </div>
                        </div>
                    </form>
                </div>

                <?php if(isset($_GET["date"]) && isset($_GET["year"]) && isset($_GET["department"])){ ?>
                    <div class="form-table-card">
                        <div class="data-table">
                            <table id="table">
                                <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th>Year</th>
                                        <th>Hour</th>
                                        <th>Absenties List</th>
                                        <th>Staff Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $query = "SELECT  
                                                attendace_list.id,
                                                attendace_list.department department,
                                                attendace_list.staff_id staff_id,
                                                TIME(attendace_list.timestamp) time,
                                                DATE(attendace_list.timestamp) date,
                                                staff_list.name staff_name,
                                                attendace_list.absent_list absent_list,
                                                attendace_list.year year,
                                                attendace_list.hour hour
                                            FROM attendace_list attendace_list 
                                            INNER JOIN staff_list staff_list
                                                ON attendace_list.staff_id = staff_list.id
                                            WHERE 
                                                DATE(attendace_list.timestamp) = '{$_GET['date']}' AND
                                                attendace_list.year = '{$_GET['year']}' AND
                                                department = '{$_GET['department']}'";

                                    $users = $db_connection->rawQuery($query);
                                    foreach ($users as $user) {
                                        echo "
                                                <tr>
                                                    <td>{$user['department']}</td>
                                                    <td>{$user['year']}</td>
                                                    <td>{$user['hour']}</td>
                                                    <td>{$user['absent_list']}</td>
                                                    <td>{$user['staff_name']}</td>
                                                    <td>{$user['date']}</td>
                                                    <td>{$user['time']}</td>
                                                </tr>
                                        ";
                                    }

                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php require('common/footer.php'); ?>
    </body>
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
            <?php if(isset($_GET["date"]) && isset($_GET["year"]) && isset($_GET["department"])){ ?>
                $("select[name=department]").val("<?php echo $_GET['department']; ?>");
                $("select[name=year]").val("<?php echo $_GET['year']; ?>");
            <?php } ?>
        } );
    </script>
</html>