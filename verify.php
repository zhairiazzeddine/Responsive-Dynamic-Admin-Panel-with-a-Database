<?php
require ('../include/db.php');

if (isset($_GET['email']) && isset($_GET['v_code']))
{
    $em=$_GET['email'];
    $vcode=$_GET['v_code'];
    $q="SELECT * FROM admin WHERE email='$em' AND verification_code='$vcode'";
    $res=mysqli_query($db,$q);

    if($res)
    {

            if(mysqli_num_rows($res)==1)
            {
                $res_fetch=mysqli_fetch_assoc($res);

                if($res_fetch['is_verified']==0)
                {
                    $up="UPDATE admin SET is_verified='1', verification_code=null WHERE email='$em'";
                    if(mysqli_query($db,$up))
                    {
                        
                        echo "verification successful !";
                    }else
                    {
                        echo "verification error !";
                    }
                }
            }else
            {
                echo "email alredy registred";
            }
    }else
    {
        echo "nooooo";
    }

}



?>