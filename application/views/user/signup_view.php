<!-- <div class="container">
    <div class="row">
        <div class="col-sm-12 ">
            <div class=" text-center">
                <div class="main_home wow fadeInUp" data-wow-duration="700ms" align="center">
                    <h1>SIGN UP</h1>
                    <?php //echo ('signup/new_user_registration'); ?>
                    <fieldset>
                        <div class="form-group has-success" style="width:500px">
                            <input class="form-control" placeholder="Name" name="name" type="name" autofocus >
                        </div>
                        <div class="form-group has-success" style="width:500px">
                            <input class="form-control" placeholder="Username" name="username" type="username" autofocus>
                        </div>
                        <div class="form-group has-success" style="width:500px">
                            <input class="form-control" placeholder="Email" name="email" type="email" autofocus>
                        </div>
                        <div class="form-group has-success" style="width:500px">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                        <a href="<?php //echo base_url('user/login');?>"input style="width:200px" style="width: 100%" type="submit" value="SIGNUP" class="btn btn-success btn-outline" name="">SIGNUP </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
 -->
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <center>
        <h1>SIGN UP</h1>
    </center>
    <form action="<?php echo base_url(). 'user/new_user_registration'; ?>" method="post">
        <table style="margin:20px auto;">
            <tr>
                <td>Name : </td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Username : </td>
                <td><input type="text" name="username" required ></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><input type="text" name="email" required ></td>
            </tr>
            <tr>
                <td>Password : </td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <br>
                
                <td><input style="width:200px" style="width: 100%" type="submit" value="SIGNUP" class="btn btn-success btn-outline"></td>
            </tr>
        </table>
    </form> 
</body>
</html>