<?php
require_once('env.php');
require_once('core/db-framework.php');
require_once('core/db-connection.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Asistencia | Add Attendance</title>
        <?php require_once('common/header.php'); ?>
    </head>
    <body>
        <?php
            $nav_bar = [
                "title" => "Add Attendance",
                "content" => "Upload attendance to server",
                "back-link" => "index.php",
            ];
            require_once('common/nav-bar.php');
        ?>

        <div class="page-container uk-flex uk-flex-center">
            <div class="form-container animate__animated animate__fadeInUp">
                <?php if(isset($_GET["status"])){
                        if($_GET["status"]=="done"){ ?>
                    
                    <div class="form-status-card animate__animated animate__zoomIn animate__delay-1s">
                        <div uk-grid class="uk-grid-small">
                            <div class="uk-width-auto uk-flex uk-flex-middle">
                                <button class="info-icon"><i class="icon-check"></i></button>
                            </div>
                            <div class="uk-width-expand">
                                <h3>Attendance created</h3>
                                <p>Attendance added successfully</p>
                            </div>
                        </div>
                    </div>

                <?php } else if($_GET["status"]=="error"){ ?>

                    <div class="form-status-card">
                        <div uk-grid class="uk-grid-small">
                            <div class="uk-width-auto uk-flex uk-flex-middle">
                                <button class="info-icon"><i class="icon-alert-triangle"></i></button>
                            </div>
                            <div class="uk-width-expand">
                                <h3>Something went wrong</h3>
                                <p>Attendance cannot be added</p>
                            </div>
                        </div>
                    </div>

                <?php } 
                } ?>
                <form action="core/api-add-attendance.php" method="POST" onsubmit="return checkForm();">
                    <legend>Pick staff</legend>
                    <select autocomplete="off" required name="staff-id" class="uk-select form-select">
                        <option value="" disabled selected>Select a staff</option>
                        <?php
                            $cols_needed = Array("id", "name");
                            $staff_list = $db_connection->get("staff_list", null, $cols_needed);
                            if ($db_connection->count > 0){
                                foreach ($staff_list as $staff) { 
                                    echo "<option value='{$staff['id']}'>{$staff['name']}</option>";
                                }
                            }
                        ?>
                    </select>

                    <legend class="uk-margin-top">Pick department</legend>
                    <select autocomplete="off" required name="department" class="uk-select form-select">
                        <option value="" disabled selected>Select a department</option>
                        <?php require('model/department.php'); ?>
                    </select>

                    <legend class="uk-margin-top">Select year</legend>
                    <div class="uk-child-width-1-2 uk-child-width-1-4@m uk-grid-small" uk-grid>
                        <div>
                            <div class="form-radio"><input value="1" autocomplete="off" class="uk-radio" type="radio" name="year" required> First</div>
                        </div>
                        <div>
                            <div class="form-radio"><input value="2" autocomplete="off" class="uk-radio" type="radio" name="year"> Second</div>
                        </div>
                        <div>
                            <div class="form-radio"><input value="3" autocomplete="off" class="uk-radio" type="radio" name="year"> Third</div>
                        </div>
                    </div>

                    <legend class="uk-margin-top">Pick hour</legend>
                    <select autocomplete="off" required name="hour" class="uk-select form-select">
                        <option value="" disabled selected>Select a hour</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>

                    <legend class="uk-margin-top">Pick absenties</legend>

                    <div class="form-absenties-list-container">
                        <div class="uk-child-width-1-4 uk-child-width-1-5@s uk-child-width-1-6@m uk-grid-small" uk-grid>
                            <?php for($i=1; $i<=50; $i++) {
                                echo "
                                    <div>
                                        <button type='button' onclick='addToAbList(this);' class='form-absenties-list-btn'>{$i}</button>
                                    </div>
                                ";
                            }?>
                        </div>
                    </div>

                    <legend class="uk-margin-top">Check absenties</legend>
                    <textarea name="absent-list" readonly autocomplete="off" class="form-absenties-list uk-width-1-1" value=""></textarea>
                    
                    <input class="form-submit uk-margin-medium-top" type="submit" value="submit">
                </form>
            </div>
        </div>
        <?php require('common/footer.php'); ?>
    </body>
    <script>
        var currentAbsentList = "";

        function addToAbList(e){
            var absentListElem = $("textarea[name=absent-list]")[0];

            if(!$(e).hasClass('active')){
                $(e).addClass('active');
                currentAbsentList += `#${e.innerText}#,`;
            }
            else{
                $(e).removeClass('active');
                currentAbsentList = currentAbsentList.replace(`#${e.innerText}#,`, "");
            }

            absentListElem.value = convertAbToReadable(currentAbsentList);
        }

        function convertAbToReadable(list){
            var returnList = list;
            returnList = returnList.split("#").join("");
            returnList = returnList.substring(0, returnList.length - 1);
            returnList = returnList.split(",").sort(function(a, b){return a - b;}).join(",");
            returnList = returnList.split(",").join(", ");
            return returnList;
        }

        function checkForm(){
            if(currentAbsentList==""){
                return confirm("Are you sure that every on this class is present?");
            }
            else return confirm("Are you want submit this attendance?");
        }
    </script>
</html>