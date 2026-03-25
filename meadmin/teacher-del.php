<?php
$del_teacher = app_get_int('teacherid');
$del_done = $del_teacher > 0 ? $ravi->delete_teacher($del_teacher) : false;

if ($del_done === true) {
    echo "<script>alert('Teacher deleted successfully.'); window.location = 'home.php?ravi=teacher-delete';</script>";
} else {
    echo "<script>alert('Unable to delete that teacher.'); window.location='home.php?ravi=teacher-delete';</script>";
}
?>
