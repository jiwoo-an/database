<?php
    $link= mysqli_connect("localhost","admin","admin","employees");

    if(isset($_GET['emp_no'])){
        $filtered_id = mysqli_real_escape_string($link,$_GET['emp_no']);
    }else{
        $filtered_id = mysqli_real_escape_string($link,$_POST['emp_no']);
    }

    $filtered = array(
        'emp_no' => mysqli_real_escape_string($link,$_POST['emp_no']),
        'birth_date' => mysqli_real_escape_string($link,$_POST['birth_date']),
        'first_name' => mysqli_real_escape_string($link,$_POST['first_name']),
        'last_name' => mysqli_real_escape_string($link,$_POST['last_name']),
        'gender' => mysqli_real_escape_string($link,$_POST['genders']),
        'hire_date' => mysqli_real_escape_string($link,$_POST['hire_date'])
    );

    $query = "
        UPDATE employees 
        SET
            birth_date = '{$filtered['birth_date']}',
            first_name ='{$filtered['first_name']}',
            last_name='{$filtered['last_name']}',
            gender='{$filtered['gender']}',
            hire_date='{$filtered['hire_date']}'
        WHERE
            emp_no = '{$filtered['emp_no']}'
    ";

        $result = mysqli_query($link,$query);

        if($result==false){
            echo '수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.';
            error_log(mysqli_error($link));
        }else{
            header('Location: emp_select.php');
        }

?>
