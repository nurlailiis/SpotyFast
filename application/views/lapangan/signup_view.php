<script>
        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
</script>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-sm-offside-12">
            <div class="text-center">
                <div class="main_home wow fadeInUp" data-wow-duration="700ms" align="center">
                    <center>
                    <h1>SIGN UP</h1>
                    <?php echo form_open('lapangan/tambah_user'); ?>                                                       
                    <fieldset>
                    <p style="color:red"><?php echo $this->session->flashdata('user_available')?></p>
                    <div class="form-group has-success" style="width:200px" >
                    <input class="form-control" placeholder="id user" name="id_user" type="text" margin-left="20px" autofocus required>
                    </div>
                    <div align="middle" class="form-group has-success" style="width:200px">
                    <input class="form-control" placeholder="nama lengkap" name="nama_user" type="text" value="" required>
                    </div>
                    <div align="middle" class="form-group has-success" style="width:200px">
                    <input class="form-control" placeholder="password" name="password_user" type="password" value="" required>
                    </div>
                    <div align="middle" class="form-group has-success" style="width:200px">
                    <input onkeypress="return hanyaAngka(event)" class="form-control" placeholder="no telp" name="no_telp" type="text" value="" required>
                    </div>
                    <br>
                    <input style="width:200px" style="width: 100%" type="submit" value="SIGN UP" class="btn btn-success btn-outline" name=""> </a>
                    </fieldset>               
                    </form>
                    </center>    
                </div>        
            </div>
        </div>
    </div>
</div>