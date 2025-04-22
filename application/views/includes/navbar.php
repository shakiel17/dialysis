<!-- main body area -->
<div class="main px-lg-4 px-md-4">

<!-- Body: Header -->
<div class="header">
    <nav class="navbar py-4">
        <div class="container-xxl">

            <!-- header rightbar icon -->
            <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                <div class="d-flex">
                    <!-- <a class="nav-link text-primary collapsed" href="help.html" title="Get Help">
                        <i class="icofont-info-square fs-5"></i>
                    </a> -->
                    <!-- <div class="avatar-list avatar-list-stacked px-3">
                        <img class="avatar rounded-circle" src="assets/images/xs/avatar2.jpg" alt="">
                        <img class="avatar rounded-circle" src="assets/images/xs/avatar1.jpg" alt="">
                        <img class="avatar rounded-circle" src="assets/images/xs/avatar3.jpg" alt="">
                        <img class="avatar rounded-circle" src="assets/images/xs/avatar4.jpg" alt="">
                        <img class="avatar rounded-circle" src="assets/images/xs/avatar7.jpg" alt="">
                        <img class="avatar rounded-circle" src="assets/images/xs/avatar8.jpg" alt="">
                        <span class="avatar rounded-circle text-center pointer" data-bs-toggle="modal" data-bs-target="#addUser"><i class="icofont-ui-add"></i></span>
                    </div> -->
                </div>                
                <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                    <div class="u-info me-2">
                        <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold"><?=$this->session->fullname;?></span></p>
                        <small>Logged In User</small>
                    </div>
                    <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                        <img class="avatar lg rounded-circle img-thumbnail" src="<?=base_url('design/assets/images/profile_av.png');?>" alt="profile">
                    </a>
                    <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                        <div class="card border-0 w280">
                            <div class="card-body pb-0">
                                <div class="d-flex py-1">
                                    <img class="avatar rounded-circle" src="<?=base_url('design/assets/images/profile_av.png');?>" alt="profile">
                                    <div class="flex-fill ms-3">
                                        <p class="mb-0"><span class="font-weight-bold"><?=$this->session->fullname;?></span></p>
                                        <small class="">@<?=$this->session->username;?></small>
                                    </div>
                                </div>
                                
                                <div><hr class="dropdown-divider border-dark"></div>
                            </div>
                            <div class="list-group m-2 ">
                                <a href="task.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-tasks fs-5 me-3"></i>My Task</a>
                                <a href="members.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user-group fs-6 me-3"></i>members</a>
                                <a href="ui-elements/auth-signin.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-6 me-3"></i>Signout</a>
                                <div><hr class="dropdown-divider border-dark"></div>
                                <a href="ui-elements/auth-signup.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-contact-add fs-5 me-3"></i>Add personal account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- menu toggler -->
            <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                <span class="fa fa-bars"></span>
            </button>

            <!-- main menu Search-->
            <div class="order-0 col-lg-6 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                <!-- <div class="input-group flex-nowrap input-group-lg">
                    <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
                    <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping">
                    <button type="button" class="input-group-text add-member-top" id="addon-wrappingone" data-bs-toggle="modal" data-bs-target="#addUser"><i class="fa fa-plus"></i></button>
                </div> -->
                <h2>Renal Dialysis Unit Information System</h2>
                <h4>MedMatrix e-Health Solutions, Inc.
            </div>

        </div>
    </nav>
</div>