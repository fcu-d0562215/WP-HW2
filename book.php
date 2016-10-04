<?php
if ( !empty($_POST) && isset($_POST) ) {
    $filename = 'borrow.txt';
    $myfile = fopen("borrow.txt", "a+");
    $book_name = $_POST['book-name'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $txt = "<tr><td>$book_name</td><td>$name</td><td>$gender</td><td>$department</td></tr>\n";
    fwrite($myfile, $txt);
    fclose($myfile);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/tether.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <title>圖書館借書系統</title>
</head>

<body>
    <div class="container-fluid">
        <div style="float: right;position: absolute;bottom: 0;right: 0;z-index: 9999">
            <img src="img/arrow-back.png" border="0" width="128" height="128" usemap="#arrow-back" alt="" />
            <map name="arrow-back" id="arrow-back">
                <area alt="" title="" href="index.html" shape="poly" coords="21,63,55,98,60,98,62,97,63,94,64,93,64,80,72,80,81,82,87,85,94,87,100,93,106,100,106,90,103,78,99,69,92,60,84,55,76,51,70,49,64,47,64,32,61,29,59,29,56,30" style="outline:none;" target="_self" />
            </map>
        </div>
        <div class="row">
            <div class="col-xl-4 push-xl-4 col-lg-4 push-lg-4">
                <form method="post">
                    <div class="form-group">
                        <label for="book-name">書名</label>
                        <input type="text" class="form-control" id="book-name" name="book-name" placeholder="書名" required>
                    </div>
                    <div class="form-group">
                        <label for="name">姓名</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="姓名" required>
                    </div>
                    <fieldset class="form-group">
                        <legend>性別</legend>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="sex1" value="男" checked>男
                            </label>
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="sex2" value="女">女
                            </label>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label for="department">學系</label>
                        <select class="form-control" id="department" name="department">
                            <option>資工</option>
                            <option>電機</option>
                            <option>通訊</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">借書</button>
                    <button type="reset" class="btn btn-warning">重置</button>
                </form>
            </div>
            <div class="col-xl-4 pull-xl-4 col-lg-4 pull-lg-4">
                <?php
                    $filename = 'borrow.txt';
                    if (file_exists($filename)) {
                        $myfile = fopen("borrow.txt", "a+");?>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>書名</th><th>姓名</th><th>性別</th><th>學系</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while(!feof($myfile)) {
                                    echo fgets($myfile);
                                }?>
                            </tbody>
                        </table>
                        <?php fclose($myfile);
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
