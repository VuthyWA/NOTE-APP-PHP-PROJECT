
<?php 
  include_once("inc/functions.php");
  if($_SERVER['REQUEST_METHOD'] =='GET'){
    $userID = $_GET['userID'];
    $allCourses = getAllCourses($userID);
  }
?>
<div class="main_container w-100">
  <div class="mx-auto w-75">
    <div id="courseContainer" class="list-group mt-1 mb-1  ">
      <?php foreach ($allCourses as $course):;?>
      <div class="list-group-item list-group-item-action d-flex justify-content-around">
        <!-- link to lessons.php -->
        <div class="w-50 overflow-hidden text-truncate p-1">
          <a class="courses​​​​​" href="index.php?page=lessons&userID=<?=$userID;?>&courseID=<?=$course['courseID']?>&courseName=<?= $course['title'];?>"><?= $course['title'];?></a>
        </div>
        <div class="w-25 d-flex justify-content-end p-1">
          <a href="#"><?= $course['date'];?></a>
        </div>
        <div class="btnAction w-25 d-flex justify-content-end p-1">
          <a href="process/course_crud/edit_course.php?userID=<?=$userID;?>&courseID=<?=$course['courseID']?>" class='fa fa-edit text-primary btnEdits m-1'></a>
          <a href="process/course_crud/delete_course.php?userID=<?=$userID;?>&courseID=<?=$course['courseID']?>" class='fa fa-trash text-danger m-1'></a>
        </div>
      </div>
      <?php endforeach;?>
    </div>
    <div id="formAddCourse" class="w-100 rounded border border-primary p-3 col-xm-12 col-sm-10 col-md-7 col-lg-5">
      <form id="signInForm" action="process/course_crud/create_course.php" method="POST" class = "">
        <input type="hidden" name="userID" value='<?=$userID;?>'>
        <div class="form-group">
          <input type="text" class="form-control"  name="title" placeholder="course" required id="courseTitle" $value="$_GET['title']">
        </div>
        <div class="form-group">
          <input type="date" class="form-control" name="date" required id="courseDate" $value="$_GET['date']">
        </div>
        <div class="form-group d-flex justify-content-around">
          <button type="submit" id="btnSubmitToAddCourse" class="btn btn-primary">Submit</button>
          <button type="reset" id ="btnCancelToAddCourse" class="btn btn-primary">Cancel</button>
        </div>
      </form>
    </div>
    <button class="btn btn-primary" name="addCourse" id="btnAddCourse">add+</button>
  </div>
</div>