<?php $validation =  \Config\Services::validation(); ?>
<div class="content" style="width: 565px;" >

<centre>
    <form method="POST" id="register-form" action="<?= base_url('Property/checkUser') ?>" >
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
        <h2 class="login-title">Property Data Capture</h2>

        <div class="form-group">
            <input class="form-control <?php if($validation->getError('uname')): ?>is-invalid<?php endif ?>" value="<?php echo set_value('uname'); ?>" type="text" name="uname" placeholder="Username" value="<?php echo set_value('uname'); ?>" autocomplete="off" >
            <?php if ($validation->getError('uname')): ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('uname') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <button class="btn btn-info btn-block" type="submit">Continue</button>
        </div>

        <div class="text-center">If Your don't Have <b>Username</b> Please?
            <a class="color-blue" href="/Signup">Signup Here</a>
        </div>
    </form>
    </centre>
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