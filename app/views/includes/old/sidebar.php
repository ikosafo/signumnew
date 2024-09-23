<div class="left-side-menu" style="top:58px">
                <div class="media user-profile mt-2 mb-2">
                    <img src="<?php echo URLROOT ?>/images/users/avatar-7.jpg" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
                    <img src="<?php echo URLROOT ?>/images/users/avatar-7.jpg" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

                    <div class="media-body">
                        <h6 class="pro-user-name mt-0 mb-0"><?= $_SESSION['name']?></h6>
                        <span class="pro-user-desc"><?= $_SESSION['mainaccesslevel']?></span>
                    </div>
                    <div class="dropdown align-self-center profile-dropdown-menu">
                        <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <span data-feather="chevron-down"></span>
                        </a>
                        <div class="dropdown-menu profile-dropdown">
                            <a href="<?= URLROOT ?>/admin/profile?uid=<?= Encryption::lock($_SESSION['uid'])?>" class="dropdown-item notify-item">
                                <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                                <span>My Account</span>
                            </a>

                       

                            <a href="<?= URLROOT ?>/pages/lock" class="dropdown-item notify-item">
                                <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a href="<?= URLROOT ?>/pages/logout" class="dropdown-item notify-item">
                                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-content">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="slimscroll-menu">
                        <ul class="metismenu" id="menu-bar">
                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="<?= URLROOT ?>/">
                                    <i data-feather="home"></i>
                                    <span class="badge badge-success float-right">home</span>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li class="menu-title">MENUS</li>
                           
                            <?php if($_SESSION['accesslevel']=='Account' || $_SESSION['accesslevel']=='Super' ):?>
                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="briefcase"></i>
                                    <span> Accounts </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="<?= URLROOT ?>/accounts/livepayments">Live Payments</a></li>
                                    <li><a href="<?= URLROOT ?>/accounts/provisional">Provisional Registration Payments</a></li>
                                    <li><a href="<?= URLROOT ?>/accounts/permanent">Permanent Registration Payments</a></li>
                                    <li><a href="<?= URLROOT ?>/accounts/temporal">Temporal Registration Payments</a></li>
                                   <!-- <li><a href="<?= URLROOT ?>/permanent_upgrade">Permanent Upgrade</a></li>-->
                                    <li><a href="<?= URLROOT ?>/accounts/renewal">Renewals</a></li>
                                    <!--<li><a href="<?= URLROOT ?>/temporal_renewal">Temporal Renewals</a></li>-->
                                    <li><a href="<?= URLROOT ?>/accounts/examination">Examination</a></li>
                                    <li>
                                            <a href="javascript: void(0);">
                                        
                                            <span> Upgrades </span>
                                            <span class="menu-arrow"></span>
                                            </a>
                                            <ul class="nav-second-level" aria-expanded="false">
                                            <li><a href="<?= URLROOT ?>/accounts/permanent_upgrade">Permanent Upgrade</a></li>                                            
                                            <li><a href="<?= URLROOT ?>/accounts/provisional_upgrade">Provisional Upgrade</a></li>                                        
                                            <li><a href="<?= URLROOT ?>/accounts/examination_upgrade">Examination Upgrade</a></li>                                        
                                            </ul>

                                    </li>
                                    <li><a href="<?= URLROOT ?>/accounts/billconfig">Bill Configuration</a></li>
                                    <li><a href="<?= URLROOT ?>/accounts/penaltyconfig">Penalty Billings</a></li>
                                    <li><a href="<?= URLROOT ?>/accounts/accountstats">Accounting Statistics</a></li>
                                    <li><a href="<?= URLROOT ?>/accounts/owinglist">Renewal Owing List</a></li>
                                    <li><a href="<?= URLROOT ?>/accounts/underpay">2021 Renewal Issues</a></li>
                                </ul>
                            </li>
                            <?php 
                            endif;
                            if($_SESSION['accesslevel']=='Education' || $_SESSION['accesslevel']=='Super' ):
                            ?>

                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="calendar"></i>
                                    <span> Education & Training </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="<?= URLROOT ?>/education/addinstitution">Add Institution</a></li>
                                    <li><a href="<?= URLROOT ?>/education/institutionlist">Institution List</a></li>
                                    <li><a href="<?= URLROOT ?>/education/graduatelist">Graduate lists</a></li>
                                    <li><a href="<?= URLROOT ?>/education/graduatexcel">Upload Graduate Excel</a></li>
                                    <li><a href="<?= URLROOT ?>/education/cpdcredits">Upload CPD Credits</a></li>
                                    <li><a href="<?= URLROOT ?>/education/cpdlist">CPD Lists</a></li>
                                    <li><a href="<?= URLROOT ?>/education/professionlist">Profession List</a></li>
                                    <li><a href="<?= URLROOT ?>/education/professionspecialization">Profession Specialization</a></li>
                                    <li><a href="<?= URLROOT ?>/education/internship">Internships</a></li>
                                    
                                </ul>
                            </li>
                            <?php endif;
                            if($_SESSION['accesslevel']=='Examination' || $_SESSION['accesslevel']=='Super' ):
                            ?>
                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="book-open"></i>
                                    <span> Examination </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                <?php if($_SESSION['mainaccesslevel']=='Examination Admin' || $_SESSION['see'] == 0): ?>
                                <li><a href="<?= URLROOT ?>/examination/examregexcel">Upload Exams Registration</a></li>
                                <li><a href="<?= URLROOT ?>/examination/examresit">Upload Exams Resit</a></li>
                                <li><a href="<?= URLROOT ?>/examination/examexcel">Upload Exams Results</a></li>
                                <hr>
                                <?php endif; ?>
                                
                                <li><a href="<?= URLROOT ?>/examination/examreglist">Exams Registration List</a></li>
                                <li><a href="<?= URLROOT ?>/examination/examresitlist">Exams Resit List</a></li>
                                <li><a href="<?= URLROOT ?>/examination/examlist">Exams Result List</a></li>
                                <li><a href="<?= URLROOT ?>/examination/examconfig">Exams Configuration</a></li>
                                <?php if($_SESSION['mainaccesslevel']=='Examination Admin'): ?>
                                    <li><a style='color:teal' href="<?= URLROOT ?>/examination/examapproval">Exam Approvals</a></li>
                                   <?php endif; ?>

                                </ul>
                            </li>
                            <?php 
                            endif;
                            if($_SESSION['admins']=='Admin'):
                            ?>
                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="users"></i>
                                    <span> System Users </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="<?= URLROOT ?>/admin/userlist">User lists</a></li>
                                </ul>
                            </li>



                            <li>
                                <a href="<?=URLROOT?>/statistics/">
                                    <i data-feather="layers"></i>
                                    <span> Statistics </span>
                                   
                                </a>

                             
                            </li>
                            <?php 
                            endif;
                            ?>

                            <li >
                                <a href="<?=URLROOT?>/pages/lock">
                                    <i data-feather="lock"></i>
                                    <span style="color: red;"> Lock Screen </span>
                                   
                                </a>

                             
                            </li>
                        </ul>
                        

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->

            </div>