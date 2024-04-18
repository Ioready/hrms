<section class="contentmenus_div">
    <div class="row">
        <div class="col-sm-12">
         
          <div class="offeroverview_tabs">

                    <nav class="navbar navbar-default" role="navigation">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <span class="navbar-brand"><?php echo $menu;?></span>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                             <ul class="nav navbar-nav offertabs_overview_menu">
                                                                   
                                <li <?php if($menu == 'Edit Offers'){ echo "class='active'";} ?>><a href="<?php echo base_url('Offerings/editOffer/' . $this->uri->segment(3)); ?>">Offering Details</a> </li>
                                                                                                  
                                <li <?php if($menu == 'Edit Offering Images'){ echo "class='active'";} ?>><a href="<?php echo base_url('Offerings/editOfferingImg/' . $this->uri->segment(3)); ?>">Offering Images</a></li>
                                                                                                  
                                <li <?php if($menu == 'Edit Offering Contents'){ echo "class='active'";} ?>><a href="<?php echo base_url('Offerings/editOfferingContent/' . $this->uri->segment(3)); ?>">Offering Content</a> </li>
                                                                  
                                <li <?php if($menu == 'Offering Sections'){ echo "class='active'";} ?>><a href="<?php echo base_url('Offerings/offeringSections/' . $this->uri->segment(3)); ?>">Offering Sections</a></li>
                                
                                 <li <?php if($menu == 'Attestations'){ echo "class='active'";} ?>><a href="<?php echo base_url('Offerings/attestations/' . $this->uri->segment(3)); ?>">Attestations</a></li>
                                 <li <?php if($menu == 'View Documents'){ echo "class='active'";} ?>><a href="<?php echo base_url('Offerings/viewDocuments/' . $this->uri->segment(3)); ?>">View Documents</a></li>
                                                                 
                                
                                                               
                                
                                
                                
                                <?php /*if ($escrow_details == "") { ?>
                                 <li <?php if($menu == 'Edit Offering Accounts'){ echo "class='active'";} ?>><a href="<?php echo base_url('Offerings/createEscrowAccount/' . $this->uri->segment(3)); ?>">Create Escrow Account</a></li>
                                 <?php } else { ?>
                                  <li <?php if($menu == 'Edit Offering Accounts'){ echo "class='active'";} ?>><a href="<?php echo base_url('Offerings/viewEscrowAccount/' . $this->uri->segment(3)); ?>">View Escrow Account</a></li>
                                <?php }*/ ?>
                                
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>

         </div>
        
    </div>
  </div>
</section>










<section class="contentmenus_div" style="display:none;">
    <div class="row">
        <div class="col-sm-12">
            <div class="contentmenustxt_div">
           
                <a <?php if($menu == 'Edit Offers'){ echo "class='active'";} ?> href="<?php echo base_url('Offerings/editOffer/' . $this->uri->segment(3)); ?>">Offering Details</a> 
                <a  <?php if($menu == 'Edit Offering Contents'){ echo "class='active'";} ?>href="<?php echo base_url('Offerings/editOfferingContent/' . $this->uri->segment(3)); ?>">Offering Content</a> 
                <a  <?php if($menu == 'Team Members'){ echo "class='active'";} ?> href="<?php echo base_url('Offerings/teamMembers/' . $this->uri->segment(3)); ?>">Team Members</a>
                <a <?php if($menu == 'FAQ'){ echo "class='active'";} ?> href="<?php echo base_url('Offerings/faq/' . $this->uri->segment(3)); ?>">FAQ</a>
                <a  <?php if($menu == 'Edit Offering Images'){ echo "class='active'";} ?>href="<?php echo base_url('Offerings/editOfferingImg/' . $this->uri->segment(3)); ?>">Offering Images</a>
                <a  <?php if($menu == 'Photo'){ echo "class='active'";} ?>href="<?php echo base_url('Offerings/photos/' . $this->uri->segment(3)); ?>">Photos</a>
                <a <?php if($menu == 'Documents'){ echo "class='active'";} ?> href="<?php echo base_url('Offerings/viewDocuments/' . $this->uri->segment(3)); ?>">View Documents</a>
                
            </div>
        <!-- offering section -->
                                  <li <?php if($menu == 'Documents'){ echo "class='active'";} ?>><a href="<?php echo base_url('Offerings/viewDocuments/' . $this->uri->segment(3)); ?>">View Documents</a></li>
                                                                  
                                <li <?php if($menu == 'Team Members'){ echo "class='active'";} ?>><a href="<?php echo base_url('Offerings/teamMembers/' . $this->uri->segment(3)); ?>">Team Members</a></li>
                                
                                                                 
                                <li <?php if($menu == 'FAQ'){ echo "class='active'";} ?> ><a href="<?php echo base_url('Offerings/faq/' . $this->uri->segment(3)); ?>">FAQ</a></li>
                                
                                                               
                                <li <?php if($menu == 'Photo'){ echo "class='active'";} ?>><a href="<?php echo base_url('Offerings/photos/' . $this->uri->segment(3)); ?>">Photos</a></li>
        <!-- offering section -->

        </div>
    </div>      
</section>