
<?php 
    include_once("inc/functions.php");
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $lessonID = $_GET['lessonID'];
        $lessonName = $_GET['lessonName'];
        $courseID = $_GET['courseID'];
        $courseName = $_GET['courseName'];
        $userID = $_GET['userID'];
        $noteDatas = displayAllNoted($lessonID);
        $isSubmit = $_GET['isSubmit'];
    }
?>
<div class="w-100"  id="note_main_contianer">
    <!-- back to lesson -->
    <div class="d-flex flex-column">
        <a style="width:10%" href="index.php?page=lessons&courseID=<?=$courseID?>&courseName=<?=$courseName?>&userID=<?=$userID?>&lessonName=<?=$lessonName?>&lessonID=<?=$lessonID?>"><button class="btn btn-danger m-1">Back</button></a>
    </div>
    <!-- Note Area -->
    <div class="w-50 mx-auto mb-2">
        <h1><?=$lessonName?></h1>
        <hr>
        <div class="">
            <?php foreach($noteDatas as $data):;?>
                <?php if(!empty($data['description'])):;?>
                    <div class="d-flex justify-content-between">
                        <p class="text-break"><?=$data['description']?></p>
                        <div class="btnAction">
                            <!-- btn edit text -->
                            <a href="process/note_crud/edit_text_form.php?itemID=<?=$data['itemID']?>&lessonID=<?= $lessonID?>&lessonName=<?=$lessonName?>&userID=<?=$userID?>&courseID=<?=$courseID?>&courseName=<?=$courseName?>" class='btnEditLesson fa fa-edit text-dark btnEdits text-decoration-none'></a>
                            <!-- btn delete text -->
                            <a href="process/note_crud/delete_text_note.php?lessonID=<?= $lessonID?>&lessonName=<?=$lessonName?>&userID=<?=$userID?>&courseID=<?=$courseID?>&courseName=<?=$courseName?>&itemID=<?=$data['itemID']?>" class='fa fa-trash text-dark text-decoration-none'></a>
                        </div>
                    </div>
                <?php else:;?>
                    <div class="border border-primary p-1 rounded">
                        <img style="width:100%;height:30vw" src="assets/images/note_images/<?=$data['image']?>" alt="image">
                        <div class="btnAction" ">
                            <!-- btn delete img -->
                            <a style="font-size:20px" href="process/note_crud/delete_img.php?lessonID=<?= $lessonID?>&lessonName=<?=$lessonName?>&userID=<?=$userID?>&courseID=<?=$courseID?>&courseName=<?=$courseName?>&itemID=<?=$data['itemID']?>" class='fa fa-trash text-dark text-decoration-none'></a>
                        </div>
                    </div>
                    <br>
                <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>
    <!-- note Option -->
    <div class="w-50 mx-auto mb-5">
        <a id="btnTakeNote" style="width:10%" href="#"><button class = "btn btn-primary">+</button></a>
        <a id="btnCloseNote" style="width:10%" href="#"><button class = "btn btn-primary m-1">X</button></a>
        <div id='noteOption' class="noteOption border border-primary rounded p-3">
            <!-- add image -->
            <form action="process/note_crud/uploadImage.php" class="d-flex flex-column mb-3" method="post" enctype="multipart/form-data">
                    <input type="hidden" name = "courseID" value = "<?=$courseID?>">
                    <input type="hidden" name = "courseName" value= "<?=$courseName?>">
                    <input type="hidden" name = "userID" value="<?=$userID?>">
                    <p class='text-danger'>Upload Image <i class="fa fa-arrow-circle-down"></i></p>
                    <input type="hidden" name ="lessonID" value="<?=$lessonID?>">
                    <input type="hidden" name = "lessonName" value="<?= $lessonName?>">
                    <input class="mb-2" type="file" name="image" required>
                    <div>
                        <button class="btn btn-primary" type="submit">upload</button>
                    </div>
            </form>
            <!--button add text -->
            <div class="d-flex align-items-start">
                <button class="btn btn-primary" id="btnInputText">+</button>
                <p class="m-2">Write Something!</p>
            </div>
        </div>
        <!-- input text  -->
        <div id="noteInputText" class = "border border-primary rounded p-3">
            <form action="process/note_crud/addTextToNotePage.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name = "courseID" value = "<?=$courseID?>">
                <input type="hidden" name = "courseName" value= "<?=$courseName?>">
                <input type="hidden" name = "userID" value="<?=$userID?>">
                <input type="hidden" name="lessonID" value="<?=$lessonID?>">
                <input type="hidden" name="lessonName" value="<?=$lessonName?>">
                <div class="form-group">
                    <label class="text-primary">Input text</label>
                    <input type="text" name="description" class="form-control" placeholder="What do you want to note?" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <input id="checkSubmit" type="hidden" value="<?=$isSubmit?>">
    <button id="btnGoToTheTop" class="d-flex justify-content-end m-3 position-fixed btn btn-primary" style="bottom:0;right:0">
        <i class="fa fa-arrow-circle-up"></i>
    </button>
</div>