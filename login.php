<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">ALKU AKSEKİ GİRİŞ SAYFASI</h3>
                                        <center><img src="img/alku.png" height="200 px" /></center>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        include('connection.php');
                                        session_start();
                                        $kadi="";
                                        if($_POST)
                                        {
                                            $kadi=$_POST['kadi'];
                                            $password=$_POST['password'];
                                        }
                                        ?>
                                        <form method="post" action="login.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="kadi" type="text" value="<?=@$kadi ?>" placeholder="Kullanıcı Adı" />
                                                <label for="inputEmail">Kullanıcı Adı</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Şifre</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name="checkRemember" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <input type="submit" class="btn btn-primary*" value="Giriş" />
                                            </div>
                                        </form>
                                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                        <?php
                                        if($_POST){
                                            $k_sifre=md5("xt".$password."6u9");
                                            $sorgu=("select * from kullanicilar where k_adi='$kadi' and k_password='$k_sifre'");
                                            $sonuc=$baglanti->query($sorgu);
                                            if(mysqli_num_rows($sonuc)>0){
                                                while($oku=mysqli_fetch_array($sonuc)){
                                                    $_SESSION['id']=$oku['k_id'];
                                                    $_SESSION['yetki']=$oku['k_yetki'];
                                                }
                                                    if(isset($_POST['checkRemember'])){
                                                    setcookie("cerez",md5($_SESSION['id'].$kadi.$_SESSION['yetki']),time()+60*60*24*7);
                                                    }
                                                    header("Location:index.php");

                                            }else{
                                                echo "<script>Swal.fire('Hata!','Kullanıcı adı veya Şifre hatalı','error')</script>";
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
