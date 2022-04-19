<?php
/**
 * Created by PhpStorm.
 * User: EDIRIN PC
 * Date: 8/3/2021
 * Time: 12:37 AM
 */
?>
<!-- Js Plugins -->
<script type="text/javascript" src="<?php echo BASEURL ; ?>assets/js/jquery-3.3.1.min2.js"></script>
<script src="<?php echo BASEURL ; ?>assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo BASEURL ; ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo BASEURL ; ?>assets/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="<?php echo BASEURL ; ?>assets/js/mixitup.min.js"></script>
<script type="text/javascript" src="<?php echo BASEURL ; ?>assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo BASEURL ; ?>assets/js/jquery.nice-select.min2.js"></script>
<script type="text/javascript" src="<?php echo BASEURL ; ?>assets/js/jquery.slicknav.js"></script>
<script type="text/javascript" src="<?php echo BASEURL ; ?>assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo BASEURL ; ?>assets/js/jquery.richtext.min.js"></script>
<script type="text/javascript" src="<?php echo BASEURL ; ?>assets/js/image-uploader.min.js"></script>
<script type="text/javascript" src="<?php echo BASEURL ; ?>assets/js/main.js"></script>
<script>
    $(document).ready(function () {
    $('#state').on('change',function(){ var stateID = $(this).val();
    //alert('<?php echo site_url('admin/getlga/')?>'+ stateID);
        if(stateID){
            $.ajax({
                type:"GET",
                url: "<?php echo site_url('admin/getlga/')?>"+stateID,
                success:function(res){
                    if(res){ $('#lga ').empty();
                        $('#lga ').append('<option>Select Property LGA</option>');
                        var dataObj = jQuery.parseJSON(res);
                        if(dataObj){ $(dataObj).each(function(){
                            $('#lga ').append('<option value="'+this.lga_id+'">'+this.lga+'</option>');
                        });  }else{  $('#lga ').empty();}  }else{   $('#lga ').empty();}}
            });  }else{ $('#lga ').append('<option value="">Select Property LGA</option>');} });

      $("#txtcati").on('change',function () {
            var valu = $(this).val();
           if(valu === null || valu === ''){

            }else {
                $.ajax({
                    url:'<?php echo site_url("property/gettype")?>',
                    type:'post',
                    data:{'tid':valu},
                    dataType:'json',
                    success:function (r) {
                        if(r.error){

                        }else{
                            var options = r.b_types;
                            $("#txttype").empty();
                            $.each(options,function (key,value) {
                                $('#txttype').append('<option value='+value.id+ '>'+ value.ptype+'</option>');
                            });
                        }
                    },
                    error:function (xhr,status,err) {
                        alert(err);
                    }
                })
            }
        })

        $("#txtpst").change(function () {
            if ($(this).val() < "3") {
                $("#pfeat").show();
                $("#pqty").show();
            } else {
               $("#pfeat").hide();
                $("#pqty").hide();
            }
        });

        function readImage(file) {
            var reader = new FileReader();
            var image  = new Image();
            reader.readAsDataURL(file);
            reader.onload = function(_file) {
                image.src = _file.target.result; // url.createObjectURL(file);
                image.onload = function() {
                    var w = this.width,
                        h = this.height,
                        t = file.type, // ext only: // file.type.split('/')[1],
                        n = file.name,
                        s = ~~(file.size/1024) +'KB';
                   //$('#uploadPreview').append('<img src="' + this.src + '" class="thumb">');
$('#uploadPreview').append('<div class="contimg"  id="img_' + this.src + '"><img src="' + this.src + '" class="thumb"><a href="javascript:void(0);" class="overlaym remimg"  >X</a></div>');

                };
                image.onerror= function() {
                    alert('Invalid file type: '+ file.type);
                };
            };
        }
        $('#uploadPreview').on("click",".remimg", function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //remove inout field
            x--; //inout field decrement
        })
        $("#image_file").change(function (e) {
            if(this.disabled) {
                return alert('File upload not supported!');
            }
            var F = this.files;
            if (F && F[0]) {
                for (var i = 0; i < F.length; i++) {
                    readImage(F[i]);
                }
            }
        });

    });
</script>
