<?php
/**
 * Created by PhpStorm.
 * User: Akubest Tech
 * Date: 8/16/2021
 * Time: 4:32 PM
 */
?>
<script>
    $(document).ready(function () {
        $('#forget-password-form').on('submit',function (e) {
            e.preventDefault();
            $.post("<?= base_url('admin/forgot_pss')?>",$(this).serializeArray(),function (d) {
                if(d.error){
                    alert(d.error);
                }
                if(d.message){
                    alert(d.message);
                    $('#new-pass-form').css('display','block');
                    $('#rec-pass-form').css('display','none');
                }
            },'json');
        });
        $('#reset-password-form').on('submit',function (e) {
            e.preventDefault();
            $.post("<?=base_url('admin/resetpass')?>",$(this).serializeArray(),function (d) {
                if(d.error){
                    alert(d.error);
                }
                if(d.message){
                    alert(d.message);
                    location.assign("<?=base_url('admin')?>");
                }
            },'json');
        });

        $('#txtrole').on('change',function(){ var stateID = $(this).val();
        if(stateID.length > 0){
                $.ajax({
                    type:"GET",
                    url: "<?php echo site_url('signup/getroleRemark/')?>"+stateID,
                    success:function(res){
                        if(res){ $("#txtremark ").empty();
                           var dataObj = jQuery.parseJSON(res);
                            if(dataObj){ $(dataObj).each(function(){
                              $('#txtremark ').append('<p>' + this.remark+ '</p>');
                            });  }else{ $('#txtremark ').append('<p> ---------1 </p>');}  }else{ $('#txtremark ').append('<p> ---------2 </p>');}}
                });  }else{ $('#txtremark ').append('<p></p>');} });


    });
</script>
