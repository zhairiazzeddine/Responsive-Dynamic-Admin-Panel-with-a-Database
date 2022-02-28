<?php
if (isset($_POST['savepwd']))
    {

        $otp = $_POST['otp'];
        $newPwd= $_POST['newpassword'];
        $newPwdConfirm= $_POST['confirmnewpassword'];
        $query = "SELECT * FROM reset_codes WHERE OTP=$otp";
        $run=mysqli_query($db,$query);
        $data = mysqli_fetch_array($run);


        
            if(count($data)>0)
                {
                     $query = "UPDATE reset_codes SET OTP=null";
                     $run=mysqli_query($db,$query);

                    if ($newPwd!=$newPwdConfirm)
                        {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                         <i class="fas fa-exclamation-circle"></i>&nbsp; The New Password in not like The Confirmation, Please Check Your Password !
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>';
                        }
                    else
                        {
                            $password = mysqli_real_escape_string($db,$_POST['confirmnewpwd']);
                            $options = ['cost' => 12,];
                            $pass=password_hash($password, PASSWORD_BCRYPT, $options);
                            $query1 = "UPDATE admin SET ";
                            $query1.="password='$pass' WHERE id=1";
                            $run = mysqli_query($db,$query1);

                                if($run)
                                    {
                                         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                         <i class="fas fa-check-circle"></i> &nbsp; Password Changed !
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>';
                                    }
                        }
                }
                        
            else
                {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                         <i class="fas fa-exclamation-circle"></i>&nbsp; The OTP Code incorrect !
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>';
                }
    }
?>