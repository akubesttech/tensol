<?php
/**
 * Created by PhpStorm.
 * User: Akubest Tech
 * Date: 8/3/2021
 * Time: 10:33 PM
 */
$info =  session()->get('info');
foreach ($udetails as $urec){}
$rname = $urec->role_name;
?>
<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div id="simg"> <!-- assets/img/admin-avatar.png -->
                <?php  $pathimg = BASEURL."assets/img/users/".$urec->pic ?>
                <img style="border-radius: 70px;" src="<?php if(file_exists($pathimg) !== null){ echo $pathimg;
                }else { echo BASEURL."assets/img/users/default_img.jpg"; } ?>"  width="40px" />
            </div>
            <div class="admin-info">
                <div class="font-strong"><?= ucfirst($urec->lname)."   ".ucfirst($urec->fname); ?> </div>
                <small><?=  ucfirst($rname) ; ?></small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="<?php echo BASEURL ; ?>admin"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
<?php  if($info['role'] == 1){ ?>
            <li>
                <a href="javascript:;" data-action="click-trigger" data-value="set_wrapper" class="dropdown-item" ><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">System Configuration</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="javascript:void(0);"  class="p-set" data-div="pro_com">Company Information</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"  class="p-set" data-div="pro_cat">Add Property Category</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"  class="p-set" data-div="pro_type">Add / Edit Property Type</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"  class="p-set" data-div="pro_feat">Add Property Features</a>
                    </li>

                </ul>
            </li> <?php } ?>
            <li>
                <a href="javascript:;" data-action="click-trigger" data-value="user_wrapper" class="dropdown-item"><i class="sidebar-item-icon fa fa-user"></i>
                    <span class="nav-label">User Management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="javascript:void(0);" class="p-set" data-div="user_view" >Add / Edit Users</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">Assign Service to Users</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="p-set" data-div="lord_view">View / Verify Landlord</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="p-set" data-div="agent_view">View / View Agent</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;" data-action="click-trigger" data-value="tenMag" class="dropdown-item"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Tenants Management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="javascript:void(0);" class="p-set" data-div="tverify">Tenants Verification</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="p-set" data-div="tenants">Tenants</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;" data-action="click-trigger" data-value="proMag" class="dropdown-item"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Property Management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="javascript:void(0);" class="p-set" data-div="pverify">Property Verification</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="p-set" data-div="building">Houses</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="p-set" data-div="non_building">Non Building</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="p-set" data-div="pro_list">Property Listing</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                    <span class="nav-label">Report(s)</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="charts_flot.html">General Report</a>
                    </li>
                    <li>
                        <a href="charts_morris.html">Payment Report</a>
                    </li>
                    <li>
                        <a href="chartjs.html">Revenue Report</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-money"></i>
                    <span class="nav-label">Payments </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="#">Tenants</a>
                    </li>
                    <li>
                        <a href="#">Agents</a>
                    </li>
                    <li>
                        <a href="#">Subscription</a>
                    </li>
                </ul>
            </li>
            <li>
                <a  href="javascript:void(0);" data-action="click-trigger" data-value="post_pro" class="dropdown-item"
                ><i class="sidebar-item-icon fa fa-home"></i>
                    <span class="nav-label">Post Property</span>
                </a>
            </li>
            <li>
                <a href="#"  style="display: none;"><i class="sidebar-item-icon fa fa-building"></i>
                    <span class="nav-label">Post Non Building</span>
                </a>
            </li>
          <!--  <li class="heading">System Logs</li> -->
            <li>
                <a  href="javascript:;" data-action="click-trigger" data-value="logs" class="dropdown-item"><i class="sidebar-item-icon fa fa-book"></i>
                    <span class="nav-label">System Logs</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="javascript:void(0);" class="p-set" data-div="act_logs" >Activity Logs</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="p-set" data-div="user_logs">User Logs</a>
                    </li>

                </ul>
            </li>
          <!--  <li>
                <a href="calendar.html"><i class="sidebar-item-icon fa fa-calendar"></i>
                    <span class="nav-label">Calendar</span>
                </a>
            </li>-->
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                    <span class="nav-label">Notification</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="#">Add News / Events</a>
                    </li>
                    <li>
                        <a href="#">Messages</a>
                    </li>

                </ul>
            </li>
          <!-- <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Menu Levels</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="javascript:;">Level 2</a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-3-level collapse">
                            <li>
                                <a href="javascript:;">Level 3</a>
                            </li>
                            <li>
                                <a href="javascript:;">Level 3</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li> -->

        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
