<?php $validation =  \Config\Services::validation(); ?>
<div class="content">


    <form method="POST" id="register-form" action="<?= base_url('usersignup') ?>" >
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
        <h2 class="login-title">Sign Up</h2>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <input class="form-control <?php if($validation->getError('fname')): ?>is-invalid<?php endif ?>" value="<?php echo set_value('fname'); ?>" type="text" name="fname" placeholder="First Name" value="<?php echo set_value('fname'); ?>" >
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input class="form-control <?php if($validation->getError('lname')): ?>is-invalid<?php endif ?>" value="<?php echo set_value('lname'); ?>" type="text" name="lname" placeholder="Last Name" value="<?php echo set_value('lname'); ?>" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="form-group">
            <input class="form-control <?php if($validation->getError('uname')): ?>is-invalid<?php endif ?>" value="<?php echo set_value('uname'); ?>" type="text" name="uname" placeholder="Username" value="<?php echo set_value('uname'); ?>" autocomplete="off" >
            <?php if ($validation->getError('uname')): ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('uname') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <input class="form-control <?php if($validation->getError('email')): ?>is-invalid<?php endif ?>" value="<?php echo set_value('email'); ?>" type="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>" autocomplete="off">
        </div>
        <div class="form-group">
            <input class="form-control <?php if($validation->getError('password')): ?>is-invalid<?php endif ?>" value="<?php echo set_value('password'); ?>" id="password" type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
            <?php if ($validation->getError('password')): ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('password') ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <input class="form-control <?php if($validation->getError('confirm_password')): ?>is-invalid<?php endif ?>" value="<?php echo set_value('confirm_password'); ?>" type="password" name="confirm_password" value="<?php echo set_value('cofirm_password'); ?>" placeholder="Confirm Password">
            <?php if ($validation->getError('confirm_password')): ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('confirm_password') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <input class="form-control <?php if($validation->getError('phone')): ?>is-invalid<?php endif ?>" value="<?php echo set_value('phone'); ?>" id="text" type="phone" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Phone">
            <?php if ($validation->getError('phone')): ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('phone') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <select class="form-control <?php if($validation->getError('txtrole')): ?>is-invalid<?php endif ?>" name="txtrole" id="txtrole">
                <option value="">Select Account Type</option>
                <?php if(isset($roles)){foreach ($roles as $lrole){?>
                    <option value="<?php echo $lrole->id ; ?>"><?php echo $lrole->role_name ; ?></option>
                <?php }} ?>
            </select>
            <?php if ($validation->getError('txtrole')): ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('txtrole') ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group" id="txtremark" style="display:block;color:#008000;border-color:#008000;border-style: solid;border-radius: 5px;">

        </div>
        <div class="form-group text-left">
            <label class="ui-checkbox ui-checkbox-info">
                <input type="checkbox" name="agree" required>
                <span class="input-span"></span>I agree the terms and policy</label>
        </div>



        <div class="form-group">
            <button class="btn btn-info btn-block" type="submit">Sign up</button>
        </div>

     <!--   <div class="social-auth-hr">
            <span>Or Sign up with</span>
        </div>
        <div class="text-center social-auth m-b-20">
            <a class="btn btn-social-icon btn-twitter m-r-5" href="javascript:;"><i class="fa fa-twitter"></i></a>
            <a class="btn btn-social-icon btn-facebook m-r-5" href="javascript:;"><i class="fa fa-facebook"></i></a>
            <a class="btn btn-social-icon btn-google m-r-5" href="javascript:;"><i class="fa fa-google-plus"></i></a>
            <a class="btn btn-social-icon btn-linkedin m-r-5" href="javascript:;"><i class="fa fa-linkedin"></i></a>
            <a class="btn btn-social-icon btn-vk" href="javascript:;"><i class="fa fa-vk"></i></a>
        </div> --!>
        <div class="text-center">Already Signed up?
            <a class="color-blue" href="/admin">Login here</a>
        </div>
    </form>
</div>