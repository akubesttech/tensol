<?php
/**
 * Created by HASSAN.
 * User: HASSAN
 * Date: 10/8/2019
 * Time: 11:14 AM
 * Project: local_govt
 */
$usercode = $info['user_id'];
$user_role = $info['role'];
?>
<script type="text/javascript" src="<?php echo base_url()?>assets/vendors/tabdrop/js/bootstrap-tabdrop.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        "use strict";
        $("#tabdrop").tabdrop({text: "<i class='icon-list2 font-sm'></i>"});

    });
</script>
<script>
    $(document).ready(function () {
        //loadadmins(<?php //echo $_SESSION['info']['lg_id']?>);
        $(".assign-serv-form").on('submit',function (e) {
            e.preventDefault();
            $.ajax({
                url:'<?php echo base_url("admin/assign_serv")?>',
                data:$(this).serializeArray(),
                dataType:'json',
                type:'post',
                success:function (r) {
                    if(r.error){
                        alert(r.error);
                    }else {
                        alert(r.message);
                    }
                },
                error:function (x,s,er) {
                    alert(er);
                }
            });
        });
        $('#lgform').on('submit',function (e) {
            e.preventDefault();
            $.post("<?=base_url('admin/createlga')?>",$(this).serializeArray(),function (resp) {
                if(resp.error){
                    alert(resp.error);
                }else {
                    alert(resp.message);
                    location.reload(true);
                }
            },'json');
        });
        $(".add-serv-form").on('submit',function (e) {
            e.preventDefault();
            var serv_id = $(this).attr('data-service');
            var form_data = $(this).serializeArray();
            $.ajax({
                url: '<?php echo base_url("admin/add_service")?>',
                data: form_data,
                dataType: 'json',
                type: 'post',
                success: function (r) {
                    if(r.error){
                        alert(r.error);
                    }else {
                        var resp = r.subservices;
                        var cnt = 0;
                        var tab_data = [];
                        $.each(resp,function (i,v) {
                            tab_data[cnt] = [
                                cnt + 1,
                                v.subservice_name
                            ];
                            cnt++;
                        });
                        $('#sub_serv_list'+serv_id).DataTable({
                            destroy: true,
                            data: tab_data
                        });
                    }
                },
                error:function (x,s,er) {
                    alert(er);
                }
            });
        });
        $(".remo-serv-form").on('submit',function (e) {
            e.preventDefault();
            var serv_id = $(this).attr('data-service');
            var form_data = $(this).serializeArray();
            $.ajax({
                url: '<?php echo base_url("admin/remo_service")?>',
                data: form_data,
                dataType: 'json',
                type: 'post',
                success: function (r) {
                    if(r.error){
                        alert(r.error);
                    }else {
                        var resp = r.subservices;
                        var cnt = 0;
                        var tab_data = [];
                        $.each(resp,function (i,v) {
                            tab_data[cnt] = [
                                cnt + 1,
                                v.subservice_name
                            ];
                            cnt++;
                        });
                        $('#sub_serv_list'+serv_id).DataTable({
                            destroy: true,
                            data: tab_data
                        });
                        alert(r.message);
                    }
                },
                error:function (x,s,er) {
                    alert(er);
                }
            });
        });
        $("#bservice-group").on('change',function () {
            var valu = $(this).val();
            if(valu === null || valu === ''){

            }else {
                $.ajax({
                    url: "<?php echo base_url('admin/fetch_subserv')?>",
                    data:{'s_id':valu},
                    dataType:'json',
                    type:'post',
                    success:function (r) {
                        if(r.error){
                            alert("No group fee attached");
                        }else{
                            var servs = r.s_serv;
                            var sel = $("#bservicefee-group");
                            sel.empty().append(
                                '<option value="">Select group</option>'
                            );
                            if(servs.length > 0){
                                $.each(servs,function (i,v) {
                                    sel.append(
                                        '<option value="'+v.id+'">'+v.subservice_name+'</option>'
                                    );
                                });
                            }
                        }
                    },
                    error:function (x,s,e) {
                        alert(e);
                    }
                });
            }
        });
        $("#pservice-group").on('change',function () {
            var valu = $(this).val();
            if(valu === null || valu === ''){

            }else {
                $.ajax({
                    url: "<?php echo base_url('admin/fetch_subserv')?>",
                    data:{'s_id':valu},
                    dataType:'json',
                    type:'post',
                    success:function (r) {
                        if(r.error){
                            alert("No group fee attached");
                        }else{
                            var servs = r.s_serv;
                            var sel = $("#pservicefee-group");
                            sel.empty().append(
                                '<option value="">Select group</option>'
                            );
                            if(servs.length > 0){
                                $.each(servs,function (i,v) {
                                    sel.append(
                                        '<option value="'+v.id+'">'+v.subservice_name+'</option>'
                                    );
                                });
                            }
                        }
                    },
                    error:function (x,s,e) {
                        alert(e);
                    }
                });
            }
        });
//        $(".add-serv-form").on('submit',function (e) {
//            e.preventDefault();
//            var serv_id = $(this).attr('data-service');
//            var form_data = $(this).serializeArray();
//            $.ajax({
//                url: '<?php //echo base_url("admin/add_service")?>//',
//                data: form_data,
//                dataType: 'json',
//                type: 'post',
//                success: function (r) {
//                    if(r.error){
//                        alert(r.error);
//                    }else {
//                        var resp = r.subservices;
//                        var cnt = 0;
//                        var tab_data = [];
//                        $.each(resp,function (i,v) {
//                            tab_data[cnt] = [
//                                cnt + 1,
//                                v.subservice_name
//                            ];
//                            cnt++;
//                        });
//                        $('#sub_serv_list'+serv_id).DataTable({
//                            destroy: true,
//                            data: tab_data
//                        });
//                    }
//                },
//                error:function (x,s,er) {
//                    alert(er);
//                }
//            });
//        });
        $("#add-propertytype-fee").on('submit',function (e) {
            e.preventDefault();
            var form_data = $(this).serializeArray();
            $.ajax({
                url:"<?php echo base_url('admin/link_prop_fees')?>",
                data:form_data,
                type:'post',
                dataType:'json',
                success:function(r){
                    if(r.error){
                        alert(r.error);
                    }else{
                        alert(r.message);
                        //alert(JSON.stringify(r.fees));
                        location.reload(true);
                    }
                },
                error:function(x,s,er){
                    alert(er);
                }
            });
        });
        $("#add-businesstype-fee").on('submit',function (e) {
            e.preventDefault();
            var form_data = $(this).serializeArray();
            $.ajax({
                url:"<?php echo base_url('admin/link_busi_fees')?>",
                data:form_data,
                type:'post',
                dataType:'json',
                success:function(r){
                    if(r.error){
                        alert(r.error);
                    }else{
                        alert(r.message);
                        //alert(JSON.stringify(r.fees));
                        location.reload(true);
                    }
                },
                error:function(x,s,er){
                    alert(er);
                }
            });
        });
        $(".add-servtolg-form").on('submit',function (e) {
            e.preventDefault();
            var serv_id = $(this).attr('data-service');
            var form_data = $(this).serializeArray();
            $.ajax({
                url: '<?php echo base_url("admin/add_service_to_lg")?>',
                data: form_data,
                dataType: 'json',
                type: 'post',
                success: function (r) {
                    if(r.error){
                        alert(r.error);
                    }else {
                        alert(r.message);
                        var resp = r.subservices;
                        var cnt = 0;
                        var tab_data = [];
                        $.each(resp,function (i,v) {
                            tab_data[cnt] = [
                                cnt + 1,
                                v.subservice_name,
                                v.rate
                            ];
                            cnt++;
                        });
                        $('#lgsub_serv_list'+serv_id).DataTable({
                            destroy: true,
                            data: tab_data
                        });
                    }
                },
                error:function (x,s,er) {
                    alert(er);
                }
            });
        });
        $(".rem-serv-form").on('submit',function (e) {
            e.preventDefault();
            var serv_id = $(this).attr('data-service');
            var form_data = $(this).serializeArray();
            $.ajax({
                url: '<?php echo base_url("admin/rem_service_frm_lg")?>',
                data: form_data,
                dataType: 'json',
                type: 'post',
                success: function (r) {
                    if(r.error){
                        alert(r.error);
                    }else {
                        alert(r.message);
                        var resp = r.subservices;
                        var cnt = 0;
                        var tab_data = [];
                        $.each(resp,function (i,v) {
                            tab_data[cnt] = [
                                cnt + 1,
                                v.subservice_name,
                                v.rate
                            ];
                            cnt++;
                        });
                        $('#lgsub_serv_list'+serv_id).DataTable({
                            destroy: true,
                            data: tab_data
                        });
                    }
                },
                error:function (x,s,er) {
                    alert(er);
                }
            });
        });
        $(".set-rate-form").on('submit',function(e){
            e.preventDefault();
            var serv_id = $(this).attr('data-service');
            var form_data = $(this).serializeArray();
            $.ajax({
                url: '<?php echo base_url("admin/set_service_payment")?>',
                data: form_data,
                dataType: 'json',
                type: 'post',
                success: function (r) {
                    if(r.error){
                        alert(r.error);
                    }else {
                        alert(r.message);
                        var resp = r.subservices;
                        var cnt = 0;
                        var tab_data = [];
                        $.each(resp,function (i,v) {
                            tab_data[cnt] = [
                                cnt + 1,
                                v.subservice_name,
                                v.rate
                            ];
                            cnt++;
                        });
                        $('#rate-table'+serv_id).DataTable({
                            destroy: true,
                            data: tab_data
                        });
                    }
                },
                error:function (x,s,er) {
                    alert(er);
                }
            });
        });
        $("#add_cat_form").on('submit',function (e) {
            e.preventDefault();
            var form_data = $(this).serializeArray();
            $.ajax({
                url:"<?php echo base_url('admin/add_bus_cat')?>",
                data:form_data,
                dataType:'json',
                type:'post',
                success:function(r){
                    if(r.error){
                        alert(r.error);
                    }else{
                        alert(r.message);
                        var table_data = [];
                        var count = 0;
                        var categos = r.cats;
                        var sel = $("#catn");
                        $("#catn").val(" ") ;
                        sel.append(
                            '<option value=""'+'>Select Category'+"</option>"
                        );
                        $.each(categos,function (i,d) {
                            sel.append(
                                '<option value="'+d.id+'">'+d.category+'</option>'
                            );
                            table_data[count]=[
                                count+1,
                                d.category,
                                '<a data-value="'+d.id+'" class="btn btn-danger rbcat" href="javascript:void(0);">Remove</a>'
                            ];
                            count++;
                        });
                        $("#example-table2").DataTable({
                            destroy: true,
                            data:table_data,

                        });
                    }
                },
                error:function (x,s,err) {
                    alert(err);
                }
            });
        });

        $("#add_pro_form").on('submit',function (e) {
            e.preventDefault();
            var form_data = $(this).serializeArray();
            $.ajax({
                url:"<?php echo base_url('admin/add_pro_cat')?>",
                data:form_data,
                dataType:'json',
                type:'post',
                success:function(r){
                    if(r.error){
                        alert(r.error);
                    }else{
                        alert(r.message);
                        var table_data = [];
                        var count = 0;
                        var categos = r.cats;
                        var sel = $("#ptype");
                        $("#ptype").val(" ") ;
                        sel.append(
                            '<option value=""'+'>Select Property Type'+"</option>"
                        );
                        $.each(categos,function (i,d) {
                            sel.append(
                                '<option value="'+d.id+'">'+d.ptype+'</option>'
                            );
                            table_data[count]=[
                                count+1,
                                d.c_name,
                                d.ptype,
                                '<a data-value="'+d.id+'"  class="btn btn-danger rbcat" href="javascript:void(0);" >Remove</a>'
                            ];
                            count++;
                        });
                        $("#protype_tb").DataTable({
                            destroy: true,
                            data:table_data,

                        });
                    }
                },
                error:function (x,s,err) {
                    alert(err);
                }
            });
        });

        $("#add-property-cat-form").on('submit',function (e) {
            e.preventDefault();
            var form_data = $(this).serializeArray();
            $.ajax({
                url:"<?php echo base_url('property/add_prop_cat')?>",
                data:form_data,
                dataType:'json',
                type:'post',
                success:function(r){
                    if(r.error){
                        alert(r.error);
                    }else{
                        alert(r.message);
                        var table_data = [];
                        var count = 0;
                        var categos = r.cats;
                        var sel = $("#p-cat-name");
                        sel.empty();
                        sel.append(
                            '<option value=""'+'>Select Category'+"</option>"
                        );
                        $.each(categos,function (i,d) {
                            sel.append(
                                '<option value="'+d.id+'">'+d.category+'</option>'
                            );
                            table_data[count]=[
                                count+1,
                                d.category,
                                '<a data-value="'+d.id+'" class="btn btn-danger rbcat" href="javascript:void(0);">Remove</a>'
                            ];
                            count++;
                        });
                        $("#pcat-table").DataTable({
                            destroy: true,
                            data:table_data,

                        });
                    }
                },
                error:function (x,s,err) {
                    alert(err);
                }
            });
        });
        $("#add-business-type-form").on('submit',function (e) {
            e.preventDefault();
            var form_data = $(this).serializeArray();
            $.ajax({
                url:"<?php echo base_url('business/add_bus_type')?>",
                data:form_data,
                dataType:'json',
                type:'post',
                success:function(r){
                    if(r.error){
                        alert(r.error);
                    }else{
                        alert(r.message);
                        var table_data = [];
                        var count = 0;
                        var categos = r.typess;
                        $.each(categos,function (i,d) {
                            table_data[count]=[
                                count+1,
                                d.category_name,
                                d.type_name,
                                '<a data-value="'+d.id+'" class="btn btn-danger rbcat" href="javascript:void(0);">Remove</a>'
                            ];
                            count++;
                        });
                        $("#btype-table").DataTable({
                            destroy: true,
                            data:table_data,

                        });
                    }
                },
                error:function (x,s,err) {
                    alert(err);
                }
            });
        });
        $("#add-property-type-form").on('submit',function (e) {
            e.preventDefault();
            var form_data = $(this).serializeArray();
            $.ajax({
                url:"<?php echo base_url('property/add_prop_type')?>",
                data:form_data,
                dataType:'json',
                type:'post',
                success:function(r){
                    if(r.error){
                        alert(r.error);
                    }else{
                        alert(r.message);
                        var table_data = [];
                        var count = 0;
                        var categos = r.typess;
                        $.each(categos,function (i,d) {
                            table_data[count]=[
                                count+1,
                                d.category_name,
                                d.type_name,
                                '<a data-value="'+d.id+'" class="btn btn-danger rbcat" href="javascript:void(0);">Remove</a>'
                            ];
                            count++;
                        });
                        $("#ptype-table").DataTable({
                            destroy: true,
                            data:table_data,

                        });
                    }
                },
                error:function (x,s,err) {
                    alert(err);
                }
            });
        });
        $(".serv-form").on('submit',function (e) {
            e.preventDefault();
            var form_data = $(this).serializeArray();
            var serv_id = $(this).attr('data-service');
            $.ajax({
                url:'<?php echo base_url("admin/fetch_application")?>',
                data:form_data,
                dataType:'json',
                type:'post',
                success:function (r) {
                    if(r.error){
                        alert(r.error);
                    }else {
                        var table_data = [];
                        var respon = r.respo;
                        var coun = 0;
                        $.each(respon,function (i,d) {
                            table_data[coun]=[
                                coun + 1,
                                d.application_date,
                                d.applicant_smart_id,
                                d.payment_ref,
                                d.application_status,
                                d.slip_link
                            ];
                            coun++;
                        });
                        $("#serv-table"+serv_id).DataTable({
                            destroy:true,
                            data:table_data,
                            dom:'Bfrtip',
                            search: false
//                            filter: false
                        });

                    }
                    //alert(JSON.stringify(r));
                },
                error:function (x,s,e) {
                    alert(e);
                }
            })
        });
        $(".dropdown-item").on('click',function (e) {
            e.preventDefault();
            $(".divhead").css('display','none');
            var dval = $(this).attr('data-value');
            $('#'+ dval).css('display','block');
        });
        $(".p-set").on('click',function (e) {
            e.preventDefault();
            var ele = '#' + $(this).attr('data-div');
            //var sel_ele = '.'+ $(this).attr('data-sel');
            $(".pro-comp").css('display','none');
            $(ele).css('display','block');
          
        });
        $(".servs").on('click',function (e) {
            e.preventDefault();
            var serv_id = $(this).attr('data-value');
            var ele = '#' + $(this).attr('data-div');
            var sel_ele = '.'+ $(this).attr('data-sel');
            var ttable = "#";
            var ttable_data = [];
            var attr = $(this).attr('data-ttable');
            if (typeof attr !== typeof undefined && attr !== false) {
                // ...
                ttable += attr;
            }

            $.ajax({
                url:'<?php echo base_url("admin/fetch_subserv")?>',
                data: {'s_id':serv_id},
                dataType:'json',
                type:'post',
                success:function (r) {
                    if(r.error){
                        alert(JSON.stringify(r.error))
                    }else {
                        var s_serv = r.s_serv;
                        var coun = 0;
                        //var ele = "#serv"+serv_id+"-apps";
                        $(sel_ele).empty();
                        $.each(s_serv,function (i,v) {
                            $(sel_ele).append(
                                '<option value="'+v.id+'">'+ v.subservice_name +'</option>'
                            );
                            ttable_data[coun] = [
                                coun+1,
                                v.subservice_name
                            ]
                            ++coun;
                        });
                        if(ttable !== "#"){
                            $(ttable).DataTable({
                                destroy:true,
                                data:ttable_data,
                                dom:'Bfrtip',
                                search: false
//                                filter: false
                            });
                        }
                        //alert(JSON.stringify(s_serv));
                    }
                    $(".serv-apps").css('display','none');
                    $(ele).css('display','block');
                },
                error:function (x,s,e) {
                    alert(e);
                }
            });
        });
        $(".rep-form").on('submit',function (e) {
            e.preventDefault();
            var f_data = $(this).serializeArray();
            var s_id = $(this).attr('data-value');
            $.ajax({
                url: '<?php echo base_url("admin/reports")?>',
                data: f_data,
                dataType: 'json',
                type: 'post',
                success:function (r) {
                    if(r.messa){
                        alert(r.messa);
                    }else {
                        var approved = r.approved;
                        var pending = r.pend;
                        var tab_app = [];
                        var tab_pen = [];
                        var count = 0;
                        if(approved.length > 0){
                            $.each(approved,function (i,v) {
                                tab_app[count] = [
                                    count + 1,
                                    v.applicant_smart_id,
                                    v.a_names,
                                    v.application_date,
                                    v.application_reference
                                ];
                                count++;
                            });
                            count = 0;
                        }
                        if(pending.length > 0){
                            //alert("Greater");
                            $.each(pending,function (i,v) {
                                tab_pen[count] = [
                                    count + 1,
                                    v.applicant_smart_id,
                                    v.a_names,
                                    v.application_date,
                                    v.application_reference
                                ];
                                count++;
                            });
                        }
                        $("#app-rep-table"+s_id).DataTable({
                            destroy:true,
                            data: tab_app,
                            search: false,
                        });
                        $("#unapp-rep-table"+s_id).DataTable({
                            destroy:true,
                            data: tab_pen,
                            search: false,
                        });
                        //alert(JSON.stringify(tab_pen));
                    }
                }
            })
        });
        $('#c_passform').on('submit',function (e) {
            e.preventDefault();
            $.post("<?=base_url('admin/changepassword')?>",$(this).serializeArray(),function (data) {
                alert(data.message);
            },'json');
        });
        $("#verify_pform").on('submit',function (e) {
            e.preventDefault();
            var data = $(this).serializeArray();
            $.ajax({
                url: "<?php echo base_url('payment/verify_payment')?>",
                data: data,
                type:'post',
                dataType:'json',
                success:function (r) {
                    if(r.error){
                        alert(r.error);
                    }else{
                        alert(r.message);
                    }
                },
                error:function(x,s,er){
                    alert(er);
                }
            });
        });
        $("#verify_pbutton").on('click',function () {
            $("#verify_pform").submit();
        });
        $("#crAdForm").on('submit',function (e) {
            e.preventDefault();
            var form_data = $(this).serializeArray();
            $.ajax({
                url: "<?php echo base_url('admin/creat_admin')?>",
                dataType:'json',
                type: 'post',
                data: form_data,
                success:function (r) {
                    if(r.error){
                        alert(r.error);
                    }else {
                        alert(r.message);
                        location.reload(true);
                    }
                },
                error:function (xhr,stat,err) {
                    alert(err);
                }
            });
        });
        load_features();
       function load_features(){
            $.ajax({
                type  : 'post',
                url   : '<?php echo base_url('admin/lfeature')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var tab_feat = [];
                    $('#feat_tb tbody').empty();
                    for(i=0; i<data.length; i++){
                  html += '<tr>'+
                            '<td>'+ (i + 1) +'</td>'+
                            '<td>'+data[i].prop_feature+'</td>'+
                            '<td style="text-align:right;">'+
                            '<a href="javascript:void(0);" class="btn btn-info  item_edit" data-fid="'+data[i].id+'" data-feature_name="'+data[i].prop_feature+'" >Edit</a>'+' '+
                            '<a href="javascript:void(0);" class="btn btn-danger  item_delete" data-fid="'+data[i].id+'">Delete</a>'+
                            '</td>'+
                            '</tr>';
                    }
                    //$('#lfeat_tb').html(html);

                    $('#feat_tb tbody').prepend(html);
                    $('#feat_tb').dataTable({
                      //destroy:true,
                        retrieve: true,
                        data: tab_feat[html],
                        //dom:'Bfrtip',
                   });
                }
            });
        }
        // load users
        load_users(3);
        load_users(4);
        load_users();
        function load_users(catio = 0){
            var vname = "";
            var vdata = "";
            if(catio == '4'){ vname = "lord_tb tbody"; vdata = "lord_tb"; chkn = "row-checkv"; }else if(catio == '3'){ vname = "agent_tb tbody"; vdata = "agent_tb"; chkn = "row-checkb";
             }else{ vname = "user_tb tbody"; vdata = "user_tb";chkn = "row-check" }
           $.ajax({
                type  : 'post',
                url   : '<?php echo site_url('admin/loadusers/')?>'+ catio ,
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var tab_feat = [];
                    $("#" + vname).empty();
                    for(i=0; i<data.length; i++){
                        var name = data[i].fname + " " + data[i].lname + " " + data[i].oname ;
                       var rolename = data[i].role_name  ;
                       if(rolename == null){ var rol = "No Access";}else{ var rol = rolename;}
                        var image = "<?= BASEURL."assets/img/users/" ?>"+ data[i].pic;
                        var dimg = "<?= BASEURL."assets/img/users/default_img.jpg" ?>";
                        var urole = "<?php echo $user_role; ?>";
                        var ckh = checkFileExist(image);
                        var status = data[i].active ;
                        var st = (status=='0')? 'Pending' : 'Verified';
                        var sc = (status=='0')? 'btn-danger' : 'btn-success';
                        if(ckh == true){ var imgn = image; }else{ var imgn = dimg ;}
                        if(urole > 2 ){ var nact = "";  }else{ var nact = "btn vstatus";}
                        html += '<tr>'+
                            '<td >'+ (i + 1) +'</td>'+
                            '<td>' + '<img src='+ imgn +' style="width:25px; height:25px;" /> '+data[i].username + ' (' + rol + ')</td>'+
                            '<td>'+ name +'</td>'+
                            '<td>'+ data[i].email +'</td>'+
                            '<td>'+ data[i].phone +'</td>'+
                            '<td><i data="'+data[i].id+'" data_status="'+ data[i].id +'" class="' + nact + ' '+ sc +'">'+ st +'</i></td>'+
                            '<td style="text-align:right;">'+
                            '<a href="javascript:void(0);" class="btn btn-info  userEdit" data-fid="'+data[i].id+'" data-pag="'+ catio +'" >Edit</a>'+' '+
                            '<a href="javascript:void(0);" class="btn btn-danger  userDelete" data-fid="'+data[i].id+'"  data-pag="'+ catio +'">Delete</a>'+
                            '</td>'+
                            '</tr>';
                    }
                    //$('#lfeat_tb').html(html);
                    $("#" + vname).prepend(html);
                    $("#" + vdata).dataTable({
                        //destroy:true,
                        retrieve: true,
                        data: tab_feat[html],
                        //dom:'Bfrtip',
                    });
                }
            });
        }
        // load property
        load_property(1,'<?php echo $usercode; ?>');
        load_property(2,'<?php echo $usercode; ?>');
        load_property(3,'<?php echo $usercode; ?>');
        load_property(4,'<?php echo $usercode; ?>');
       function load_property(recno,user){
            var vname = "";
            var vdata = "";
            var chkn = "";
           if(recno == '4'){ vname = "veri_tb tbody"; vdata = "veri_tb"; chkn = "row-checkv"; }else if(recno == '2'){ vname = "build_tb tbody"; vdata = "build_tb"; chkn = "row-checkb";
           }else if(recno == '3'){ vname = "nonbuild_tb tbody"; vdata = "nonbuild_tb"; chkn = "row-check"; }else{
                vname = "pro_tb tbody"; vdata = "pro_tb";chkn = "row-check" }
                //alert(user);

          $.ajax({
                type  : 'GET',
                url   : "<?php echo site_url('admin/loadpro/')?>" + user + "/" + recno,
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var tab_feat = [];
                    $("#"+ vname).empty();
                    for(i=0; i<data.length; i++){
                        var name = data[i].fname + " " + data[i].lname + " " + data[i].oname ;
                        var image = "<?= BASEURL."assets/img/users/" ?>"+ data[i].pimg;
                        var dimg = "<?= BASEURL."assets/img/users/default_img.jpg" ?>";
                        var userd = "<?php echo $usercode; ?>";
                        var urole = "<?php echo $user_role; ?>";
                        var ckh = checkFileExist(image);
                        var status = data[i].pro_status ;
                        var st = (status=='0')? 'Pending' : 'Approved';
                        var sc = (status=='0')? 'btn-danger' : 'btn-success';
                        if(ckh == true){ var imgn = image; }else{ var imgn = dimg ;}
                        if(urole > 2 ){ var nact = "";  }else{ var nact = "btn vproperty";}
                        html += '<tr>'+
                            '<td><input type="checkbox" name='+ chkn +' class="del_alog" value='+data[i].id+' /></td>'+
                            '<td >'+ (i + 1) +'</td>'+
                            '<td>' + data[i].pro_ref +'</td>'+
                            '<td>'+ name +'</td>'+
                            '<td>'+ data[i].ptype +'</td>'+
                            '<td>&#8358;'+ number_format(data[i].amt_min,2,".",",") +'</td>'+
                            '<td><i data="'+data[i].id+'" data_status="'+ data[i].id +'" data_userd="'+ userd +'" data_pag="'+ recno+'" class="' + nact + ' '+ sc +'">'+ st +'</i></td>'+
                            '<td style="text-align:right;">'+
                            '<a href="javascript:void(0);" class="btn btn-info  proEdit" data-fid="'+data[i].id+'"  >Edit</a>'+' '+
                            '<a href="javascript:void(0);" class="btn btn-danger  proDelete" data-fid="'+data[i].id+'" data-userd="'+ userd +'" data-pag="'+ recno+'">Delete</a>'+
                            '</td>'+
                            '</tr>';
                    }
                    //$('#lfeat_tb').html(html);
                    $("#"+ vname).prepend(html);
                    $("#"+ vdata).dataTable({
                        //destroy:true,
                        retrieve: true,
                        data: tab_feat[html],
                        //dom:'Bfrtip',
                    });

                }
            });
        }

       // load tenants
        load_tenants(1,'<?php echo $usercode; ?>');
        load_tenants(0,'<?php echo $usercode; ?>');
        function load_tenants(recno,user){
            var vname = "";
            var vdata = "";
            var chkn = "";
            if(recno == '1'){ vname = "tveri_tb tbody"; vdata = "tveri_tb"; chkn = "row-checktv";  }else{
                vname = "tenants_tb tbody"; vdata = "tenants_tb";chkn = "row-checkt" }
            //alert(user);
            $.ajax({
                type  : 'GET',
                url   : "<?php echo site_url('admin/loadten/')?>" + user + "/" + recno,
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var tab_feat = [];
                    $("#"+ vname).empty();
                    for(i=0; i<data.length; i++){
                        var name = data[i].fname + " " + data[i].lname + " " + data[i].oname ;
                        var image = "<?= BASEURL."assets/img/users/" ?>"+ data[i].pimg;
                        var dimg = "<?= BASEURL."assets/img/users/default_img.jpg" ?>";
                        var userd = "<?php echo $usercode; ?>";
                        var urole = "<?php echo $user_role; ?>";
                        var ckh = checkFileExist(image);
                        var status = data[i].pay_status ;
                        var tstatus = data[i].ten_status ;
                        var st = (status=='0')? 'Pending' : 'Successful';
                        var tst = (tstatus=='0')? 'Verify' : 'Edit';
                        var sc = (status=='0')? 'color:red' : 'color:green';
                        var tsc = (tstatus=='0')? 'btn btn-danger' : 'btn btn-info';
                        if(ckh == true){ var imgn = image; }else{ var imgn = dimg ;}
                        if(urole > 2 ){ var nact = "display:none;";  }else{ var nact = "display:block;";}
                        html += '<tr>'+
                            '<td><input type="checkbox" name='+ chkn +' class="del_alog" value='+data[i].id+' /></td>'+
                            '<td >'+ (i + 1) +'</td>'+
                            '<td> ' + '<img src='+ imgn +' style="width:25px; height:25px;" /> ' + name +'</td>'+
                            '<td>' + data[i].pro_ref +' (' + data[i].ptype + ') </td>'+
                            '<td>'+ data[i].move_in_date +'</td>'+
                            '<td>'+ data[i].rent_expire_date +'</td>'+
                            //'<td>&#8358;'+ number_format(data[i].amt_min,2,".",",") +'</td>'+
                            '<td style="' + sc + '"> '+ st +'</td>'+
                            '<td style="text-align:right; '+ nact +'">'+
                            '<a href="javascript:void(0);" class="' + tsc + '  tenVeri " data-fid="'+data[i].record_id+'"  data-pag="'+ recno +'" >'+ tst +'</a>'+' '+
                            '</td>'+
                            '</tr>';
                    }
                    //$('#lfeat_tb').html(html);
                    $("#"+ vname).prepend(html);
                    $("#"+ vdata).dataTable({
                        //destroy:true,
                        retrieve: true,
                        data: tab_feat[html],
                        //dom:'Bfrtip',
                    });

                }
            });
        }
