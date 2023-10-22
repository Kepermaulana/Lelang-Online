<?php
if($_POST){
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(empty($username)){
        echo "<script>alert('Username tidak boleh kosong');location.href='login_admin.php';</script>";
        } elseif(empty($password)){
        echo "<script>alert('Password tidak boleh kosong');location.href='login_admin.php';</script>";
        } else {
            include "../koneksi.php";
            $qry_cek=mysqli_query($conn, "select * from tb_petugas where username = '".$username."' and password = '".md5($password)."'");
            if(mysqli_num_rows($qry_cek)>0){
                session_start();
                $dt_login=mysqli_fetch_array($qry_cek);
                $_SESSION['id_petugas']=$dt_login['id_petugas'];
                $_SESSION['nama_petugas']=$dt_login['nama_petugas'];
                $_SESSION['level']=$dt_login['level'];
                $_SESSION['status_login_admin']=true;
                header('location: home_admin.php');
            
            }else{
                echo "<script>alert('username dan password salah');location.href='login_admin.php';</script>";
            }
        }
}else{
echo 'salah buka';
}
?>

