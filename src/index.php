<?php
define("UPLOAD_PATH", "upload");

$is_upload = false;
$msg = null;
$uploaded_path = null; // 添加一个变量来存储上传成功的路径

if (isset($_POST['submit'])) {
if (file_exists(UPLOAD_PATH)) {
$temp_file = $_FILES['upload_file']['tmp_name'];
$img_path = UPLOAD_PATH . '/' . $_FILES['upload_file']['name'];
if (move_uploaded_file($temp_file, $img_path)) {
$is_upload = true;
$uploaded_path = $img_path; // 上传成功后保存路径
} else {
$msg = '上传出错！';
}
} else {
$msg = UPLOAD_PATH . '文件夹不存在,请手工创建！';
}
}
?>

<div id="upload_panel">
    <ol>

        <li>
            <h3>上传框</h3>
            <form enctype="multipart/form-data" method="post" onsubmit="return checkFile()">
                <p>请选择要上传的图片：</p>
                <input class="input_file" type="file" name="upload_file" />
                <input class="button" type="submit" name="submit" value="上传" />
            </form>
            <div id="msg">
                <?php 
                    if ($msg != null) {
                        echo "提示：" . $msg;
                    }
                ?>
            </div>
            <div id="upload_result">
                <?php
                    if ($is_upload) {
                        echo '上传成功！文件路径：' . $uploaded_path;
                    }
                ?>
            </div>
        </li>
        <?php 
            if ($_GET['action'] == "show_code") {
                include 'show_code.php';
            }
        ?>
    </ol>
</div>

<script type="text/javascript">
function checkFile() {
    var file = document.getElementsByName('upload_file')[0].value;
    if (file == null || file == "") {
        alert("请选择要上传的文件!");
        return false;
    }
    var allow_ext = ".jpg|.png|.gif";
    var ext_name = file.substring(file.lastIndexOf("."));
    if (allow_ext.indexOf(ext_name) == -1) {
        var errMsg = "该文件不允许上传，请上传" + allow_ext + "类型的文件，当前文件类型为：" + ext_name;
        alert(errMsg);
        return false;
    }
}
</script>