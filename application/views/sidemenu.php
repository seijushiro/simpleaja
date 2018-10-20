            <div class="top-navbar">
              <div class="wrapper" id="navbar-wrapper">
                <ul class="nav-menu">
                  <?php 
                    if(!empty($akses)) {              
                    $parent_menu = array_filter($akses,function($var){
                      return $var['status']==1;
                      },ARRAY_FILTER_USE_BOTH); 

                      foreach ($parent_menu as $parent) { ?>                          
                        <li class="dropdown <?php echo ($active_ctrl==$parent['controller']?'active':'')?>">
                          <a class="dropdown-toggle" href="#" data-toggle="dropdown"><?php echo $parent['nm_menu'] ?>
                            <i class="fa fa-angle-down"></i></a>
                            <?php 
                              $parent_key = $parent['kd_menu'];
                              $child_menu = array_filter($akses,function($var) use ($parent_key){
                                return $var['kd_parent'] == $parent_key;
                                },ARRAY_FILTER_USE_BOTH); 
                              if(!empty($child_menu)){ ?> 
                                <ul class="dropdown-menu">
                                <?php 
                                  foreach ($child_menu as $child) { ?>
                                    <li>
                                      <a class="dropdown-item" href="<?php echo base_url().$child['controller'] ?>"><?php echo $child['nm_menu'] ?></a>
                                    </li>
                                  <?php } ?>
                                </ul>
                              <?php } ?>
                        </li>  
                      <?php } ?>                
                  <?php } ?>                                          
                </ul>
              </div>
            </div>
        </header>