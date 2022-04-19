<?php
/**
 * Created by PhpStorm.
 * User: Akubest Tech
 * Date: 8/3/2021
 * Time: 10:11 PM
 */
$rname = $info['rolename'];
$usercode = $info['user_id'];
$userrole = $info['role'];
?>

<style>
    .contimg {
        position: relative;
        width: 100%;
        max-width: 300px;
    }
    .overlaym {
        position: absolute;
        bottom: 0;
        background: rgb(0, 0, 0);
        background: rgba(0, 0, 0, 0.5); /* Black see-through */
        color: #f1f1f1;
        width: 10%;
        transition: .5s ease;
        opacity:0;
        color: white;
        font-size: 20px;
        padding: 2px;
        text-align: center;
        margin: 1px 5px -95px -65px;
    }
    .thumb{
        margin: 24px 5px 20px 0;
        float: left;
        width: 30%;
    }
    .contimg:hover .overlaym {
        opacity: 1;
    }
    #uploadPreview > .column {
        padding: 0 8px;
        width: 50%;
    }
    .error {
        color: #dc3545;
    }
    #uploadPreview:after {
        content: "";
        display: table;
        clear: both;
    }
    .removeRow
    { background-color: #FF0000;
        color:#FFFFFF;  }
    .contmain {
        border: 2px solid #ccc;
        background-color: #eee;
        border-radius: 5px;
        padding: 5px;
        margin: 5px 0;
    }
   .contmain img {
        float: left;
        margin-right: 20px;
       width: 150px;
        border-radius: 0%;
    }
    </style>

    <!-- START HEADER-->

    <!-- END HEADER-->
    <!-- START SIDEBAR-->

    <!-- END SIDEBAR-->

    <div class="content-wrapper">
        <div class="statusMsg"></div>
        <!-- START PAGE CONTENT-->
        <div class="page-content fade-in-up" >
            <div class="row divhead" >
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-success color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">201</h2>
                            <div class="m-b-5">NEW ORDERS</div><i class="ti-shopping-cart widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-info color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">1250</h2>
                            <div class="m-b-5">UNIQUE VIEWS</div><i class="ti-bar-chart widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-warning color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">$1570</h2>
                            <div class="m-b-5">TOTAL INCOME</div><i class="fa fa-money widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-danger color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">108</h2>
                            <div class="m-b-5">NEW USERS</div><i class="ti-user widget-stat-icon"></i>
                            <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row divhead">
                <div class="col-lg-8">
                    <div class="ibox">
                        <div class="ibox-body">
                            <div class="flexbox mb-4">
                                <div>
                                    <h3 class="m-0">Statistics</h3>
                                    <div>Your shop sales analytics</div>
                                </div>
                                <div class="d-inline-flex">
                                    <div class="px-3" style="border-right: 1px solid rgba(0,0,0,.1);">
                                        <div class="text-muted">WEEKLY INCOME</div>
                                        <div>
                                            <span class="h2 m-0">$850</span>
                                            <span class="text-success ml-2"><i class="fa fa-level-up"></i> +25%</span>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="text-muted">WEEKLY SALES</div>
                                        <div>
                                            <span class="h2 m-0">240</span>
                                            <span class="text-warning ml-2"><i class="fa fa-level-down"></i> -12%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <canvas id="bar_chart" style="height:260px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Statistics</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <canvas id="doughnut_chart" style="height:160px;"></canvas>
                                </div>
                                <div class="col-md-6">
                                    <div class="m-b-20 text-success"><i class="fa fa-circle-o m-r-10"></i>Desktop 52%</div>
                                    <div class="m-b-20 text-info"><i class="fa fa-circle-o m-r-10"></i>Tablet 27%</div>
                                    <div class="m-b-20 text-warning"><i class="fa fa-circle-o m-r-10"></i>Mobile 21%</div>
                                </div>
                            </div>
                            <ul class="list-group list-group-divider list-group-full">
                                <li class="list-group-item">Chrome
                                    <span class="float-right text-success"><i class="fa fa-caret-up"></i> 24%</span>
                                </li>
                                <li class="list-group-item">Firefox
                                    <span class="float-right text-success"><i class="fa fa-caret-up"></i> 12%</span>
                                </li>
                                <li class="list-group-item">Opera
                                    <span class="float-right text-danger"><i class="fa fa-caret-down"></i> 4%</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row divhead">
                <div class="col-lg-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Visitors Statistics</div>
                        </div>
                        <div class="ibox-body">
                            <div id="world-map" style="height: 300px;"></div>
                            <table class="table table-striped m-t-20 visitors-table">
                                <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Visits</th>
                                    <th>Data</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <img class="m-r-10" src="./assets/img/flags/us.png" />USA</td>
                                    <td>755</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" style="width:52%; height:5px;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="progress-parcent">52%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="m-r-10" src="./assets/img/flags/Canada.png" />Canada</td>
                                    <td>700</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" style="width:48%; height:5px;" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="progress-parcent">48%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="m-r-10" src="./assets/img/flags/India.png" />India</td>
                                    <td>410</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" style="width:37%; height:5px;" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="progress-parcent">37%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="m-r-10" src="./assets/img/flags/Australia.png" />Australia</td>
                                    <td>304</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar" style="width:36%; height:5px;" aria-valuenow="36" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="progress-parcent">36%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="m-r-10" src="./assets/img/flags/Singapore.png" />Singapore</td>
                                    <td>203</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar" role="progressbar" style="width:35%; height:5px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="progress-parcent">35%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="m-r-10" src="./assets/img/flags/uk.png" />UK</td>
                                    <td>202</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar" style="width:35%; height:5px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="progress-parcent">35%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="m-r-10" src="./assets/img/flags/UAE.png" />UAE</td>
                                    <td>180</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" style="width:30%; height:5px;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="progress-parcent">30%</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Tasks</div>
                            <div>
                                <a class="btn btn-info btn-sm" href="javascript:;">New Task</a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <ul class="list-group list-group-divider list-group-full tasks-list">
                                <li class="list-group-item task-item">
                                    <div>
                                        <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                            <input type="checkbox">
                                            <span class="input-span"></span>
                                            <span class="task-title">Meeting with Eliza</span>
                                        </label>
                                    </div>
                                    <div class="task-data"><small class="text-muted">10 July 2018</small></div>
                                    <div class="task-actions">
                                        <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                        <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                                    </div>
                                </li>
                                <li class="list-group-item task-item">
                                    <div>
                                        <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                            <input type="checkbox" checked="">
                                            <span class="input-span"></span>
                                            <span class="task-title">Check your inbox</span>
                                        </label>
                                    </div>
                                    <div class="task-data"><small class="text-muted">22 May 2018</small></div>
                                    <div class="task-actions">
                                        <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                        <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                                    </div>
                                </li>
                                <li class="list-group-item task-item">
                                    <div>
                                        <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                            <input type="checkbox">
                                            <span class="input-span"></span>
                                            <span class="task-title">Create Financial Report</span>
                                        </label>
                                        <span class="badge badge-danger m-l-5"><i class="ti-alarm-clock"></i> 1 hrs</span>
                                    </div>
                                    <div class="task-data"><small class="text-muted">No due date</small></div>
                                    <div class="task-actions">
                                        <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                        <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                                    </div>
                                </li>
                                <li class="list-group-item task-item">
                                    <div>
                                        <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                            <input type="checkbox" checked="">
                                            <span class="input-span"></span>
                                            <span class="task-title">Send message to Mick</span>
                                        </label>
                                    </div>
                                    <div class="task-data"><small class="text-muted">04 Apr 2018</small></div>
                                    <div class="task-actions">
                                        <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                        <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                                    </div>
                                </li>
                                <li class="list-group-item task-item">
                                    <div>
                                        <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                            <input type="checkbox">
                                            <span class="input-span"></span>
                                            <span class="task-title">Create new page</span>
                                        </label>
                                        <span class="badge badge-success m-l-5">2 Days</span>
                                    </div>
                                    <div class="task-data"><small class="text-muted">07 Dec 2018</small></div>
                                    <div class="task-actions">
                                        <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                        <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Messages</div>
                        </div>
                        <div class="ibox-body">
                            <ul class="media-list media-list-divider m-0">
                                <li class="media">
                                    <a class="media-img" href="javascript:;">
                                        <img class="img-circle" src="./assets/img/users/u1.jpg" width="40" />
                                    </a>
                                    <div class="media-body">
                                        <div class="media-heading">Jeanne Gonzalez <small class="float-right text-muted">12:05</small></div>
                                        <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <a class="media-img" href="javascript:;">
                                        <img class="img-circle" src="./assets/img/users/u2.jpg" width="40" />
                                    </a>
                                    <div class="media-body">
                                        <div class="media-heading">Becky Brooks <small class="float-right text-muted">1 hrs ago</small></div>
                                        <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <a class="media-img" href="javascript:;">
                                        <img class="img-circle" src="./assets/img/users/u3.jpg" width="40" />
                                    </a>
                                    <div class="media-body">
                                        <div class="media-heading">Frank Cruz <small class="float-right text-muted">3 hrs ago</small></div>
                                        <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <a class="media-img" href="javascript:;">
                                        <img class="img-circle" src="./assets/img/users/u6.jpg" width="40" />
                                    </a>
                                    <div class="media-body">
                                        <div class="media-heading">Connor Perez <small class="float-right text-muted">Today</small></div>
                                        <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id = "set_wrapper" class="row divhead" style="display: none;" >
                <div   id ="pro_type" class="pro-comp" style="display: none;" >
                <div class="col-lg-4 " style="">
                    <div class="ibox">
                        <form id="add_pro_form">
                        <div class="ibox-head">
                            <div class="ibox-title">Add Property Type</div>
                        </div>
                        <div class="ibox-body">
                            <div class="form-group">
                                <label>Property Category</label>
                                <select name="cat_name" id="cat-name" class="form-control" required>
                                    <option value="">Select Category</option>
                                   <?php if(isset($b_cats)){
                                    foreach ($b_cats as $cat){
                                    ?>
                                    <option value="<?php echo $cat->id ; ?>"><?php echo $cat->category ; ?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                           <div class="form-group">
                                <label>Property Type</label>
                                <div class="col-sm-14">
                                    <input class="form-control" name="ptype" id="ptype" type="text"  placeholder="property type">
                                </div>
                            </div>

                        </div>
                        <div class="ibox-footer text-center">
                            <button class="btn btn-info" type="submit">Add</button>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-8" style="">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Property Type</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                            </div>
                        </div>
                        <div class="ibox-body">
                            <table class="table table-striped table-bordered table-hover" id="protype_tb">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Property Category</th>
                                    <th>Property Type</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php  if(isset($p_type)){
                                    $count = 1;
                                    foreach ($p_type as $ptyp){
                                        ?>
                                        <tr>
                                            <td><?php echo $count?></td>
                                            <td><?php echo $ptyp->c_name; ?></td>
                                            <td><?php echo $ptyp->ptype; ?></td>
                                            <td><a  data-value="<?php echo $ptyp->id; ?>" onclick="return confirm('Are you sure to delete data?')?userAction('deleten', '<?php echo $ptyp->id; ?>'):false;" class="btn btn-danger rbcat" href="javascript:void(0);">Remove</a> </td>
                                        </tr>
                                        <?php
                                        $count++;
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

                <div   id ="pro_cat" class="pro-comp" style="display: none;" >
                    <div class="col-lg-4 " style="">
                        <div class="ibox">
                            <form id="add_cat_form">
                                <div class="ibox-head">
                                    <div class="ibox-title">Add Property Category </div>
                                </div>
                                <div class="ibox-body">
                                    <div class="form-group">
                                        <label>Property Category</label>
                                        <div class="col-sm-14">
                                            <input class="form-control" name="catn" type="text" id="catn" placeholder="Category">
                                        </div>
                                    </div>

                                </div>
                                <div class="ibox-footer text-center">
                                    <button class="btn btn-info" type="submit">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-8" style="">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Propert Category</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-bordered table-hover" id="example-table2">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Property Category</th>
                                       <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                  <?php  if(isset($b_cats)){
                                    $count = 1;
                                    foreach ($b_cats as $cat){
                                    ?>
                                    <tr>
                                        <td><?php echo $count?></td>
                                        <td><?php echo $cat->category; ?></td>
                                        <td><a data-value="<?php echo $cat->id; ?>" class="btn btn-danger rbcat" href="javascript:void(0);">Remove</a> </td>
                                    </tr>
                                    <?php
                                    $count++;
                                    }
                                    }
                                    ?>



                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div   id ="pro_feat" class="pro-comp" style="display: none;" >

                    <div class="col-lg-12" style="" >
                        <div class="ibox">
                            <div class="ibox-head">

                                <div class="col-md-12">
                                    <div class="float-left" style ="font-size:20px; text-align: center;">Propert Feature List</div>
                                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add Property Feature</a></div>
                                </div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-bordered table-hover" id="feat_tb">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Feature Name</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody id="lfeat_tb">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div   id ="pro_com" class="pro-comp" style="display: none;" >

                    <div class="col-lg-12" style="" >
                        <div class="ibox">
                            <div class="ibox-head">

                                <div class="col-md-12">
                                    <div class="float-left" style ="font-size:20px; text-align: center;">Company Information</div>
                                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_compyAdd"><span class="fa fa-plus"></span> Add Company Information</a></div>
                                </div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-bordered table-hover" id="compy_tb">
                                    <thead >
                                    <tr>
                                        <th>S/N</th>
                                        <th>Company Name</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody id="ncompy_tb">
                                    <?php if(isset($lcompy)){
                                    $count = 1;
                                    foreach($lcompy as $row) {
                                        ?>
                                        <tr id="<?php echo $row->id; ?>">
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $row->compy_n; ?></td>
                                            <td><?php echo $row->compy_add; ?></td>
                                            <td><?php echo $row->email; ?></td>
                                            <td><?php echo $row->phone; ?></td>
                                            <td>
                                                <a data-id="<?php echo $row->id; ?>" class="btn btn-primary btnEditc">Edit</a>
                                                <a data-id="<?php echo $row->id; ?>" class="btn btn-danger btnDelete">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $count++;
                                    }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!--  view add/edit user -->
            <div id="user_wrapper" class="row divhead" style="display: none;">
                <div   id="user_view" class="pro-comp" style="display: none;" >

                    <div class="col-lg-12" style="" >
                        <div class="ibox">
                            <div class="ibox-head">

                                <div class="col-md-12">
                                    <div class="float-left" style ="font-size:20px; text-align: center;">Users List</div>
                                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#adduserM"><span class="fa fa-plus"></span> Add Users </a></div>
                                </div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                </div>
                            </div>
                            <div class="ibox-body" id="ulist">
                                <table class="table table-striped table-bordered table-hover" id="user_tb">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="lusers_tb">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div   id="lord_view" class="pro-comp" style="display: none;" >
                    <div class="col-lg-12" style="" >
                        <div class="ibox">
                            <div class="ibox-head">

                                <div class="col-md-12">
                                    <div class="float-left" style ="font-size:20px; text-align: center;">Landlord/Property Owners List</div>
                                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#addlordM"><span class="fa fa-plus"></span> Add LandLord </a></div>
                                </div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                </div>
                            </div>
                            <div class="ibox-body" id="olist">
                                <table class="table table-striped table-bordered table-hover" id="lord_tb">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="llord_tb">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div   id="agent_view" class="pro-comp" style="display: none;" >
                    <div class="col-lg-12" style="" >
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="col-md-12">
                                    <div class="float-left" style ="font-size:20px; text-align: center;">Agents List</div>
                                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#addlordM"><span class="fa fa-plus"></span> Add Agent </a></div>
                                </div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body" id="alist">
                                <table class="table table-striped table-bordered table-hover" id="agent_tb">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="lagent_tb">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div id="change_pass" class="ibox divhead" style="display: none;">
                <div class="ibox-head">
                    <div class="ibox-title">Change Password</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form class="form-horizontal" id="c_passform" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="<?= ucfirst($_SESSION['info']['uname']); ?>" name="name" readonly>
                                <input type="hidden" name="ad_id" value="<?=$_SESSION['info']['user_id']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Current Password *</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" minlength="6" maxlength="32" required name="cpass">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">New Password Info *</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="password" type="text" minlength="6" maxlength="32" required name="pword" placeholder="New Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <input class="form-control" type="text" minlength="6" maxlength="32" required name="conpword" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- START PAGE CONTENT-->
            <div id="user_profile" class="ibox divhead" style="display: none;">
                <div class="ibox-head">
                    <div class="ibox-title">User Account Information</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <?php  foreach($udetails as $rows) { }?>
                <?php $pathimg1 = BASEURL."assets/img/users/".$rows->pic; ?>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="ibox">
                            <div class="ibox-body text-center">
                                <div class="m-t-20">
                                    <img class="img-circle" style="height:150px;width:150px;border-radius: 70px;" alt="Image preview" id="preview-image" src="
                                   <?php // $cout = @file_get_contents($pathimg1, 0, NULL, 0, 1);
                                    if(file_exists($pathimg1) !== null){ echo $pathimg1;
                                    }else { echo BASEURL."assets/img/users/default_img.jpg";
                                    }
                                     ?>" />
                                </div>
                                <h5 class="font-strong m-b-10 m-t-10"><?= ucfirst($_SESSION['info']['lname'])."   ".ucfirst($_SESSION['info']['fname']); ?></h5>
                                <div class="m-b-20 text-muted"><?=  ucfirst($rname) ; ?></div>
                                <div class="profile-social m-b-20">
                                    <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                                    <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                                    <a href="javascript:;"><i class="fa fa-pinterest"></i></a>
                                    <a href="javascript:;"><i class="fa fa-dribbble"></i></a>
                                </div>
                                <div>
                                    <button class="btn btn-info btn-rounded m-b-5"><i class="fa fa-plus"></i> Follow</button>
                                    <button class="btn btn-default btn-rounded m-b-5">Message</button>
                                </div>
                            </div>
                        </div>
                        <div class="ibox">
                            <div class="ibox-body">
                                <div class="row text-center m-b-20">
                                    <div class="col-4">
                                        <div class="font-24 profile-stat-count">140</div>
                                        <div class="text-muted">Followers</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="font-24 profile-stat-count">$780</div>
                                        <div class="text-muted">Sales</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="font-24 profile-stat-count">15</div>
                                        <div class="text-muted">Projects</div>
                                    </div>
                                </div>
                                <p class="text-center">Lorem Ipsum is simply dummy text of the printing and industry. Lorem Ipsum has been</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="ibox">
                            <div class="ibox-body">
                                <ul class="nav nav-tabs tabs-line">
                                    <li class="nav-item">
                                      <!--  <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i> Overview</a>-->
                                        <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-user"></i> Profile</a>
                                    </li>
                                    <li class="nav-item">
                                       <!-- <a class="nav-link " href="#tab-2" data-toggle="tab"><i class="ti-settings"></i> Settings</a>-->
                                     <a class="nav-link " href="#tab-2" data-toggle="tab"><i class="ti-bar-chart"></i> Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab-3" data-toggle="tab"><i class="ti-announcement"></i> Feeds</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade " id="tab-2">
                                        <div class="row">
                                            <div class="col-md-6" style="border-right: 1px solid #eee;">
                                                <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-bar-chart"></i> Month Statistics</h5>
                                                <div class="h2 m-0">$12,400<sup>.60</sup></div>
                                                <div><small>Month income</small></div>
                                                <div class="m-t-20 m-b-20">
                                                    <div class="h4 m-0">120</div>
                                                    <div class="d-flex justify-content-between"><small>Month income</small>
                                                        <span class="text-success font-12"><i class="fa fa-level-up"></i> +24%</span>
                                                    </div>
                                                    <div class="progress m-t-5">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" style="width:50%; height:5px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="m-b-20">
                                                    <div class="h4 m-0">86</div>
                                                    <div class="d-flex justify-content-between"><small>Month income</small>
                                                        <span class="text-warning font-12"><i class="fa fa-level-down"></i> -12%</span>
                                                    </div>
                                                    <div class="progress m-t-5">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" style="width:50%; height:5px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <ul class="list-group list-group-full list-group-divider">
                                                    <li class="list-group-item">Projects
                                                        <span class="pull-right color-orange">15</span>
                                                    </li>
                                                    <li class="list-group-item">Tasks
                                                        <span class="pull-right color-orange">148</span>
                                                    </li>
                                                    <li class="list-group-item">Articles
                                                        <span class="pull-right color-orange">72</span>
                                                    </li>
                                                    <li class="list-group-item">Friends
                                                        <span class="pull-right color-orange">44</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-user-plus"></i> Latest Followers</h5>
                                                <ul class="media-list media-list-divider m-0">
                                                    <li class="media">
                                                        <a class="media-img" href="javascript:;">
                                                            <img class="img-circle" src="./assets/img/users/u1.jpg" width="40" />
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="media-heading">Jeanne Gonzalez <small class="float-right text-muted">12:05</small></div>
                                                            <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                                        </div>
                                                    </li>


                                                </ul>
                                            </div>
                                        </div>
                                        <h4 class="text-info m-b-20 m-t-20"><i class="fa fa-shopping-basket"></i> Latest Orders</h4>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Customer</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th width="91px">Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>11</td>
                                                <td>@Jack</td>
                                                <td>$564.00</td>
                                                <td>
                                                    <span class="badge badge-success">Shipped</span>
                                                </td>
                                                <td>10/07/2017</td>
                                            </tr>



                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade show active" id="tab-1">
                                        <form id="eprofile" class="eprofile" enctype="multipart/form-data" action="" method="POST" >
                                            <?php  //foreach($udetails as $rows) { ?>
                                            <input class="form-control" type="hidden" value="<?= $rows->id ?>" name="uid" id="uid" placeholder="user id">
                                            <input class="form-control" type="hidden" value="<?= $rows->passport ?>" name="oimg" id="oimg" placeholder="User Image">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label>First Name</label>
                                                    <input class="form-control" type="text" value="<?= $rows->fname ?>" id="fname" name="fname" placeholder="First Name">
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label>Last Name</label>
                                                    <input class="form-control" type="text" value="<?= $rows->lname ?>" name="lname" id="lname" placeholder="Last Name">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label>Other Name</label>
                                                    <input class="form-control" value="<?= $rows->oname ?>" name="oname" id="oname" type="text" placeholder="Other Name">
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control" name="gender" id="gender">
                                                        <?php $nu = $rows->gender;   if(empty($nu)){ ?>
                                                        <option value="">Select</option><?php }else{ ?>
                                                        <option value="<?= $rows->gender ?>"><?= $rows->gender ?></option><?php } ?>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" type="text" value="<?= $rows->email ?>" name="email" id="email" placeholder="First Name">
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label>Phone</label>
                                                    <input class="form-control" type="text" value="<?= $rows->phone ?>" name="phone" id="phone" placeholder="Last Name">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                <label>State</label>
                                                <select class="form-control" name="state" id="state" >
                                                    <?php $st = $rows->state;   if(empty($st)){ ?>
                                                        <option value="" selected="selected">- Select State -</option><?php }else{ ?>
                                                        <option value="<?= $rows->state ?>" selected="selected"><?= $rows->state ?></option>
                                                    <?php } ?>
                                                    <?= $lstate; ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Local Government/Provence</label>
                                                <select class="form-control" name="lga" id="lga"  required="required" >
                                                    <?php $lg = $rows->lga;   if(empty($lg)){ ?>
                                                        <option value="" selected="selected">Select LGA</option><?php }else{ ?>
                                                        <option value="<?= $rows->lga_id ?>" selected="selected"><?= $rows->lga ?></option>
                                                    <?php } ?>
                                               </select>
                                            </div></div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label>Date Of Birth</label>
                                                    <input type="date" class="form-control" value="<?= $rows->dob ?>" required  name="dob" id="dob"/>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label>Upload Passport</label>
                                                    <input type="file" name="photo_id" id="photo_id" placeholder="" class="form-control"  onchange="previewImageFile(event)"   />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Contact Address</label>
                                                <textarea class="form-control" rows="3" id="address" name="address"> <?= $rows->address ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Submit</button>

                                            </div>
                                        </form> <?php//} ?>
                                    </div>
                                    <div class="tab-pane fade" id="tab-3">
                                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-bullhorn"></i> Latest Feeds</h5>
                                        <ul class="media-list media-list-divider m-0">
                                            <li class="media">
                                                <div class="media-img"><i class="ti-user font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">New customer <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-info-alt font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading text-warning">Server Warning <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-announcement font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">7 new feedback <small class="float-right text-muted">Today</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-check font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading text-success">Issue fixed <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-shopping-cart font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">7 New orders <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-reload font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading text-danger">Server warning <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div></div>
            <!-- END PAGE CONTENT-->

            <!--  view add/edit property -->
            <div   id="post_pro" class="ibox divhead" style="display: none;" >
                <div class="col-lg-12" style="" >
                    <div class="ibox">
                        <div class="ibox-head">

                            <div class="col-md-12">
                                <div class="float-left" style ="font-size:20px; text-align: center;">Property List</div>
                                <div class="float-right">
                                   <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#postProM">
                                        <span class="fa fa-plus"></span> Post New Property </a>
                                  <!--  <a href="javascript:void(0);" class="btn btn-primary proEdit"   data-fid="0" data-target="#postProM" ><span class="fa fa-plus"></span> Post New Property</a>-->
                                </div>
                            </div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                            </div>
                        </div>
                        <div class="ibox-body" id="prol">
                            <table class="table table-striped table-bordered table-hover" id="pro_tb">
                                <thead>
                                <tr>
                                    <th><input id="chk_all" name="chk_all" type="checkbox"></th>
                                    <th>S/N</th>
                                    <th>Property No</th>
                                    <th>Owner</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="lpro_tb">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
<!-- propperty Management -->
            <div id="proMag" class="dropdown-item2" style="display: none;">
                <div   id="pverify" class="pro-comp" style="display: none;" >
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="col-md-12">
                                    <div class="float-left" style ="font-size:20px; text-align: center;">Property Verification
                                    </div>
                                    <div class="float-right">
                                        <button type="button" name="delv" id="delv" class="btn btn-danger "><span class="fa fa-plus"></span> Delete</button>
                                    </div>
                                </div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a></div>
                            </div>
                            <div class="ibox-body" id="veril">
                                <table class="table table-striped table-bordered table-hover" id="veri_tb">
                                    <thead>
                                    <tr>
                                        <th><input id="chk_allv" name="chk_allv" type="checkbox"></th>
                                        <th>S/N</th>
                                    <th>Property No</th>
                                    <th>Owner</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="lveri_tb">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!--  building -->
                <div   id="building" class="pro-comp" style="display: none;" >
                    <div class="col-lg-12" style="" >
                        <div class="ibox">
                            <div class="ibox-head">

                                <div class="col-md-12">
                                    <div class="float-left" style ="font-size:20px; text-align: center;">List of Houses/Building
                                    </div>
                                    <div class="float-right">
                                        <button type="button" name="delb" id="delb" class="btn btn-danger "><span class="fa fa-plus"></span> Delete</button></div>
                                </div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                </div>
                            </div>
                            <div class="ibox-body" id="bl">
                                <table class="table table-striped table-bordered table-hover" id="build_tb">
                                    <thead>
                                    <tr>
                                        <th><input id="chk_all" type="checkbox"></th>
                                        <th>S/N</th>
                                        <th>Property No</th>
                                        <th>Owner</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="lbuild_tb">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  non - building -->
                <div   id="non_building" class="pro-comp" style="display: none;" >
                    <div class="col-lg-12" style="" >
                        <div class="ibox">
                            <div class="ibox-head">

                                <div class="col-md-12">
                                    <div class="float-left" style ="font-size:20px; text-align: center;">List of Non - Building Properties
                                    </div>
                                    <div class="float-right">
                                        <button type="button" name="delnb" id="delnb" class="btn btn-danger "><span class="fa fa-plus"></span> Delete</button></div>
                                </div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                </div>
                            </div>
                            <div class="ibox-body" id="nbl">
                                <table class="table table-striped table-bordered table-hover" id="nonbuild_tb">
                                    <thead>
                                    <tr>
                                        <th><input id="chk_all" type="checkbox"></th>
                                        <th>S/N</th>
                                        <th>Property No</th>
                                        <th>Owner</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="lnonbuild_tb">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tenannt Management -->
            <div id="tenMag" class="dropdown-item3" style="display: none;">
                <div   id="tverify" class="pro-comp" style="display: none;" >
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="col-md-12">
                                    <div class="float-left" style ="font-size:20px; text-align: center;">Tenants Verification
                                    </div>
                                    <div class="float-right">
                                        <button type="button" name="delv" id="delv" class="btn btn-danger "><span class="fa fa-plus"></span> Delete</button>
                                    </div>
                                </div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a></div>
                            </div>
                            <div class="ibox-body" id="tveril">
                                <table class="table table-striped table-bordered table-hover" id="tveri_tb">
                                    <thead>
                                    <tr>
                                        <th><input id="chk_allt" name="chk_allt" type="checkbox"></th>
                                        <th>S/N</th>
                                        <th>Tenant Name</th>
                                        <th>Property Name / No</th>
                                        <th>Move in Date</th>
                                        <th>Expire Date</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tlveri_tb">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!--  building -->
                <div   id="tenants" class="pro-comp" style="display: none;" >
                    <div class="col-lg-12" style="" >
                        <div class="ibox">
                            <div class="ibox-head">

                                <div class="col-md-12">
                                    <div class="float-left" style ="font-size:20px; text-align: center;">List of Property Ocupants/Tenants
                                    </div>
                                    <div class="float-right">
                                        <button type="button" name="delb" id="delb" class="btn btn-danger "><span class="fa fa-plus"></span> Delete</button></div>
                                </div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                </div>
                            </div>
                            <div class="ibox-body" id="bl">
                                <table class="table table-striped table-bordered table-hover" id="tenants_tb">
                                    <thead>
                                    <tr>
                                        <th><input id="chk_all" type="checkbox"></th>
                                        <th>S/N</th>
                                        <th>Tenant Name</th>
                                        <th>Property Name / No</th>
                                        <th>Move in Date</th>
                                        <th>Expire Date</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="ltenants_tb">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  non - building -->
                <div   id="non_building" class="pro-comp" style="display: none;" >
                    <div class="col-lg-12" style="" >
                        <div class="ibox">
                            <div class="ibox-head">

                                <div class="col-md-12">
                                    <div class="float-left" style ="font-size:20px; text-align: center;">List of Non - Building Properties
                                    </div>
                                    <div class="float-right">
                                        <button type="button" name="delnb" id="delnb" class="btn btn-danger "><span class="fa fa-plus"></span> Delete</button></div>
                                </div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                </div>
                            </div>
                            <div class="ibox-body" id="nbl">
                                <table class="table table-striped table-bordered table-hover" id="nonbuild_tb">
                                    <thead>
                                    <tr>
                                        <th><input id="chk_all" type="checkbox"></th>
                                        <th>S/N</th>
                                        <th>Property No</th>
                                        <th>Owner</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="lnonbuild_tb">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  system activity Logs -->
        <div id="logs" class="dropdown-item2" style="display: none;">
          <div   id="act_logs" class="pro-comp" style="display: none;" >
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="col-md-12">
                                <div class="float-left" style ="font-size:20px; text-align: center;">Activity Log List
                                </div>
                                <div class="float-right">
                                    <button type="button" name="delact" id="delact" class="btn btn-danger "><span class="fa fa-plus"></span> Delete</button>
                                </div>
                            </div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a></div>
                        </div>
                        <div class="ibox-body" id="actl">
                            <table class="table table-striped table-bordered table-hover" id="act_tb">
                                <thead>
                                <tr>
                                    <th><input id="chk_all" type="checkbox"></th>
                                    <th>S/N</th>
                                    <th>Date</th>
                                    <th>System UserName</th>
                                    <th>Fullname</th>
                                    <th>Activity</th>
                                </tr>
                                </thead>
                                <tbody id="lact_tb">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!--  system User Logs -->
            <div   id="user_logs" class="pro-comp" style="display: none;" >
                <div class="col-lg-12" style="" >
                    <div class="ibox">
                        <div class="ibox-head">

                            <div class="col-md-12">
                                <div class="float-left" style ="font-size:20px; text-align: center;">Users Log List
                                </div>
                                <div class="float-right">
                                    <button type="button" name="delulogs" id="delulogs" class="btn btn-danger "><span class="fa fa-plus"></span> Delete</button></div>
                            </div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                            </div>
                        </div>
                        <div class="ibox-body" id = "userld">
                            <table class="table table-striped table-bordered table-hover" id="ulog_tb">
                                <thead>
                                <tr>
                                    <th><input id="chk_allu" type="checkbox"></th>
                                    <th>S/N</th>
                                    <th>System UserName</th>
                                    <th>IP Address</th>
                                    <th>Date of Last Login</th>
                                    <th>Date of Last Logout</th>
                                </tr>
                                </thead>
                               <tbody id="lulog_tb">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> </div>

        </div>

            <div id = "set_wrapper2" class="divhead2" style="display: none;">
            <div   id="pro_type2" class="row pro-comp2"  style="display: none;">
                <div class="col-md-5">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Add Property Type</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>

</div>
                        </div>
                        <div class="ibox-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="text" placeholder="Email address">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="checkbox">
                                        <span class="input-span"></span>Remamber me</label>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-default" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Horizontal Form</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Email address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10 ml-sm-auto">
                                        <label class="ui-checkbox ui-checkbox-gray">
                                            <input type="checkbox">
                                            <span class="input-span"></span>Remamber me</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10 ml-sm-auto">
                                        <button class="btn btn-info" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>    </div>

            <style>
                .visitors-table tbody tr td:last-child {
                    display: flex;
                    align-items: center;
                }

                .visitors-table .progress {
                    flex: 1;
                }

                .visitors-table .progress-parcent {
                    text-align: right;
                    margin-left: 10px;
                }
            </style>
         <!--   <div>
                <a class="adminca-banner" href="http://admincast.com/adminca/" target="_blank">
                    <div class="adminca-banner-ribbon"><i class="fa fa-trophy mr-2"></i>PREMIUM TEMPLATE</div>
                    <div class="wrap-1">
                        <div class="wrap-2">
                            <div>
                                <img src="./assets/img/adminca-banner/adminca-preview.jpg" style="height:160px;margin-top:50px;" />
                            </div>
                            <div class="color-white" style="margin-left:40px;">
                                <h1 class="font-bold">ADMINCA</h1>
                                <p class="font-16">Save your time, choose the best</p>
                                <ul class="list-unstyled">
                                    <li class="m-b-5"><i class="ti-check m-r-5"></i>High Quality Design</li>
                                    <li class="m-b-5"><i class="ti-check m-r-5"></i>Fully Customizable and Easy Code</li>
                                    <li class="m-b-5"><i class="ti-check m-r-5"></i>Bootstrap 4 and Angular 5+</li>
                                    <li class="m-b-5"><i class="ti-check m-r-5"></i>Best Build Tools: Gulp, SaSS, Pug...</li>
                                    <li><i class="ti-check m-r-5"></i>More layouts, pages, components</li>
                                </ul>
                            </div>
                        </div>
                        <div style="flex:1;">
                            <div class="d-flex justify-content-end wrap-3">
                                <div class="adminca-banner-b m-r-20">
                                    <img src="./assets/img/adminca-banner/bootstrap.png" style="width:40px;margin-right:10px;" />Bootstrap v4</div>
                                <div class="adminca-banner-b m-r-10">
                                    <img src="./assets/img/adminca-banner/angular.png" style="width:35px;margin-right:10px;" />Angular v5+</div>
                            </div>
                            <div class="dev-img">
                                <img src="./assets/img/adminca-banner/sprite.png" />
                            </div>
                        </div>

                    </div>
                </a>
            </div>-->

        <!-- END PAGE CONTENT-->
        <footer class="page-footer">
            <div class="font-13">Copyright &copy; <b>Rent Flexy</b> <script>document.write(new Date().getFullYear());</script> All rights reserved | Developed By Akubest Technologies.</div>
            <!--<a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a> -->
            <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
        </footer>
    </div>


<form>
    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Property Features</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Feature Name</label>
                        <div class="col-md-10">
                            <input type="text" name="pfeat" id="pfeat" class="form-control" placeholder="Feature Name" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_savef" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!--MODAL DELETE Property Features-->
<form>
    <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Property Features</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to delete this record?</strong>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="fid_delete" id="fid_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL DELETE Property Features-->
<!--MODAL DELETE USERS -->
<form>
    <div class="modal fade" id="userModal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to delete this record?</strong>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="fid_delete" id="fid_delete" class="form-control">
                    <input type="hidden" name="pag_d" id="pag_d" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete_users" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL DELETE Property Features-->
<!--MODAL DELETE property -->
<form>
    <div class="modal fade" id="propModal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Property</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to delete this Property?</strong>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="pid_delete" id="pid_delete" class="form-control">
                    <input type="hidden" name="uid_d" id="uid_d" class="form-control">
                    <input type="hidden" name="pag_d" id="pag_d" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete_pro" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL DELETE Property Features-->
<!-- MODAL EDIT -->
<form>
    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Property Feature</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="fid_edit" id="fid_edit" class="form-control" placeholder="Feature Id" readonly>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Feature Name</label>
                        <div class="col-md-10">
                            <input type="text" name="feature_name_edit" id="feature_name_edit" class="form-control" placeholder="Feature Name">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button"  id="btn_update" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL EDIT-->
<!--add Company Details-->

    <div class="modal fade" id="Modal_compyAdd"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="addCompy" name="addCompy" action="<?php echo site_url('admin/add_compy');?>" method="post">
                    <input class="form-control" type="hidden" id="txtuid" name="txtuid" value="<?= $usercode ; ?>"  >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Company Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Company Name</label>

                        <input class="form-control" type="text" id="txtCpname" name="txtCpname"  placeholder="Company Name">
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Company Email</label>
                            <input class="form-control" type="email" id="txtCpemail" name="txtCpemail"  placeholder="Company Email" >
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Company Office Number</label>
                            <input class="form-control" type="text" id="txtCpphone" name="txtCpphone"  placeholder="Office Number" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Company Description</label>
                            <textarea class="form-control" id="txtCpdes" name="txtCpdes" rows="3" value=""></textarea>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Company Contact Address</label>
                            <textarea class="form-control" id="txtCpcnt" name="txtCpcnt" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>State</label>
                            <select class="form-control" name="state1" id="state1" >
                                <option value="" selected="selected">- Select State -</option>
                                <?= $lstate; ?>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Local Government/Provence</label>
                            <select class="form-control" name="lga1" id="lga1"  required="required" >
                                <option value="" selected="selected" >Select LGA</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  type="submit" id="btn_savef" class="btn btn-primary">Save</button>
                    <div class='imgHolder2' id='imgHolder2' style="display: none;"><img src='<?php echo BASEURL ; ?>assets/img/tabLoad.gif'></div>
                </div>

                </form>
            </div>
        </div>
    </div>

<!--end Company Details-->

<!--edit Company Details-->

<div class="modal fade" id="compupdateM"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="updateCompy" name="updateCompy" action="<?php echo site_url('admin/edit_compy');?>" method="POST">
                <input class="form-control" type="hidden" id="txtcid" name="txtcid"   >
                <input class="form-control" type="hidden" id="txtuid" name="txtuid"   >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Company Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Company Name</label>

                        <input class="form-control" type="text" id="txtCpname" name="txtCpname"  placeholder="Company Name">
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Company Email</label>
                            <input class="form-control" type="email" id="txtCpemail" name="txtCpemail"  placeholder="Company Email" >
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Company Office Number</label>
                            <input class="form-control" type="text" id="txtCpphone" name="txtCpphone"  placeholder="Office Number" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Company Description</label>
                            <textarea class="form-control" id="txtCpdes" name="txtCpdes" rows="3" value="mekas"></textarea>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Company Contact Address</label>
                            <textarea class="form-control" id="txtCpcnt" name="txtCpcnt" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>State</label>
                            <select class="form-control" name="state2" id="state2" >
                                <option value="" >- Select State -</option>
                                <?= $lstate; ?>                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Local Government/Provence</label>
                            <select class="form-control" name="lga2" id="lga2"  required="required" >
                                <option value="" selected="selected" >Select LGA</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  type="submit" id="btn_savef" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!--end edit Company Details-->
<!--edit user Details-->
<div class="modal fade" id="userupdateM"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="updateUser" name="updateUser" action="<?php echo site_url('admin/updateUsers');?>" method="POST">
                <input class="form-control" type="hidden" id="txtcid" name="txtcid"   >
                <input class="form-control" type="hidden" id="txtuid" name="txtuid"   >
                <input class="form-control" type="hidden" id="txtpag" name="txtpag"   >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" id="txtuname" name="txtuname"  placeholder="Username" required >
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>User Role</label>
                            <select class="form-control" name="txtrole" id="txtrole">
                                <option value="">Select User Role</option>
                                <?php if(isset($roles)){foreach ($roles as $lrole){?>
                                        <option value="<?php echo $lrole->id ; ?>"><?php echo $lrole->role_name ; ?></option>
                                    <?php }} ?>
                                <option value="0">No Access</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" id="txtfname" name="txtfname"  placeholder="First Name" autocomplete="off">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" id="txtlname" name="txtlname"  placeholder="Last Name" autocomplete="off" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Other Name</label>
                            <input class="form-control" type="text" id="txtoname" name="txtoname"  placeholder="Other Name" autocomplete="off" >
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Gender</label>
                            <select class="form-control" name="txtgender" id="txtgender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" id="txtemail" name="txtemail"  placeholder="Email" autocomplete="off" >
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Phone Number</label>
                            <input class="form-control" type="text" id="txtphone" name="txtphone"  placeholder="Phone Number" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Enable Password reset</label>
                            <input class="form-control" type="checkbox" id="txtchk" name="txtchk" onclick="ShowHideDiv3(this)"  value="1" >
                        </div>
                        <div class="col-sm-6 form-group" style="display:none;" id="txtps">
                            <label>Password</label>
                            <input class="form-control" type="text" id="txtpass" name="txtpass"  placeholder="Password" autocomplete="off"  >
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  type="submit" id="btn_savef" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!--end edit user Details-->

<!--add user Details-->
<div class="modal fade" id="adduserM"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addUser" name="addUser" action="<?php echo site_url('admin/addUser');?>" method="POST">
                <input class="form-control" type="hidden" id="txtcid" name="txtcid"   >
                <input class="form-control" type="hidden" id="txtuid" name="txtuid"   >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" id="txtuname" name="txtuname"  placeholder="Username" required autocomplete="off" >
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>User Role</label>
                            <select class="form-control" name="txtrole" id="txtrole">
                                <option value="">Select User Role</option>
                                <?php if(isset($roles)){foreach ($roles as $lrole){?>
                                    <option value="<?php echo $lrole->id ; ?>"><?php echo $lrole->role_name ; ?></option>
                                <?php }} ?>
                                <option value="0">No Access</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" id="txtfname" name="txtfname"  placeholder="First Name" autocomplete="off">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" id="txtlname" name="txtlname"  placeholder="Last Name" autocomplete="off" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Other Name</label>
                            <input class="form-control" type="text" id="txtoname" name="txtoname"  placeholder="Other Name" autocomplete="off" >
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Gender</label>
                            <select class="form-control" name="txtgender" id="txtgender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" id="txtemail" name="txtemail"  placeholder="Email" autocomplete="off" >
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Phone Number</label>
                            <input class="form-control" type="text" id="txtphone" name="txtphone"  placeholder="Phone Number" autocomplete="off" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Enable Password</label>
                            <input class="form-control" type="checkbox" id="txtchk" name="txtchk" required onclick="ShowHideDiv4(this)"  value="1" >
                        </div>
                        <div class="col-sm-6 form-group" style="display:none;" id="txtp2">
                            <label>Password</label>
                            <input class="form-control" type="password" id="txtpass2" name="txtpass2"  placeholder="Password" autocomplete="off"  >
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  type="submit" id="btn_savef" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!--end add user Details-->



<!-- Post Poperty-->
<div class="modal fade" id="postProM"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="postPro" class="postPROM" name="postPro" enctype="multipart/form-data" action="<?php echo base_url('admin/postProperty');?>" method="POST" >
                <input type="hidden" placeholder="" class="form-control "  name="urole" value="<?= $userrole ; ?>" />
                <input type="hidden" placeholder="" class="form-control "  name="id_num" value="<?= $usercode ; ?>" />
                <input type="hidden" placeholder="" class="form-control "  name="pro_ref" value="<?php echo $pref; ?>"  />
                <input type="hidden" placeholder="" class="form-control "  name="txtpro_id" id="txtpro_id" />
                <div class="modal-header">
                    <h5 class="modal-title" id="pro_model_title">Post New Property </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if($userrole !== "4"){ ?>
                        <div class="row"  id="landlord">
                            <div class="col-sm-6 form-group">
                                <label>LandLords</label>
                                <select class="form-control  " name="txtpown" id="txtpown" >
                                    <option value="">Select Landlords</option>
                                    <?php if(isset($plord)){foreach ($plord as $lordn){?>
                                        <option value="<?php echo $lordn->id ; ?>"><?php echo $lordn->fname." ".$lordn->oname ; ?></option>
                                    <?php }} ?>
                                </select></div>
                        </div> <?php } ?>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Property What To Do</label>
                            <select class="form-control  " name="txtpst" id="txtpst" >
                                <option value="">Select What to Do</option>
                                <?= $stat; ?>
                            </select></div>
                        <div class="col-sm-6 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">Property Agent (Optional)</label>
                            </div>
                            <select class="form-control  " name="txtagent" id="txtagent">
                                <option value="">Select Agent</option>
                                <?php if(isset($powner)){foreach ($powner as $own){?>
                                    <option value="<?php echo $own->id ; ?>"><?php echo $own->fname." ".$own->oname ; ?></option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">Property Category</label>
                            </div>
                            <select class="form-control " name="txtcati" id="txtcati">
                                <option value="">Select Property Category</option>
                                <?php if(isset($pcat)){foreach ($pcat as $pct){?>
                                    <option value="<?php echo $pct->id ; ?>"><?php echo $pct->category ; ?></option>
                                <?php }} ?>
                            </select></div>
                        <div class="col-sm-6 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">Property Type</label>
                            </div>
                            <select class="form-control  " name="txttype" id="txttype" >
                                <option value="">Select Property Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Property State</label>
                            <select class="form-control" name="state3" id="state3" >
                                <option value="" >- Select State -</option>
                                <?= $lstate; ?>
                            </select></div>
                        <div class="col-sm-6 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">Property LGA</label>
                            </div>
                            <select   class="form-control " name="lga" id="lga" >
                                <option value="" selected="selected">Select Property LGA</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">Property Address/Location</label>
                            </div>
                            <textarea class="form-control " id="txtloc" name="txtloc" rows="3"></textarea>
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
                        <div class="col-sm-6 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">No Of Bedroom</label>
                            </div>
                            <select class="form-control  " name="txtbedr" id="txtbedr">
                                <option value="">Select No Bedroom</option>
                                <?php for($x=1;$x<=10;$x++)
                                { echo $value = '<option value="'.$x.'">'.$x.'</option>';  } ?>
                            </select></div>
                        <div class="col-sm-6 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">No Of Bathroom</label>
                            </div>
                            <select class="form-control  " name="txtbathr" id="txtbathr">
                                <option value="">Select No Of Bathroom</option>
                                <?php for($x=1;$x<=10;$x++)
                                { echo $value = '<option value="'.$x.'">'.$x.'</option>';  } ?>
                            </select></div>
                    </div>
                    <div class="row" style="display: none" id="pfeat2">
                        <div class="col-sm-12 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">Property Features</label>
                            </div>
                            <?php if(isset($p_feat)){foreach ($p_feat as $pf){?>
                                <label for="air<?php echo $pf->id ; ?>"><?php echo $pf->prop_feature; ?>
                                    <input type="checkbox" id="air<?php echo $pf->id ; ?>" name="feat[]" value="<?php echo $pf->id ; ?>">
                                    <span class="checkbox"></span>
                                </label>
                            <?php }} ?></div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Min Property Price</label>
                            <input type="number"  class="form-control "  name="txtpmin" id="txtpmin"  placeholder="Min Property Price i.e 240,000" autocomplete="off" >
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Max Property Price</label>
                            <input type="number"  class="form-control "  name="txtpmax" id="txtpmax"  placeholder="Max Property Price i.e 250,000" autocomplete="off" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Featured Image</label>
                            <input type="file" name='pro_img[]' multiple="multiple" id = "image_file" class="form-control">
                            <div id="uploadPreview"></div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  type="submit" id="btn_savef" class="btn btn-primary">Submit Data</button>
                    <div class="response-message ms-3"></div>

                </div>
            </form>
        </div>
    </div>
</div>
<!--end Post Property -->

<!-- update Property-->
<div class="modal fade" id="updateProM"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="updatePro" class="updatePROM" name="updatePro" enctype="multipart/form-data" action="<?php echo site_url('admin/updateProperty');?>" method="POST" >
                <input type="hidden" placeholder="" class="form-control "  name="urole" value="<?= $userrole ; ?>" />
                <input type="hidden" placeholder="" class="form-control "  name="id_num" value="<?= $usercode ; ?>" />
                <input type="hidden" placeholder="" class="form-control "  name="txtpro_id" id="txtpro_id" />
                <div class="modal-header">
                    <h5 class="modal-title" id="pro_model_title">Update Property Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if($userrole !== "4"){ ?>
                        <div class="row"  id="landlord">
                            <div class="col-sm-6 form-group">
                                <label>LandLords</label>
                                <select class="form-control  " name="txtpown" id="txtpown" >
                                    <option value="">Select Landlords</option>
                                    <?php if(isset($plord)){foreach ($plord as $lordn){?>
                                        <option value="<?php echo $lordn->id ; ?>"><?php echo $lordn->fname." ".$lordn->oname ; ?></option>
                                    <?php }} ?>
                                </select></div>
                        </div> <?php } ?>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Property What To Do</label>
                            <select class="form-control  " name="txtpstn" id="txtpstn" >
                                <option value="">Select What to Do</option>
                                <?= $stat; ?>
                            </select></div>
                        <div class="col-sm-6 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">Property Agent (Optional)</label>
                            </div>
                            <select class="form-control  " name="txtagent" id="txtagent">
                                <option value="">Select Agent</option>
                                <?php if(isset($powner)){foreach ($powner as $own){?>
                                    <option value="<?php echo $own->id ; ?>"><?php echo $own->fname." ".$own->oname ; ?></option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">Property Category</label>
                            </div>
                            <select class="form-control " name="txtcatio" id="txtcatio">
                                <option value="">Select Property Category</option>
                                <?php if(isset($pcat)){foreach ($pcat as $pct){?>
                                    <option value="<?php echo $pct->id ; ?>"><?php echo $pct->category ; ?></option>
                                <?php }} ?>
                            </select></div>
                        <div class="col-sm-6 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">Property Type</label>
                            </div>
                            <select class="form-control  " name="txttypeo" id="txttypeo" >
                                <option value="">Select Property Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Property State</label>
                            <select class="form-control" name="state4" id="state4" >
                                <option value="" >- Select State -</option>
                                <?= $lstate; ?>
                            </select></div>
                        <div class="col-sm-6 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">Property LGA</label>
                            </div>
                            <select   class="form-control " name="lga" id="lga" >
                                <option value="" selected="selected">Select Property LGA</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">Property Address/Location</label>
                            </div>
                            <textarea class="form-control " id="txtloc" name="txtloc" rows="3"></textarea>
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
                    <div class="row" style="display: none" id="pqtyn">
                        <div class="col-sm-6 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">No Of Bedroom</label>
                            </div>
                            <select class="form-control  " name="txtbedr" id="txtbedr">
                                <option value="">Select No Bedroom</option>
                                <?php for($x=1;$x<=10;$x++)
                                { echo $value = '<option value="'.$x.'">'.$x.'</option>';  } ?>
                            </select></div>
                        <div class="col-sm-6 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">No Of Bathroom</label>
                            </div>
                            <select class="form-control  " name="txtbathr" id="txtbathr">
                                <option value="">Select No Of Bathroom</option>
                                <?php for($x=1;$x<=10;$x++)
                                { echo $value = '<option value="'.$x.'">'.$x.'</option>';  } ?>
                            </select></div>
                    </div>
                    <div class="row" style="display: none" id="pfeatn">
                        <div class="col-sm-12 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">Property Features</label>
                            </div>
                            <?php if(isset($p_feat)){foreach ($p_feat as $pf){?>
                                <label for="air<?php echo $pf->id ; ?>"><?php echo $pf->prop_feature; ?>
                                    <input type="checkbox" id="air<?php echo $pf->id ; ?>" name="feat[]" value="<?php echo $pf->id ; ?>">
                                    <span class="checkbox"></span>
                                </label>
                            <?php }} ?></div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Min Property Price</label>
                            <input type="number"  class="form-control "  name="txtpmin" id="txtpmin"  placeholder="Min Property Price i.e 240,000" autocomplete="off" >
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Max Property Price</label>
                            <input type="number"  class="form-control "  name="txtpmax" id="txtpmax"  placeholder="Max Property Price i.e 250,000" autocomplete="off" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Featured Image</label>
                            <input type="file" name="pro_img[]" multiple="multiple" id = "image_file" class="form-control">
                            <div id="uploadPreview"></div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  type="submit" id="btn_savef" class="btn btn-primary">Submit Data</button>
                    <div class="response-message ms-3"></div>

                </div>
            </form>
        </div>
    </div>
</div>

<!--end Post Property -->
<!--  Tenant Verification -->
<div class="modal fade" id="veriTenant"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="tenVerify" class="tenVerify" name="tenVerify" enctype="multipart/form-data" action="<?php echo site_url('admin/updateProperty');?>" method="POST" >
                <input type="hidden" placeholder="" class="form-control "  name="urole" value="<?= $userrole ; ?>" />
                <input type="hidden" placeholder="" class="form-control "  name="id_num" value="<?= $usercode ; ?>" />
                <input type="hidden" placeholder="" class="form-control "  name="txtpro_id" id="txtpro_id" />
                <div class="modal-header">
                    <h5 class="modal-title" id="ten_model_title">Tenant / Occupant Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row contmain"  id="landlord">
                            <table border="0" style="margin:0px; font-size:12px;overflow-x:auto;color: gray;font-family:Arial;"  class="tble2"  >
                            <div class="col-sm-12 form-group " >
                                <img src="bandmember.jpg" alt="Avatar" style="width:90px;display: none;">
                                <tr style="border: 1px solid #98C1D1; ">
                                    <td height="10" style="font-weight: bold;font-color:gray" width="700px" colspan="4" id="txtname" >----------</td>
                                    <td rowspan="4" width="150px" height="150px" id="ima" >
                                        </td>
                                </tr>
                                <tr style="border: 1px solid #98C1D1;">
                                    <td style="font-weight: bold;">Gender :</td><td  style="font-color:gray;  font-weight:normal;" id="txtgender">
                                      ---------- </td>
                                    <td height="20" style="font-weight: bold;">Contact Address: </td> <td style="font-color:gray;  font-weight:normal;" id="txtadd">----------</td></tr>
                                <tr style="border: 1px solid #98C1D1;"> <td style="font-weight: bold;">Email Address:</td><td  style="font-color:gray;  font-weight:normal; " id="txtemail">---------- </td>
                                    <td height="20" style="font-weight: bold;">Mobile Number:</td><td style="font-color:gray;  font-weight:normal;" id="txtphone">---------- </td></tr>
                                <tr style="border: 1px solid #98C1D1;"> <td style="font-weight: bold;">Property Name/ID:</td><td  style="font-color:gray;  font-weight:normal; " id="txtpname">---------- </td>
                                    <td height="20" style="font-weight: bold;">Property Location:</td><td style="font-color:gray;  font-weight:normal;" id="txtloc" >---------- </td></tr>
                                <tr style="border: 1px solid #98C1D1;"> <td style="font-weight: bold;" height="35" >Move in Date:</td><td  style="font-color:gray;  font-weight:normal; " id="txtmdate">
                                        ---------- </td>
                                    <td height="20" style="font-weight: bold;">Expire Date:</td>
                                    <td style="font-color:gray;  font-weight:normal;" id="txtexpdate">----------
                                    </td><td style="font-color:gray;  font-weight:normal;" id="txtvstatus">----------
                                    </td>
                                </tr>
                                <tr style="border: 1px solid #98C1D1;"> <td style="font-weight: bold;" height="35" >Due Amount:</td><td  style="font-color:gray;  font-weight:normal; " id="txtdue">
                                        ---------- </td>
                                    <td height="20" style="font-weight: bold;">Paid Amount:</td>
                                    <td style="font-color:gray;  font-weight:normal;" id="txtpamt">----------
                                    </td><td style="font-color:gray;  font-weight:normal;" id="txtpstatus">----------
                                    </td>
                                </tr>
                                </div></table></div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Move in Date</label>
                            <input type="date" class="form-control" value="" required  name="mid" id="mid"/>
                        </div>
                        <div class="col-sm-6 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">Tenant Verication Status</label>
                            </div>
                            <select class="form-control  " name="txtvst" id="txtvst">
                                <option value="">Select Status</option>
                                <option value="1">Verify</option>
                                <option value="0">Cancel</option>
                            </select>
                        </div>
                    </div>

                    <div class="row" style="display: none" id="pfeatn">
                        <div class="col-sm-12 form-group">
                            <div class="label-wrapper">
                                <label class="control-label">Property Features</label>
                            </div>
                            <?php if(isset($p_feat)){foreach ($p_feat as $pf){?>
                                <label for="air<?php echo $pf->id ; ?>"><?php echo $pf->prop_feature; ?>
                                    <input type="checkbox" id="air<?php echo $pf->id ; ?>" name="feat[]" value="<?php echo $pf->id ; ?>">
                                    <span class="checkbox"></span>
                                </label>
                            <?php }} ?></div>

                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  type="submit" id="btn_savef" class="btn btn-primary">Submit Data</button>
                    <div class="response-message ms-3"></div>

                </div>
            </form>
        </div>
    </div>
</div>

<!--end Tenant Verification -->
