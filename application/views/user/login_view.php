<div class="container">
  <div class="row" >
    <div class="col-sm-12 col-sm-offside-12 ">
      <div class=" text-center">
        <div>
          <div class="main_home wow fadeInUp" data-wow-duration="700ms" align="center">
            <h1>LOGIN</h1>
            <?php echo form_open('user/cek_login'); ?>
            <br>
            <br>
            <fieldset>
              <div class="form-group has-success" style="width:200px" >
                <input class="form-control" placeholder="Username" name="username" type="username" margin-left="20px" autofocus>
              </div>
              <div align="middle" class="form-group has-success" style="width:200px">
                <input class="form-control" placeholder="Password" name="password" type="password" value="">
              </div>
              <br>
              <input style="width:200px" style="width: 100%" type="submit" value="MASUK" class="btn btn-success btn-outline" name=""> </a>
            </fieldset>
            <br>
            <a href="<?php echo base_url('user/signup');?>" input style="width:200px" style="width: 100%" type="submit" value="SIGNUP" class="btn btn-success btn-outline" name=""> SIGNUP</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>