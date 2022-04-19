<?php
/**
 * Created by PhpStorm.
 * User: EDIRIN PC
 * Date: 8/16/2021
 * Time: 4:24 PM
 */
$validation =  \Config\Services::validation();
?>
<form   id="login-form" method="post" action="#" >
    <h3 class="m-t-10 m-b-10">Reset Password</h3>
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
    <?php if(isset($error)): ?>
        <div class="alert alert-danger alert-dismissible">
            <button class="close" data-dismiss="alert"  aria-label="Close">&times;</button>
            <?= $error; ?>
        </div>
    <?php else: ?>


    <p class="m-b-20">Enter your new password information below.</p>
    <div class="form-group">
        <input class="form-control <?php if($validation->getError('pword')): ?>is-invalid<?php endif ?>" value="<?php echo set_value('pword'); ?>" type="text" name="pword" placeholder="Enter New Password"  autocomplete="off">
        <?php if ($validation->getError('pword')): ?>
            <div class="invalid-feedback">
                <?= $validation->getError('pword') ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input class="form-control <?php if($validation->getError('pword2')): ?>is-invalid<?php endif ?>" value="<?php echo set_value('pword2'); ?>" type="text" name="pword2" placeholder="Comfirm New Password"  autocomplete="off">
        <?php if ($validation->getError('pword2')): ?>
            <div class="invalid-feedback">
                <?= $validation->getError('pword2') ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <button class="btn btn-info btn-block" type="submit">Submit</button>
    </div>

<?php endif ?>
    <div class="text-center">Already have an account?
        <a class="color-blue" href="<?php echo base_url('admin')?>">Login</a>
    </div>
</form>
