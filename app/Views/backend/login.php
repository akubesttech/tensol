<?php
/**
 * Created by PhpStorm.
 * User: Akubest Tech
 * Date: 8/3/2021
 * Time: 10:19 PM
 */
$validation =  \Config\Services::validation();
?>
<form id="login-form" action="<?php echo base_url('admin/verify_admin')?>" method="post">
            <?= csrf_field() ?>
            <?php
            if(session()->getFlashdata('success')):?>
                <div class="alert alert-success alert-dismissible">
                    <button class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                    <?php echo session()->getFlashdata('success') ?>
                </div>
            <?php elseif(session()->getFlashdata('failed')):?>
                <div class="alert alert-danger alert-dismissible">
                    <button class="close" data-dismiss="alert"  aria-label="Close">&times;</button>
                    <?php echo session()->getFlashdata('failed') ?>
                </div>
            <?php endif; ?>
            <h2 class="login-title">Log in</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control <?php if($validation->getError('userid')): ?>is-invalid<?php endif ?>" value="<?php echo set_value('userid'); ?>" type="text" name="userid" placeholder="Username / Email" autocomplete="off" ">
                    <?php if ($validation->getError('userid')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('userid') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control <?php if($validation->getError('pword')): ?>is-invalid<?php endif ?>" value="<?php echo set_value('pword'); ?>" type="password" name="pword" placeholder="Password" value="<?php echo set_value('pword'); ?>">
                    <?php if ($validation->getError('pword')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('pword') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group d-flex justify-content-between">
                <label class="ui-checkbox ui-checkbox-info">
                    <input type="checkbox">
                    <span class="input-span"></span>Remember me</label>
                <a href="<?php echo base_url('admin/forgot_pass')?>">Forgot password?</a>
            </div>


    <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Login</button>
            </div>
          <!--  <div class="social-auth-hr">
                <span>Or login with</span>
            </div>
            <div class="text-center social-auth m-b-20">
                <a class="btn btn-social-icon btn-twitter m-r-5" href="javascript:;"><i class="fa fa-twitter"></i></a>
                <a class="btn btn-social-icon btn-facebook m-r-5" href="javascript:;"><i class="fa fa-facebook"></i></a>
                <a class="btn btn-social-icon btn-google m-r-5" href="javascript:;"><i class="fa fa-google-plus"></i></a>
                <a class="btn btn-social-icon btn-linkedin m-r-5" href="javascript:;"><i class="fa fa-linkedin"></i></a>
                <a class="btn btn-social-icon btn-vk" href="javascript:;"><i class="fa fa-vk"></i></a>
            </div> -->
            <div class="text-center">Not a Registered User ?
                <a class="color-blue" href="<?php echo base_url('Signup')?>">Signup</a>
            </div>
        </form>
