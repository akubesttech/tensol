<?php $validation =  \Config\Services::validation(); ?>
<?php if(isset($userd)){foreach ($userd as $ud){ $uid = $ud->id; }}
//for ($i = 1; $i < 25; $i++) { echo sprintf("%'.011d", $i).PHP_EOL;}
?>

<section class="breadcrumb-section spad set-bg" data-setbg="<?php echo BASEURL ; ?>assets/img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h4>Add Property </h4>
                    <div class="bt-option">
                        <a href="<?php echo BASEURL .'Property'?>"><i class="fa fa-home"></i> Home</a>
                        <span><?= $title ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Property Submit Section Begin -->
<section class="property-submit-section spad">
<div class="content" >
    <div class="row">
        <div class="col-lg-12 " style="padding-left: 100px;padding-right: 100px;">
    <form method="POST" id="register-form" action="<?= base_url('Property/create_pro') ?>" enctype="multipart/form-data" >
        <input type="hidden" placeholder="" class="form-control "  name="id_num" value="<?php echo $ud->id ?>" />
        <input type="hidden" placeholder="" class="form-control "  name="pro_ref" value="<?php echo $pref; ?>" />
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
        <h2 class="login-title">Add Property</h2>
        <hr>
        <div class="form-group">
            <div class="label-wrapper">
                <label class="control-label">Property <?php echo $ud->role_name ?></label>
            </div>
            <input class="form-control <?php if($validation->getError('uname')): ?>is-invalid<?php endif ?>" value="<?php echo strtoupper($ud->fname." ".$ud->lname." ".$ud->oname) ; ?>" readonly="readonly" type="text" name="uname" placeholder="Username" value="<?php echo set_value('uname'); ?>" autocomplete="off" >
            <?php if ($validation->getError('uname')): ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('uname') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group ">
                    <div class="label-wrapper">
                        <label class="control-label"> Property What to DO</label>
                    </div>
                    <select class="form-control  <?php if($validation->getError('txtpst')): ?>is-invalid<?php endif ?>" name="txtpst" id="txtpst" >
                        <option value="">Select What to Do</option>
                        <?= $stat; ?>
                    </select>
                    <?php if ($validation->getError('txtpst')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('txtpst') ?>
                        </div>
                    <?php endif; ?>
             </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <div class="label-wrapper">
                        <label class="control-label">Property Agent (Optional)</label>
                    </div>
                    <select class="form-control  <?php if($validation->getError('txtrole')): ?>is-invalid<?php endif ?>" name="txtagent" id="txtagent">
                        <option value="">Select Agent</option>
                        <?php if(isset($powner)){foreach ($powner as $own){?>
                            <option value="<?php echo $own->id ; ?>"><?php echo $own->fname." ".$own->oname ; ?></option>
                        <?php }} ?>
                    </select></div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <div class="label-wrapper">
                        <label class="control-label">Property Category</label>
                    </div>
                    <select class="form-control  <?php if($validation->getError('txtcati')): ?>is-invalid<?php endif ?>" name="txtcati" id="txtcati">
                        <option value="">Select Property Category</option>
                        <?php if(isset($pcat)){foreach ($pcat as $pct){?>
                        <option value="<?php echo $pct->id ; ?>"><?php echo $pct->category ; ?></option>
                        <?php }} ?>
                    </select>
                    <?php if ($validation->getError('txtcati')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('txtcati') ?>
                        </div>
                    <?php endif; ?></div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <div class="label-wrapper">
                        <label class="control-label">Property Type</label>
                    </div>
                    <select class="form-control  <?php if($validation->getError('txttype')): ?>is-invalid<?php endif ?>" name="txttype" id="txttype" >
                        <option value="">Select Property Type</option>
                    </select> <?php if ($validation->getError('txttype')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('txttype') ?>
                        </div>
                    <?php endif; ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <div class="label-wrapper">
                        <label class="control-label">Property State</label>
                    </div>
                    <select class="form-control <?php if($validation->getError('state')): ?>is-invalid<?php endif ?>" name="state" id="state" >
                        <option value="" >- Select State -</option>
                        <option value="Abuja">Abuja</option>
                        <option value="Abia">Abia</option>
                        <option value="Adamawa">Adamawa</option>
                        <option value="Akwa Ibom">Akwa Ibom</option>
                        <option value="Anambra">Anambra</option>
                        <option value="Bauchi">Bauchi</option>
                        <option value="Bayelsa">Bayelsa</option>
                        <option value="Benue">Benue</option>
                        <option value="Borno">Borno</option>
                        <option value="Cross River">Cross River</option>
                        <option value="Delta">Delta</option>
                        <option value="Ebonyi">Ebonyi</option>
                        <option value="Edo">Edo</option>
                        <option value="Ekiti">Ekiti</option>
                        <option value="Enugu">Enugu</option>
                        <option value="Gombe">Gombe</option>
                        <option value="Imo">Imo</option>
                        <option value="Jigawa">Jigawa</option>
                        <option value="Kaduna">Kaduna</option>
                        <option value="Kano">Kano</option>
                        <option value="Katsina">Katsina</option>
                        <option value="Kebbi">Kebbi</option>
                        <option value="Kogi">Kogi</option>
                        <option value="Kwara">Kwara</option>
                        <option value="Lagos">Lagos</option>
                        <option value="Nassarawa">Nassarawa</option>
                        <option value="Niger">Niger</option>
                        <option value="Ogun">Ogun</option>
                        <option value="Ondo">Ondo</option>
                        <option value="Osun">Osun</option>
                        <option value="Oyo">Oyo</option>
                        <option value="Plateau">Plateau</option>
                        <option value="Rivers">Rivers</option>
                        <option value="Sokoto">Sokoto</option>
                        <option value="Taraba">Taraba</option>
                        <option value="Yobe">Yobe</option>
                        <option value="Zamfara">Zamfara</option>
                        <option value="Outside Nigeria">Outside Nigeria</option>
                    </select> <?php if ($validation->getError('state')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('state') ?>
                        </div>
                    <?php endif; ?></div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <div class="label-wrapper">
                        <label class="control-label">Property LGA</label>
                    </div>
                    <select   class="form-control <?php if($validation->getError('lga')): ?>is-invalid<?php endif ?>" name="lga" id="lga" >
                        <option value="" selected="selected">Select Property LGA</option>
                    </select><?php if ($validation->getError('lga')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('lga') ?>
                        </div>
                    <?php endif; ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <div class="label-wrapper">
                    <label class="control-label">Property Address/Location</label>
                </div>
                <textarea class="form-control <?php if($validation->getError('txtloc')): ?>is-invalid<?php endif ?>" id="txtloc" name="txtloc" rows="3"></textarea>
                <?php if ($validation->getError('txtloc')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('txtloc') ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-sm-6 form-group">
                <div class="label-wrapper">
                    <label class="control-label">Cumulation Period</label>
                </div>
                <select   class="form-control " name="cperiod" id="cperiod" required >
                    <option value="" selected="selected">Select Cumulation Period</option>
                    <option value="1" >Monthly</option>
                    <option value="12" >Yearly</option>
                </select>
            </div>
        </div>
        <div class="row" style="display: none" id="pqty">
            <div class="col-6">
                <div class="form-group">
                    <div class="label-wrapper">
                        <label class="control-label">No Of Bedroom</label>
                    </div>
                    <select class="form-control  <?php if($validation->getError('txtbedr')): ?>is-invalid<?php endif ?>" name="txtbedr" id="txtbedr">
                        <option value="">Select No Bedroom</option>
                        <?php for($x=1;$x<=10;$x++)
                        { echo $value = '<option value="'.$x.'">'.$x.'</option>';  } ?>
                    </select></div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <div class="label-wrapper">
                        <label class="control-label">No Of Bathroom</label>
                    </div>
                    <select class="form-control  <?php if($validation->getError('txtbathr')): ?>is-invalid<?php endif ?>" name="txtbathr" id="txtbathr">
                        <option value="">Select No Of Bathroom</option>
                        <?php for($x=1;$x<=10;$x++)
                        { echo $value = '<option value="'.$x.'">'.$x.'</option>';  } ?>
                    </select></div>
            </div>
        </div>
        <div class="row" style="display: none" id="pfeat">
            <div class="col-12">
                <div class="form-group">
                    <div class="label-wrapper">
                        <label class="control-label">Property Features</label>
                    </div>
                    <?php if(isset($pfeature)){foreach ($pfeature as $pf){?>
                    <label for="air<?php echo $pf->id ; ?>"><?php echo $pf->prop_feature; ?>
                            <input type="checkbox" id="air<?php echo $pf->id ; ?>" name="feat[]" value="<?php echo $pf->id ; ?>">
                            <span class="checkbox"></span>
                        </label>
                   <?php }} ?> </div>
            </div>
        </div>
        <div class="row" id="pqty">
            <div class="col-6">
                <div class="form-group">
                    <div class="label-wrapper">
                        <label class="control-label">Min Property Price </label>
                    </div>
                    <input type="number" placeholder="" class="form-control "  name="txtpmin" /></div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <div class="label-wrapper">
                        <label class="control-label">Max Property Price</label>
                    </div>
                    <input type="number" placeholder="" class="form-control "  name="txtpmax" /></div>
            </div>
        </div>
        <div class="pf-feature-image">
            <div class="label-wrapper">
                <label class="control-label">Featured Image</label>
            </div>
            <div class="feature-image-content"></div>
        </div>
        <div class="form-group mt-3">
            <input type="file" name='pro_img[]' multiple="multiple" id = "image_file" class="form-control">
            <div id="uploadPreview"></div>
        </div>
        <div class="form-group" id="txtremark" style="display:block;color:#008000;border-color:#008000;border-style: solid;border-radius: 5px;">

        </div>
        <div class="form-group mt-3">
            <label class="ui-checkbox ui-checkbox-info">
                <input type="checkbox" name="agree" required>
                <span class="input-span"></span>I agree the terms and policy</label>
        </div>



        <div class="form-group">
            <button class="btn btn-info btn-block" type="submit">Submit Data</button>
        </div>


    </form>
</div> </div>
</div>
</section>
<!-- Property Submit Section End -->