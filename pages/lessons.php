<?php 
    include_once("inc/functions.php");
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $userID = $_GET['userID'];
        $courseName = $_GET['courseName'];
        $courseID = $_GET['courseID'];
        $userName = getUserName($userID);
        $allLessons = displayLessons($courseID);
    }
?>
<div id="lessonContainer" class="main_container w-100 overflow-auto" style="height:100vh;">
    <a href="index.php?page=home&userID=<?=$userID?>"><button class="btn btn-danger m-3"><i class="fa fa-angle-double-left"></i>Back</button></a>
    <div class="p-3 mx-auto col-xs-9 col-sm-9 col-md-8 col-lg-6 col-xl-5">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                <?=$courseName;?>
            </a>
            <?php foreach($allLessons as $lesson):;?>
            <div class="list-group-item list-group-item-action d-flex justify-content-around">
                <!-- lesson title -->
                <a href="index.php?page=noted&lessonName=<?=$lesson['title']?>&lessonID=<?=$lesson['lessonID']?>&courseID=<?=$courseID?>&courseName=<?=$courseName?>&userID=<?=$userID?>&isSubmit=" style="width:30%" class="text-decoration-none text-dark overflow-hidden text-truncate"><?= $lesson['title']?></a>
                <!-- lesson date -->
                <a href="#" style="width:30%" class=" text-decoration-none text-dark"><?= $lesson['date']?></a>
                <div class="btnAction" style="width:10%">
                    <!-- btn edit lesson -->
                    <a href="process/lessons_crud/edit_lesson.php?courseName=<?=$courseName?>&userID=<?=$userID?>&courseID=<?=$courseID?>&lessonID=<?=$lesson['lessonID']?>" class='btnEditLesson fa fa-edit text-primary btnEdits text-decoration-none'></a>
                    <!-- btn delete lesson -->
                    <a href="process/lessons_crud/delete_lesson.php?userID=<?= $userID;?>&courseID=<?= $courseID;?>&courseName=<?= $courseName;?>&lessonID=<?= $lesson['lessonID'];?>" class='fa fa-trash text-danger text-decoration-none'></a>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div id="formCreateNewLesson">
            <form action="process/lessons_crud/create_lesson.php" method="POST" class="border border-primary rounded p-3 mt-3 bg-white">
                <input type="hidden" name = "userID" value = "<?= $userID;?>">
                <input type="hidden" name = "courseID" value = "<?= $courseID;?>">
                <input type="hidden" name = "courseName" value = "<?= $courseName;?>">
                <div class="form-group">
                    <img class="mx-auto d-block" src="assets/images/lessonImg/lesson_logo.png" alt="logo" style="width:60px;height:60px;">
                </div>
                <div class="form-group">
                    <input id="lessonName" type="text" class="form-control" name="title" placeholder ="Lesson name" required>
                </div>
                <div class="form-group">
                    <input id="LessonDate" type="date" class="form-control" name="date" > 
                </div>
                <div class="form-group d-flex justify-content-around">
                    <button type="submit" class="btn btn-primary" id="btnAddSubmitToAddLesson">Create</button>
                    <button class="btn btn-primary" id="btnToCancelToCreateNewLesson">Cancel</button>
                </div>
            </form>
        </div>
        <button id="btnAddNewLesson" class="btn btn-success">Add+</button>
    </div>
</div>