//load activity Logs
        load_activitylogs();
        function load_activitylogs(){
            $.ajax({
                type  : 'post',
                url   : '<?php echo base_url('admin/lalog')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var fulname = '';
                    var tab_feat = [];
                    $('#act_tb tbody').empty();
                    for(i=0; i<data.length; i++){
                        fulname = data[i].fname + ' ' + data[i].lname + ' ' + data[i].oname ;
                        var image = "<?= BASEURL."assets/img/users/" ?>"+ data[i].pimg;
                        var dimg = "<?= BASEURL."assets/img/users/default_img.jpg" ?>";
                        var ckh = checkFileExist(image);
                        if(ckh == true){ var imgn = image; }else{ var imgn = dimg ;}
                        html += '<tr>'+
                           '<td><input type="checkbox" name="row-checka" class="del_alog" value='+data[i].activity_log_id+' /></td>'+
                            '<td>'+ (i + 1) +'</td>'+
                            '<td>'+data[i].date+'</td>'+
                            '<td>' + '<img src='+ imgn +' style="width:25px; height:25px;" /> '+data[i].username +'</td>'+
                            '<td>'+ fulname +'</td>'+
                            '<td>'+data[i].action+'</td>'+
                            '</tr>';
                    }
                    //$('#lfeat_tb').html(html);
                    $('#act_tb tbody').prepend(html);
                    $('#act_tb').dataTable({
                        //destroy:true,
                        retrieve: true,
                        data: tab_feat[html],
                        //dom:'Bfrtip',
                    });
                }
            });
        }
        //load user Logs
        load_userlogs();
        function load_userlogs(){
            $.ajax({
                type  : 'post',
                url   : '<?php echo base_url('admin/lulog')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var tab_feat = [];
                    $('#ulog_tb tbody').empty();
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                            '<td><input type="checkbox" name="row-checku" class="del_ulog" value='+data[i].user_log_id+' /></td>'+
                            '<td>'+ (i + 1) +'</td>'+
                            '<td>'+data[i].username+'</td>'+
                            '<td>'+data[i].ip+'</td>'+
                            '<td>'+data[i].login_date+'</td>'+
                            '<td>'+data[i].logout_date+'</td>'+
                            '</tr>';
                    }
                    //$('#lfeat_tb').html(html);
                    $('#ulog_tb tbody').prepend(html);
                    $('#ulog_tb').dataTable({
                        //destroy:true,
                        retrieve: true,
                        data: tab_feat[html],
                        //dom:'Bfrtip',
                    });
                }
            });
        }

        // delete activity logs
        $('#delact').click(function(){
            var checkbox = $('.del_alog:checked');
            if(checkbox.length > 0) { var cbox_value = [];
                $(checkbox).each(function(){ cbox_value.push($(this).val());
               });
                $.ajax({
                    url:"<?php echo site_url(); ?>admin/delete_aall",
                    method:"POST",
                    data:{cbox_value:cbox_value},
                    success:function()
                    { $('.removeRow').fadeOut(1500);
                        $("#actl").load(window.location + " #actl");
                    load_activitylogs();}
                })
            } else { alert('Select atleast One Record');}
        });
        // delete user logs
        $('#delulogs').click(function(){
            var checkbox = $('.del_ulog:checked');
            if(checkbox.length > 0) { var ubox_value = [];
                $(checkbox).each(function(){ ubox_value.push($(this).val());
                });
                $.ajax({
                    url:"<?php echo site_url(); ?>admin/delete_uall",
                    method:"POST",
                    data:{ubox_value:ubox_value},
                    success:function()
                    { $('.removeRow').fadeOut(1500);
                        $("#userld").load(window.location + " #userld");
                        load_userlogs();}
                })
            } else { alert('Select atleast One Record');}
        });
        $('#btn_savef').on('click',function(){
            var pfeat = $('#pfeat').val();
            if ($('#pfeat').val().length<3) {
                alert ("Feature Name is Required");
                $('#pfeat').focus();
                return false;
            }
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/savefeat')?>",
                dataType : "JSON",
                data : {pfeat:pfeat },
                success: function(data){
                    if(data.error){
                        alert(data.error); }else{
                        alert(data.message);
                    $('[name="pfeat"]').val("");
                    $('#Modal_Add').modal('hide');
                    load_features();}
                }
            });
            return false;
        });
        //get data for update record property feature
        $('#lfeat_tb').on('click','.item_edit',function(){
            var fid = $(this).data('fid');
            var feature_name = $(this).data('feature_name');
            $('#Modal_Edit').modal('show');
            $('[name="fid_edit"]').val(fid);
            $('[name="feature_name_edit"]').val(feature_name);

        });
