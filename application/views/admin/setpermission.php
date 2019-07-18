<?php 
$role_id = base64_decode($_GET['r_id']);
$role_name = base64_decode($_GET['r_n']);
//print_r($role_name);
?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                   
                    <div class="col-md-12">
                        <div class="card">
						
                            <div class="card-header">
                                <strong class="card-title" >SET PERMISSION</strong>
                                &nbsp;&nbsp;<strong class="card-title">ROLE: <?= $role_name?></strong>
								<a style="float:right" type="button" class="btn btn-success" href="<?= base_url('admin/roles')?>">Back to Rolelist</a>
                            </div>
                            <div class="card-body">
							
                                <form action="<?= base_url('admin/set_permission')?>" method="POST">
							<input type="hidden" name="setp_rid" id="setP_id" value="">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Modules</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php 
									 
									$modules = $this->data['all_modules'];
									$data2 = $this->data['all_permission'];
									  for($i=0;$i<=count($data2);$i++){
										  
										  if($data2[$i]->role_id == $role_id){
									        $data3 = json_decode($data2[$i]->moludes_id); 
									?>
                                        <tr>
                                            <td><?= 1?></td>
                                            <td><?= Setting?></td>
                                            <td>
											
											<label class="switch switch-3d switch-success mr-3"><input type="checkbox" name="roleMid_1" id="6767" class="switch-input" <?php if($data3->Setting =='on'){?> checked="true" <?php } ?>> <span class="switch-label"></span> <span class="switch-handle"></span></label>
									        											
											</td>
                                        </tr>
										<tr>
                                            <td><?= 2?></td>
                                            <td><?= Reporting?></td>
                                            <td>
											
											
											<label class="switch switch-3d switch-success mr-3"><input type="checkbox" name="roleMid_2" id="6767" class="switch-input" <?php if($data3->Reporting == 'on'){?> checked="true" <?php } ?>> <span class="switch-label"></span> <span class="switch-handle"></span></label>
									        
									   
											</td>
                                        </tr>
									  <?php } } ?>
									</tbody>
								</table>
								<div class="login-form">
<button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button></div>								
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
<!--Models-->
<!--ADD ROLES-->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
							
                                <h5 class="modal-title" id="largeModalLabel">Add New Role</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="login-form">
                    <form action="<?= base_url('admin/add_role')?>" method="POST">
                        <div class="form-group">
                            <label>Role Name</label>
                            <input type="text" class="form-control" name="role_name" placeholder="Role Name">
                        </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text"  name="role_desc" class="form-control" placeholder="Description">
                        </div>
                                
                                    
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    <div class="social-login-content">
                                       
                                    </div>
                                    
                    </form>
                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
<!--EDIT ROLES-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
							
                                <h5 class="modal-title" id="largeModalLabel">Update Role</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="login-form">
                    <form action="<?= base_url('admin/edit_role')?>" method="POST">
                        <div class="form-group">
                            <label>Role Name</label>
                            <input type="hidden" class="form-control" id="edit_id" name="role_idd">
                            <input type="text" class="form-control" id="edit_name" name="role_name" placeholder="Role Name">
                        </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text"  name="role_desc" id="edit_desc" class="form-control" placeholder="Description">
                        </div>
                                
                                    
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
                                    <div class="social-login-content">
                                       
                                    </div>
                                    
                    </form>
                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
				
<!--SET ROLES PERMISSION-->
<div class="modal fade" id="setpermissionModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
							
                                <h5 class="modal-title" id="largeModalLabel">SET PERMISSION</h5>
								&nbsp;&nbsp;<span style="float:right!important"><h5>ROLE: </h5><h5 id="setP_rname"></h5></span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
							
							<form action="<?= base_url('admin/set_permission')?>" method="POST">
							<input type="hidden" name="setp_rid" id="setP_id" value="">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Modules</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php 
									 
									$modules = $this->data['all_modules'];
									$data2 = $this->data['all_permission'];
									  for($i=0;$i<=count($data2);$i++){
										  print_r($data2[$i]->role_id);
										  if($data2[$i]->role_id == '6'){
									        $data3 = json_decode($data2[$i]->moludes_id); 
									?>
                                        <tr>
                                            <td><?= 1?></td>
                                            <td><?= Setting?></td>
                                            <td>
											
											<label class="switch switch-3d switch-success mr-3"><input type="checkbox" name="roleMid_1" id="6767" class="switch-input" <?php if($data3->Setting =='on'){?> checked="true" <?php } ?>> <span class="switch-label"></span> <span class="switch-handle"></span></label>
									        											
											</td>
                                        </tr>
										<tr>
                                            <td><?= 2?></td>
                                            <td><?= Reporting?></td>
                                            <td>
											
											
											<label class="switch switch-3d switch-success mr-3"><input type="checkbox" name="roleMid_2" id="6767" class="switch-input" <?php if($data3->Reporting == 'on'){?> checked="true" <?php } ?>> <span class="switch-label"></span> <span class="switch-handle"></span></label>
									        
									   
											</td>
                                        </tr>
									  <?php } } ?>
									</tbody>
								</table>
								<div class="login-form">
<button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button></div>								
                            </div>
                            </form>
                        </div>
                    </div>
                </div>				
<!--DELETE ROLE-->				
<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Delete Role</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Are you sure do you want to delete it?
                                </p>
                            </div>
                            <div class="modal-footer">
							<form action="<?= base_url('admin/delete_role')?>" method="POST">
							    <input type="hidden" name="role_idd" id="role_id" value=""> 
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-primary" value="Confirm">
								</form>
                            </div>
                        </div>
                    </div>
                </div>	
<!--ACTIVATE/DEACTIVATE-->
<div class="modal fade" id="deactivateModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Deactivate Role</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Are you sure do you want to deactivate it?
                                </p>
                            </div>
                            <div class="modal-footer">
							<form action="<?= base_url('admin/deactivate_role')?>" method="POST">
							    <input type="hidden" name="d_role_idd" id="a_role_id" value=""> 
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-primary" value="Confirm">
								</form>
                            </div>
                        </div>
                    </div>
                </div>
<!--ACTIVATE/DEACTIVATE-->
<div class="modal fade" id="activateModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Activate Role</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Are you sure do you want to Activate it?
                                </p>
                            </div>
                            <div class="modal-footer">
							<form action="<?= base_url('admin/activate_role')?>" method="POST">
							    <input type="hidden" name="a_role_idd" id="d_role_id" value=""> 
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-primary" value="Confirm">
								</form>
                            </div>
                        </div>
                    </div>
                </div>				