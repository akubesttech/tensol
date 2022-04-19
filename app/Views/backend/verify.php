<?php $validation =  \Config\Services::validation(); ?>
<form  action="<?= base_url('/signup/Resend') ?>" id="Resend-form" method="POST">
    <?= csrf_field() ?>
    <?php
    if(session()->getFlashdata('success')):?>
        <div class="alert alert-success alert-dismissible" style="text-align: center;">
            <button class="close" data-dismiss="alert" aria-label="Close">&times;</button>
            <?php echo session()->getFlashdata('success') ?>
        </div>
    <?php elseif(session()->getFlashdata('failed')):?>
        <div class="alert alert-danger alert-dismissible" style="text-align: center;">
            <button class="close" data-dismiss="alert"  aria-label="Close">&times;</button>
            <?php echo session()->getFlashdata('failed') ?>
        </div>
    <?php endif; ?>
    <h3 class="m-t-10 m-b-10" style="text-align:center;">EMAIL VERIFICATION</h3>
    <p class="m-b-20" style="text-align:justify;">You must verify your email address to continue ,please check your email address <b><?= $_SESSION['msg']['email']; ?></b> for verification link or click RESEND LINK to resend</p>
    <div class="form-group">
        <input class="form-control" type="hidden" name="uname" value="<?= $_SESSION['msg']['username']; ?>" placeholder="Username" autocomplete="off">
        <input class="form-control" type="hidden" name="email" value="<?= $_SESSION['msg']['email']; ?>" placeholder="Email" autocomplete="off">
        <input class="form-control" type="hidden" name="password" value="<?= $_SESSION['msg']['passn']; ?>" placeholder="Password" autocomplete="off">

    </div>

    <div class="form-group">
        <button class="btn btn-info btn-block" type="submit">RESEND LINK</button>
    </div>
</form>