<body>
    <div style="margin-top: 100px;" class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <center><h1>PANEL ADMIN SPORTYFAST</h1></center>
                <div class="login-panel panel panel-green">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open('admin/cek_login'); ?>
                            <fieldset>
                                <div class="form-group has-success">
                                    <input class="form-control" placeholder="Username" name="username" type="username" autofocus required="">
                                </div>
                                <div class="form-group has-success">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required="">
                                </div>
                                <input style="width: 100%" type="submit" value="LOGIN" class="btn btn-success btn-outline" name="">
                            </fieldset>
                        <h5 style="color: red"><?php echo $this->session->flashdata('pesan'); ?></h5> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('js/jquery.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('js/plugins/morris/raphael.min.js') ?>"></script>
    <script src="<?php echo base_url('js/plugins/morris/morris.min.js') ?>"></script>
    <script src="<?php echo base_url('js/plugins/morris/morris-data.js') ?>"></script>

</body>