//update record to database for features
        $('#btn_update').on('click',function(){
            var fid = $('#fid_edit').val();
            var feature_name = $('#feature_name_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/update_feature')?>",
                dataType : "JSON",
                data : {fid:fid , feature_name:feature_name},
                success: function(data){
                    if(data.error){ alert(data.error);}else{
                    $('[name="fid_edit"]').val("");
                    $('[name="feature_name_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
//location.reload();
                    //$("#lfeat_tb").load(window.location + " #lfeat_tb");
                    //$("#lfeat_tb").load(location.href + " #lfeat_tb");
                   // alert("Property Features Updated Successfully!");
                    load_features();}
                }

            });
            return false;
        });
        //get data for delete record poperty features
        $('#lfeat_tb').on('click','.item_delete',function(){
            var fid = $(this).data('fid');
            $('#Modal_Delete').modal('show');
            $('[name="fid_delete"]').val(fid);
        });
        //delete record to database for property features
        $('#btn_delete').on('click',function(){
            var fid = $('#fid_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/delfeat')?>",
                dataType : "JSON",
                data : {fid:fid},
                success: function(data){
                    $('[name="fid_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    load_features();
                }
            });
            return false;
        });

        //Add the Company
        if ($("#addCompy").length > 0) {
        $("#addCompy").validate({
            rules: {
                txtCpname: {
                    required: true,
                },
                txtCpemail: {
                    required: true,
                    email:true,
                },
                txtCpphone: {
                    required: true,
                    minlength: 11,
                },

            },
            messages: {
                txtCpemail: {
                    required: "Please enter valid email",
                    email: "Please enter valid email",
                    //maxlength: "The email name should less than or equal to 50 characters",
                },
                txtCpphone: {
                    required: "Please enter valid Office Phone",
                    minlength: "The Office Phone Number should not be less than  11 Digit",
                },
            },

            submitHandler: function(form) {
                var form_action = $("#addCompy").attr("action");
                $.ajax({
                    data: $('#addCompy').serialize(),
                    url: form_action,
                    async : true,
                    type: "POST",
                    dataType: 'json',
                    success: function (res) {
                        if(res.error){
                        alert(res.error);
                        }else{
                            alert(res.msg);
                        var student = '';
                        var tab_compy = [];
                        var gcomp = res.recd;
                        var count = 0;
                        //$('#compy_tb tbody').empty();
                        // for(i=0; i<res.length; i++) {
                            //location.reload(true);
                            $('#Modal_compyAdd').modal('hide');
                            $.each(gcomp,function (i,d) {
                                tab_compy[count]=[
                        count+1,
                        d.compy_n,
                        d.compy_add,
                        d.email,
                        d.phone,
                       '<a data-id="' + d.id + '" class="btn btn-primary btnEditc">Edit</a>&nbsp;&nbsp;<a data-id="' + d.id + '" class="btn btn-danger btnDelete">Delete</a>'
                                ];
                                count++;
                            });
                            //$('#compy_tb tbody').prepend(student);
                        //$('#addCompy')[0].reset();
                        $('#compy_tb').dataTable({
                            //retrieve: true,
                            destroy: true,
                            data: tab_compy,
                            //dom:'Bfrtip',
                        });

                    }
                    },
                   // error: function (data) {
                        //alert(data);
                   // }

                });
            }
        });}

