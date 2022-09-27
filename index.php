<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB 1</title>
    <link rel="stylesheet" href="site.css">
</head>
<body>
    <div class="wrapper">
        <h3>Xếp loại kết quả tuyển sinh</h3>
        <form action="index.php" method="POST" class="input-point">
            
                   Điểm môn Toán:</br></br>
                   Điểm môn Lý:</br></br>
                   Điểm môn Hóa: </br></br>
                   Khu vực:
                   <div class="mark-input">
                        <input name= "math" type="text" value="<?php echo isset($_POST['math']) ? $_POST['math'] : ""; ?>"> 
                        <input name="physic" type="text" value="<?php echo isset($_POST['physic']) ? $_POST['physic'] : ""; ?>"> 
                        <input name="chemistry" type="text" value="<?php echo isset($_POST['chemistry']) ? $_POST['chemistry'] : ""; ?>"> 
                       
                   </div>
                   <select name="site" id="option-site">
                            <option value="0" selected>**Chọn khu vực**</option>
                            <option value="1">Khu vực 1</option>
                            <option value="2">Khu vực 2</option>
                            <option value="3">Khu vực 3</option>
                            <option value="4">Khu vực 4</option>
                            <option value="5">Khu vực 5</option>
                        </select>
                    <br>
                    <input type="submit" name="btn-submit" value="Xếp loại">
        </form>
        <?php
                    //  Hiểm thị kết quả tính toán
            if (isset($_POST['btn-submit']))
            {
                if (empty($_POST['math']) || empty($_POST['physic']) || empty($_POST['chemistry']))
                {
                    echo "<p style='color: red;'>Vui lòng nhập tất cả các điểm.</p>";
                }
                else
                {
                    if (!is_numeric($_POST['math']) || !is_numeric($_POST['physic']) || !is_numeric($_POST['chemistry']))
                    {
                        echo "<p style='color: red;'>Điểm các môn không hợp lệ, vui lòng kiểm tra lại.</p>";
                    }
                    else
                    {
                        echo "<h3>Kết quả xếp loại</h3>";
                        //Kết quả sau khi cộng điểm ưu tiên
                        echo "Điểm ưu tiên: ";
                        $sitepriority = empty($_POST['site']) ? 0 : $_POST['site'];
                        switch ($sitepriority)
                        {
                            case 0:
                            case 4:
                            case 5: 
                                echo "0";
                                $markpriority = 0;
                                break;
                            case 1:
                            case 2:
                                echo "5";
                                $markpriority = 5;
                                break;
                            case 3:
                                echo "3";
                                $markpriority = 3;
                                break;
                            }
                    
                    echo "<br><br>";

                    //Hiển thị tổng điểm
                    $totalmark = $_POST['physic'] + $_POST['math'] + $_POST['chemistry'] + $markpriority;
                    echo "Tổng điểm: ";
                    echo  $totalmark;
                    echo "<br><br>";
                    
                    //Hiển thị kết quả xếp loại
                    echo "Xếp loại: ";
                    if ($totalmark >= 24) echo "Giỏi";
                    else if ($totalmark >= 21) echo "Khá";
                    else if ($totalmark >= 15) echo "Trung bình";
                    else echo "Yếu";
                    }
                }

            }
        
        ?>
        <footer>&#169; 2022 - Ngọc Cảnh - SGU</footer>
    </div>
</body>
</html>