//delete company info
        $('body').on('click', '.btnDelete', function () {
            var id = $(this).attr('data-id');
            $.get('<?php echo site_url('admin/delcompy/')?>'+id, function (data) {
                $('#compy_tb tbody #'+ id).remove();
                $("#compy_tb ").load(window.location + " #compy_tb ");
            })
        });
        //get data for delete user record
    $('#lusers_tb').on('click','.userDelete',function(){
        var fid = $(this).data('fid');
        var pd =  $(this).data('pag');
        $('#userModal_Delete').modal('show');
        $('[name="fid_delete"]').val(fid);
        $('[name="pag_d"]').val(pd);
    });
    //delete users record from database
    $('#btn_delete_users').on('click',function(){
        var fid = $('#fid_delete').val();
        var pag = $('#pag_d');
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('admin/delusers')?>",
            dataType : "JSON",
            data : {fid:fid},
            success: function(data){
                $('[name="fid_delete"]').val("");
                $('#userModal_Delete').modal('hide');
                $("#ulist").load(window.location + " #ulist");
              load_users(pag);
            }
        });
        return false;
    });

        //get data for delete property
        $('#lpro_tb').on('click','.proDelete',function(){
            var fid = $(this).data('fid');
            var ud = $(this).data('userd');
            var pd =  $(this).data('pag');
            $('#propModal_Delete').modal('show');
            $('[name="pid_delete"]').val(fid);
            $('[name="uid_d"]').val(ud);
            $('[name="pag_d"]').val(pd);
        });
        //get data for delete property veri
        $('#lveri_tb').on('click','.proDelete',function(){
            var fid = $(this).data('fid');
            var ud = $(this).data('userd');
            var pd =  $(this).data('pag');
            $('#propModal_Delete').modal('show');
            $('[name="pid_delete"]').val(fid);
            $('[name="uid_d"]').val(ud);
            $('[name="pag_d"]').val(pd);
        });
        //get data for delete property buiding
        $('#lbuild_tb').on('click','.proDelete',function(){
            var fid = $(this).data('fid');
            var ud = $(this).data('userd');
            var pd =  $(this).data('pag');
            $('#propModal_Delete').modal('show');
            $('[name="pid_delete"]').val(fid);
            $('[name="uid_d"]').val(ud);
            $('[name="pag_d"]').val(pd);
        });
        //get data for delete property non-building
        $('#lnonbuild_tb').on('click','.proDelete',function(){
            var fid = $(this).data('fid');
            var ud = $(this).data('userd');
            var pd =  $(this).data('pag');
            $('#propModal_Delete').modal('show');
            $('[name="pid_delete"]').val(fid);
            $('[name="uid_d"]').val(ud);
            $('[name="pag_d"]').val(pd);
        });
        //delete property from database
        $('#btn_delete_pro').on('click',function(){
            var fid = $('#pid_delete').val();
            var pag = $('#pag_d');
           var nid = $('#uid_d');
           alert(nid);
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/delpro')?>",
                dataType : "JSON",
                data : {fid:fid},
                success: function(data){
                    $('[name="pid_delete"]').val("");
                    $('#propModal_Delete').modal('hide');
                   load_property(pag,nid);

                }
            });
            return false;
        });

        $(document).on('click','.vstatus',function(){
            //var status = ($(this).data('status')) ? '1' : '0';
            var status = ($(this).hasClass("btn-success")) ? '0' : '1';
            var msg = (status=='0')? 'Cancel' : 'Verify';
            if(confirm("Are you sure you want to "+ msg + " This User !")){
                var current_element = $(this);
                url = "<?php echo site_url('admin/vuser/')?>";
                $.ajax({
                    type:"POST",
                    url: url,
                    data: {id:$(current_element).attr('data'),status:status},
                    success: function(data)
                    {  load_users();
                     }
                });
            }
        });
/// property verification
        $(document).on('click','.vproperty',function(){
           var ud = $(this).attr('data_userd');
            var pd =  $(this).attr('data_pag');
            var status = ($(this).hasClass("btn-success")) ? '0' : '1';
            var msg = (status=='0')? 'Cancel' : 'Verify';
            if(confirm("Are you sure you want to "+ msg + " This Property !")){
                var current_element = $(this);
                url = "<?php echo site_url('admin/vproperty/')?>";
                $.ajax({
                    type:"POST",
                    url: url,
                    data: {id:$(current_element).attr('data'),status:status,ud:ud},
                    success: function(data)
                    {  $("#veril").load(window.location + " #veril");
                        load_property(pd,ud);
                    }
                });
            }
        });



    //When click edit company
    $('body').on('click', '.btnEditc', function () {
        var company_id = $(this).attr('data-id');
        $.ajax({
             url: "<?php echo site_url('admin/ecomp/')?>" + company_id,
            type: "GET",
            dataType: 'JSON',
            success: function (res) { var gcomp = res.data;
                $.each(gcomp,function (i,d) {
                   $('#compupdateM').modal('show');
                    $('#updateCompy #txtcid').val(d.id);
                    $('#updateCompy #txtuid').val(d.uid);
                    $('#updateCompy #txtCpname').val(d.compy_n);
                    $('#updateCompy #txtCpemail').val(d.email);
                    $('#updateCompy #txtCpphone').val(d.phone);
                    $('#updateCompy #txtCpcnt').val(d.compy_add);
                    $('#updateCompy #txtCpdes').val(d.compy_desc);
                   // $('#updateCompy #state option[value="'+id.state+'"]').prop('selected', true);
                    $("#updateCompy #state2").val(d.state).attr('selected','selected');
                    //$("#updateCompy #lga").val(d.clga).attr('selected','selected');
                    //$('#state').val(d.state);
                   var lga = $('#updateCompy #lga2');
                    lga.empty();
                    lga.append(
                        '<option selected="selected" value="'+d.clga+'">'+d.lga+'</option>'
                    );
                })
            },
            error: function (data) {
            }
        });
    });

    //When click load user detail
    $('body').on('click', '.userEdit', function () {
        var company_id = $(this).attr('data-fid');
        var pag = $(this).attr('data-pag');
        $.ajax({
            url: "<?php echo site_url('admin/euser/')?>" + company_id,
            type: "GET",
            dataType: 'JSON',
            success: function (res) { var gcomp = res.data;
                $.each(gcomp,function (i,d) {
                    $('#userupdateM').modal('show');
                    $('#userupdateM #txtcid').val(d.id);
                    $('#userupdateM #txtpag').val(pag);
                   $('#userupdateM #txtuname').val(d.username);
                    $('#userupdateM #txtfname').val(d.fname);
                   $('#userupdateM #txtlname').val(d.lname);
                   $('#userupdateM #txtoname').val(d.oname);
                    $('#userupdateM #txtrole').val(d.role).attr('selected','selected');
                    $('#userupdateM #txtemail').val(d.email);
                    $('#userupdateM #txtphone').val(d.phone);
                    $('#userupdateM #txtpass').val(d.pass);
                    $('#userupdateM #txtgender').val(d.gender).attr('selected','selected');
                    ///$('#updateCompy #state option[value="'+id.state+'"]').prop('selected', true);
                })
            },
            error: function (data) {
            }
        });
    });




    //Edit the Company
    if ($("#updateCompy").length > 0) {
        $("#updateCompy").validate({
            rules: {
                txtCpname: {
                    required: true,
                },
                txtCpemail: {
                    required: true,
                    email:true,
                },
                txtCpphone: {
                    required: true,
                    minlength: 11,
                },

            },
            messages: {
                txtCpemail: {
                    required: "Please enter valid email",
                    email: "Please enter valid email",
                    //maxlength: "The email name should less than or equal to 50 characters",
                },
                txtCpphone: {
                    required: "Please enter valid Office Phone",
                    minlength: "The Office Phone Number should not be less than  11 Digit",
                },
            },

            submitHandler: function(form) {
                var form_action = $("#updateCompy").attr("action");
               $.ajax({
                    data: $('#updateCompy').serialize(),
                    url: form_action,
                    async : true,
                    type: "POST",
                    dataType: 'json',
                    success: function (res) {
                        if(res.error){
                            alert(res.error);
                        }else{
                            alert(res.msg);
                            var student = '';
                            var tab_compy = [];
                            var gcomp = res.recd;
                            var count = 0;
                            //$('#compy_tb tbody').empty();
                            // for(i=0; i<res.length; i++) {
                            //location.reload(true);
                            $('#compupdateM').modal('hide');
                            $.each(gcomp,function (i,d) {
                                tab_compy[count]=[
                                    count+1,
                                    d.compy_n,
                                    d.compy_add,
                                    d.email,
                                    d.phone,
                                    '<a data-id="' + d.id + '" class="btn btn-primary btnEditc">Edit</a>&nbsp;&nbsp;<a data-id="' + d.id + '" class="btn btn-danger btnDelete">Delete</a>'
                                ];
                                count++;
                            });
                            //$('#compy_tb tbody').prepend(student);
                            //$('#addCompy')[0].reset();
                            $('#compy_tb').dataTable({
                                //retrieve: true,
                                destroy: true,
                                data: tab_compy,
                                //dom:'Bfrtip',
                            });

                        }
                    },
                    // error: function (data) {
                    //alert(data);                    // }


                });
            }
        });}

    //update user information by admin
    if ($("#updateUser").length > 0) {
        $("#updateUser").validate({
            rules: {
                txtuname: {
                    required: true,
                },
                txtemail: {
                    required: true,
                    email:true,
                },
                txtphone: {
                    required: true,
                    minlength: 11,
                },

            },
            messages: {
                txtemail: {
                    required: "Please enter valid email",
                    email: "Please enter valid email",
                    //maxlength: "The email name should less than or equal to 50 characters",
                },
                txtphone: {
                    required: "Please enter valid User Phone Number",
                    minlength: "The User Phone Number should not be less than  11 Digit",
                },
            },

            submitHandler: function(form) {
                var form_action = $("#updateUser").attr("action");
                var pagn =  $('#userupdateM #txtpag').val();
                var vname = "";
                if(pagn == '4'){ vname = "olist";  }else if(pagn == '3'){ vname = "alist";}else{ vname = "ulist";  }
             $.ajax({
                    data: $('#updateUser').serialize(),
                    url: form_action,
                    async : true,
                    type: "POST",
                    dataType: 'json',
                    success: function (res) {
                        if(res.error){
                            alert(res.error);
                        }else{
                            alert(res.msg);
                            var student = '';
                            var tab_compy = [];
                            //var gcomp = res.recd;
                            var count = 0;
                            $('#userupdateM').modal('hide');
                            $("#" + vname).load(window.location + " #" + vname);
                            load_users(pagn);
                        }
                    },
                    // error: function (data) {
                    //alert(data);
                    // }

                });
            }
        });}

        //add user information by admin
        if ($("#addUser").length > 0) {
            $("#addUser").validate({
                rules: {
                    txtuname: {
                        required: true,
                    },
                    txtemail: {
                        required: true,
                        email:true,
                    },
                    txtphone: {
                        required: true,
                        minlength: 11,
                    },

                },
                messages: {
                    txtemail: {
                        required: "Please enter valid email",
                        email: "Please enter valid email",
                        //maxlength: "The email name should less than or equal to 50 characters",
                    },
                    txtphone: {
                        required: "Please enter valid User Phone Number",
                        minlength: "The User Phone Number should not be less than  11 Digit",
                    },
                },

                submitHandler: function(form) {
                    var form_action = $("#addUser").attr("action");
                    $.ajax({
                        data: $('#addUser').serialize(),
                        url: form_action,
                        async : true,
                        type: "POST",
                        dataType: 'json',
                        success: function (res) {
                            if(res.error){
                                alert(res.error);
                            }else{
                                alert(res.msg);
                                var student = '';
                                var tab_compy = [];
                                //var gcomp = res.recd;
                                var count = 0;
                                $('#adduserM').modal('hide');
                                $("#ulist").load(window.location + " #ulist");
                                $("#olist").load(window.location + " #olist");
                                $("#alist").load(window.location + " #alist");
                                load_users();
                            }
                        },
                        // error: function (data) {
                        //alert(data);
                        // }

                    });
                }
            });}

        //add property information by admin
        if ($("#postPro").length > 0) {
            $("#postPro").validate({
                rules: {
                    txtpst: {
                        required: true,
                    },
                    txtcati: {
                        required: true,
                    },
                    txttype: {
                        required: true,

                    },
                    state3: {
                        required: true,

                    },
                    lga: {
                        required: true,

                    },
                    txtloc: {
                        required: true,
                        minlength: 10,
                        maxlength: 200,
                    },
                    txtpmin: {
                        required: true,
                        digits: true,
                    },

                },
                messages: {
                    txtpst: {
                        required: "Please Property what To Do is Required",
                    },
                    txtcati: {
                        required: "Please Property Category is Required",
                    },
                    txttype: {
                        required: "Please Property Type is Required",
                    },
                    state3: {
                        required: "Please Property State is Required",
                    },
                    txtloc: {
                        required: "Please Property Address is Required",
                        minlength: "Address must be greater than 10 chars",
                        maxlength: "Address must not be greater than 200 chars",
                    },
                    txtpmin: {
                        required: "Please Property Price is Required",
                        digits: "Please enter Figures Only",
                    },
                },

                submitHandler: function(form) {
                    form.preventDefault();
                    //$('.response-message').removeClass('d-none');
                   // $('#btn_savef').html('Sending..');
                    var form_action = $("#postPro").attr("action");
                    var form_data = new FormData(this);
                    $.ajax({
                        data: form_data,
                        url: form_action,
                        async : true,
                        type: "POST",
                        dataType: 'json',
                        cache:false,
                        contentType:false,
                        processData:false,
                        success: function (res) {
                              if(res.error){
                                alert(res.error);
                            }else{
                                alert(res.msg);
                                var student = '';
                                var tab_compy = [];
                                var count = 0;
                                  $('#postProM').modal('hide');
                                  //$("#postPro")[0].reset();
                                load_property();
                            }
                        },
                         //error: function (data) {
                        //alert(data);
                        // }

                    });
                }
            });}

        //update property information by admin
        if ($("#updatePro").length > 0) {
            $("#updatePro").validate({
                rules: {
                    txtpst: {
                        required: true,
                    },
                    txtcati: {
                        required: true,
                    },
                    txttype: {
                        required: true,

                    },
                    state4: {
                        required: true,

                    },
                    lga: {
                        required: true,

                    },
                    txtloc: {
                        required: true,
                        minlength: 10,
                        maxlength: 200,
                    },
                    txtpmin: {
                        required: true,
                        digits: true,
                    },

                },
                messages: {
                    txtpst: {
                        required: "Please Property what To Do is Required",
                    },
                    txtcati: {
                        required: "Please Property Category is Required",
                    },
                    txttype: {
                        required: "Please Property Type is Required",
                    },
                    state4: {
                        required: "Please Property State is Required",
                    },
                    txtloc: {
                        required: "Please Property Address is Required",
                        minlength: "Address must be greater than 10 chars",
                        maxlength: "Address must not be greater than 200 chars",
                    },
                    txtpmin: {
                        required: "Please Property Price is Required",
                        digits: "Please enter Figures Only",
                    },
                },

                submitHandler: function(form) {
                    //$('.response-message').removeClass('d-none');
                    // $('#btn_savef').html('Sending..');
                    var form_action = $("#updatePro").attr("action");
                    $.ajax({
                        data: $('#updatePro').serialize(),
                        url: form_action,
                        async : true,
                        type: "POST",
                        dataType: 'json',
                        success: function (res) {
                            if(res.error){
                                alert(res.error);
                            }else{
                                alert(res.msg);
                                var student = '';
                                var tab_compy = [];
                                var count = 0;
                                $('#updateProM').modal('hide');
                                //$("#postPro").reset();
                                load_property();
                            }
                        },
                        //error: function (data) {
                        //alert(data);
                        // }

                    });
                }
            });}


    });

    $("#eprofile").on('submit',function (e) {
        e.preventDefault();
//            var f_data = $(this).serializeArray();
        var f_data = new FormData(this);
        $.ajax({
            url:"<?php echo base_url('admin/upprofile')?>",
            data:f_data,
            dataType:'json',
            type:'post',
            cache:false,
            contentType:false,
            processData:false,
            success:function (r) {
                if(r.error){
                    alert(r.error);
                }else{
                    alert(r.message);
                    //location.reload();
                    $("#eprofile").load(window.location + " #eprofile");
                    $("#preview-image").load(window.location + " #preview-image");
                    $("#simg").load(window.location + " #simg");
                    $("#nimg").load(window.location + " #nimg");
                }
            },
            error:function (x,s,er) {
                alert(er);
            }
        });
    });


    $('#state').on('change',function(){ var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:"GET",
                url: "<?php echo site_url('admin/getlga/')?>"+stateID,
                success:function(res){
                   if(res){ $("#lga ").empty();
                        $("#lga ").append('<option>Select LGA</option>');
                        var dataObj = jQuery.parseJSON(res);
                        if(dataObj){ $(dataObj).each(function(){
                                $("#lga ").append('<option value="'+this.lga_id+'">'+this.lga+'</option>');
                            });  }else{  $("#lga ").empty();}  }else{   $("#lga ").empty();}}
            });  }else{ $("#lga ").append('<option value="">Select LGA</option>');} });

    $('#state1').on('change',function(){ var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:"GET",
                url: "<?php echo site_url('admin/getlga/')?>"+stateID,
                success:function(res){
                    if(res){ $("#lga1 ").empty();
                        $("#lga1 ").append('<option>Select LGA</option>');
                        var dataObj = jQuery.parseJSON(res);
                        if(dataObj){ $(dataObj).each(function(){
                            $("#lga1 ").append('<option value="'+this.lga_id+'">'+this.lga+'</option>');
                        });  }else{  $("#lga1 ").empty();}  }else{   $("#lga1 ").empty();}}
            });  }else{ $("#lga1 ").append('<option value="">Select LGA</option>');} });

    $('#state2').on('change',function(){ var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:"GET",
                url: "<?php echo site_url('admin/getlga/')?>"+stateID,
                success:function(res){
                    if(res){ $("#lga2 ").empty();
                        $("#lga2 ").append('<option>Select LGA</option>');
                        var dataObj = jQuery.parseJSON(res);
                        if(dataObj){ $(dataObj).each(function(){
                            $("#lga2 ").append('<option value="'+this.lga_id+'">'+this.lga+'</option>');
                        });  }else{  $("#lga2 ").empty();}  }else{   $("#lga2 ").empty();}}
            });  }else{ $("#lga2 ").append('<option value="">Select LGA</option>');} });

    $('#state3').on('change',function(){ var stateID = $(this).val();
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

    $('#state4').on('change',function(){ var stateID = $(this).val();
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

    //When click load user detail
    $('body').on('click', '.proEdit', function () {
        var company_id = $(this).attr('data-fid');
        $.ajax({
            url: "<?php echo site_url('admin/fetchpro/')?>" + company_id,
            type: "GET",
            dataType: 'JSON',
            success: function (res) { var gcomp = res.data; var gfeat = res.data2;
                $.each(gcomp,function (i,d) {
                    $('#updateProM').modal('show');
                    $("#updatePro")[0].reset();
                    //var title = "Update Property Record";
                    //("#pro_model_title").html(title);
                    $('#updateProM #txtpro_id').val(d.id);
                    $('#updateProM #txtpown').val(d.pty_owner).attr('selected','selected');
                    $('#updateProM #txtpstn').val(d.pro_what_to_do).attr('selected','selected');
                    $('#updateProM #txtagent').val(d.pro_agent).attr('selected','selected');
                    $('#updateProM #txtcatio').val(d.pro_cate).attr('selected','selected');
                    //$('#updateProM #txttypeo').val(d.pro_type).attr('selected','selected');
                    $('#updateProM #txtbedr').val(d.no_of_bed).attr('selected','selected');
                    $('#updateProM #txtbathr').val(d.no_of_bathroom).attr('selected','selected');
                    var type = $('#updateProM #txttypeo');
                    type.empty();
                    type.append(
                        '<option selected="selected" value="'+d.id+'">'+d.ptype+'</option>'
                    );
                    $('#updateProM #state4').val(d.state).attr('selected','selected');
                    var lga = $('#updateProM #lga');
                    lga.empty();
                    lga.append(
                        '<option selected="selected" value="'+d.lga_id+'">'+d.lga+'</option>'
                    );
                  $('#updateProM #txtpmin').val(d.amt_min);
                    $('#updateProM #txtpmax').val(d.amt_max);
                    $('#updateProM #txtloc').val(d.pro_location);
                    $('#updateProM #cperiod').val(d.cperiod).attr('selected','selected');
                })
                //$('#updatePro #air').prop("checked", false);
               $.each(gfeat, function(i, d) {
                    //$('#postProM #air input[type=checkbox]').attr('checked',false);
                    $('#updateProM #air' + d.pro_features).prop( "checked", true );
                })
            },
            error: function (data) {
            }
        });
    });
// verify/ view tenant
    //When click load user detail
    $('body').on('click', '.tenVeri', function () {
        var tensel_id = $(this).attr('data-fid');
        var tenpag_id = $(this).attr('data-pag');
        if(tenpag_id == '1'){ var title = "Tenant Data Verification! "; }
        $.ajax({
            url: "<?php echo site_url('admin/ften_d/')?>" + tensel_id,
            type: "GET",
            dataType: 'JSON',
            success: function (res) { var gcomp = res.data; var gfeat = res.data2;
                $.each(gcomp,function (i,d) {
                    $('#veriTenant').modal('show');
                    $("#tenVerify")[0].reset();
                    $("#ten_model_title").html(title);
                    var image = "<?= BASEURL."assets/img/users/" ?>"+ d.pic;
                    var dimg = "<?= BASEURL."assets/img/users/default_img.jpg" ?>";
                    var ckh = checkFileExist(image);
                    if(ckh == true){ var imgn = image; }else{ var imgn = dimg ;}
                    var tenname = ' '+d.fname +' '+ d.lname +' '+ d.oname ;
                    var tstatus = d.pay_status ;
                    var st = (tstatus=='0')? 'Pending' : 'Paid';
                    var movein = d.move_in_date ;
                    var rentexp = d.rent_expire_date ;
                    var difd = monthDiff(movein,rentexp);
                    var cp = d.cperiod ;
                    var amt = d.amt_min ;
                    var namt = 0.00;
                    if(cp == "12"){ namt = "&#8358; " + number_format(amt,2,".",","); }else{ namt = "&#8358; " + number_format(difd * amt,2,".",","); }
                    $('#veriTenant #txtname').html(tenname);
                    $('#veriTenant #ima').html('<img src="'+ imgn +'" alt="Avater" style="float: center;"  height="150" width="150" >');
                    $('#veriTenant #txtgender').html(d.gender);
                    $('#veriTenant #txtadd').html(d.address);
                    $('#veriTenant #txtemail').html(d.email);
                    $('#veriTenant #txtphone').html(d.phone);
                    $('#veriTenant #txtpname').html(d.pro_ref);
                    $('#veriTenant #txtloc').html(d.pro_location);
                    $('#veriTenant #txtmdate').html(d.move_in_date);
                    $('#veriTenant #txtexpdate').html(d.rent_expire_date);
                    $('#veriTenant #txtvstatus').html(st);
                    $('#veriTenant #txtdue').html(namt)
                    $('#veriTenant #txtpamt').html(st)
                    $('#veriTenant #txtpstatus').html(st)
                    $('#updateProM #txtpown').val(d.pty_owner).attr('selected','selected');
                    $('#updateProM #txtpstn').val(d.pro_what_to_do).attr('selected','selected');
                    $('#updateProM #txtagent').val(d.pro_agent).attr('selected','selected');
                    $('#updateProM #txtcatio').val(d.pro_cate).attr('selected','selected');
                    //$('#updateProM #txttypeo').val(d.pro_type).attr('selected','selected');
                    $('#updateProM #txtbedr').val(d.no_of_bed).attr('selected','selected');
                    $('#updateProM #txtbathr').val(d.no_of_bathroom).attr('selected','selected');
                    var type = $('#updateProM #txttypeo');
                    type.empty();
                    type.append(
                        '<option selected="selected" value="'+d.id+'">'+d.ptype+'</option>'
                    );
                    $('#updateProM #state4').val(d.state).attr('selected','selected');
                    var lga = $('#updateProM #lga');
                    lga.empty();
                    lga.append(
                        '<option selected="selected" value="'+d.lga_id+'">'+d.lga+'</option>'
                    );
                    $('#updateProM #txtpmin').val(d.amt_min);
                    $('#updateProM #txtpmax').val(d.amt_max);
                    $('#updateProM #txtloc').val(d.pro_location);
                    $('#updateProM #cperiod').val(d.cperiod).attr('selected','selected');
                })
                //$('#updatePro #air').prop("checked", false);
                $.each(gfeat, function(i, d) {
                    //$('#postProM #air input[type=checkbox]').attr('checked',false);
                    $('#updateProM #air' + d.pro_features).prop( "checked", true );
                })
            },
            error: function (data) {
            }
        });
    });

    function userAction(tp, id){
        id = (typeof id == "undefined")?'':id;
        var userData = '', frmElement = '';
        if(tp == 'add'){
            frmElement = $("#modalUserAddEdit");
            userData = frmElement.find('form').serialize();
        }else if (tp == 'edit'){
            frmElement = $("#modalUserAddEdit");
            userData = frmElement.find('form').serialize();
        }else{

            frmElement = $(".row");
            userData = 'id='+id;

        }
alert(id);
        frmElement.find('.statusMsg').html('');
        $.ajax({
            url: '<?php echo base_url('admin/'); ?>'+tp,
            dataType: 'json',
            type: 'post',
            data: userData,
            beforeSend: function(){
                //frmElement.find('form').css("opacity", "0.5");
                $("#protype_tb").load(window.location + " #protype_tb");
            },
            success:function(resp){
                frmElement.find('.statusMsg').html(resp.msg);

                if(resp.status == 1){
                    if(type == 'add'){
                        frmElement.find('form')[0].reset();
                    }


                }

                frmElement.find('form').css("opacity", "");
            }
        });
    }
    // Image preview
    var previewImageFile = function(event) {
        var output = document.getElementById('preview-image');
        output.removeAttribute("class");
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    };
    function checkFileExist(urlToFile) {
        var xhr = new XMLHttpRequest();
        xhr.open('HEAD', urlToFile, false);
        xhr.send();

        if (xhr.status == "404") {
            return false;
        } else {
            return true;
        }
    }

    function ShowHideDiv3(chkPenalty){
        var cat = document.getElementById("txtps");
        var num = randomStr(12,'ABCDEFGHIJKLMNOPQRSTUVWSYZabcdefghijklmnopqrstuvwsyz1234567890');
        cat.style.display = chkPenalty.checked ? "block" : "none";
        $('#txtpass').val(num);
     }

    function ShowHideDiv4(chkPenalty){
        var cat = document.getElementById("txtp2");
        var num = randomStr(12,'ABCDEFGHIJKLMNOPQRSTUVWSYZabcdefghijklmnopqrstuvwsyz1234567890');
        cat.style.display = chkPenalty.checked ? "block" : "none";
        $('#txtpass2').val(num);
    }
    function randomStr(len, arr) {
        var ans = '';
        for (var i = len; i > 0; i--) {
            ans +=
                arr[Math.floor(Math.random() * arr.length)];
        }
        return ans;
    }
    $("#txtcati").on('change',function () {
        var valu = $(this).val();
        if(valu === null || valu === ''){

        }else {
            $.ajax({
                url:'<?php echo site_url("admin/gettype")?>',
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
    $("#txtcatio").on('change',function () {
        var valu = $(this).val();
        if(valu === null || valu === ''){

        }else {
            $.ajax({
                url:'<?php echo site_url("admin/gettype")?>',
                type:'post',
                data:{'tid':valu},
                dataType:'json',
                success:function (r) {
                    if(r.error){

                    }else{
                        var options = r.b_types;
                        $("#txttypeo").empty();
                        $.each(options,function (key,value) {
                            $('#txttypeo').append('<option value='+value.id+ '>'+ value.ptype+'</option>');
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
            $("#pfeat2").show();
            $("#pqty").show();
        } else {
            $("#pfeat2").hide();
            $("#pqty").hide();
        }
    });
    window.onload = function (){
        if($('#txtpstn').val() < "3") {
            $("#pfeatn").show();
            $("#pqtyn").show();
        } else {
            $("#pfeatn").hide();
            $("#pqtyn").hide();
        }
    }
    var x = 0;
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

    function number_format(number, decimals, decPoint, thousandsSep){
        decimals = decimals || 0;
        number = parseFloat(number);

        if(!decPoint || !thousandsSep){
            decPoint = '.';
            thousandsSep = ',';
        }

        var roundedNumber = Math.round( Math.abs( number ) * ('1e' + decimals) ) + '';
        var numbersString = decimals ? roundedNumber.slice(0, decimals * -1) : roundedNumber;
        var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : '';
        var formattedNumber = "";

        while(numbersString.length > 3){
            formattedNumber += thousandsSep + numbersString.slice(-3)
            numbersString = numbersString.slice(0,-3);
        }

        return (number < 0 ? '-' : '') + numbersString + formattedNumber + (decimalsString ? (decPoint + decimalsString) : '');
    }
    $(function() {
    //If check_all checked then check all table rows
    $("#chk_all").on("click", function () {
        if ($("#chk_all").prop("checked")) {
            $("input:checkbox[name='row-check']").prop("checked", true);
        } else {
            $("input:checkbox[name='row-check']").prop("checked", false);
        }
    });
        $("#chk_allv").on("click", function () {
            if ($("#chk_allv").prop("checked")) {
                $("input:checkbox[name='row-checkv']").prop("checked", true);
            } else {
                $("input:checkbox[name='row-checkv']").prop("checked", false);
            }
        });
        $("#chk_allu").on("click", function () {
            if ($("#chk_allu").prop("checked")) {
                $("input:checkbox[name='row-checku']").prop("checked", true);
            } else {
                $("input:checkbox[name='row-checku']").prop("checked", false);
            }
        });
        // Check each table row checkbox
    $("input:checkbox[name='row-check']").on("change", function () {
            var total_check_boxes = $("input:checkbox[name='row-check']").length;
            var total_checked_boxes = $("input:checkbox[name='row-check']:checked").length;
alert(total_checked_boxes);
            // If all checked manually then check check_all checkbox
            if (total_check_boxes === total_checked_boxes) {
                $("#chk_all").prop("checked", true);
            }
            else {
                $("#chk_all").prop("checked", false);
            }
        });
    });
    function monthDiff(startDate, endDate) {
        var months;
        var d1 = new Date(startDate);
        var d2 = new Date(endDate);
        months = (d2.getFullYear() - d1.getFullYear()) * 12;
        months -= d1.getMonth() + 1;
        months += d2.getMonth();
        // edit: increment months if d2 comes later in its month than d1 in its month
        if (d2.getDate() >= d1.getDate())
            months++
        // end edit
        return months <= 0 ? 0 : months + 1;
    }
</script>
