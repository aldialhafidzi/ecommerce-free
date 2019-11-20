<div id="container_table_merek" class="container margin-transaksi" style="min-height : 480px;">
           	<div class="panel panel-default">
           		<div class="panel panel-default panel-body">
                 <div class="row ">
                   <div class="col-sm-12">
                     <nav aria-label="breadcrumb">
                       <ol class="breadcrumb" >
                         <li class="breadcrumb-item"><a href="#">
                           <i class="fas fa-cubes"></i>&nbsp;&nbsp;List Admin&nbsp;</a>
                         </li>
                       </ol>
                     </nav>
                   </div>

                   <div class="col-sm-12">
                     <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                       <div class="btn-group btn-group-sm" role="group" aria-label="Two group" >
                         <button name="btn_createAdmin" id="btn_createAdmin" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_admin" data-backdrop="static" data-keyboard="false">
                              <i class="fas fa-plus"></i></i>&nbsp;&nbsp; Create &nbsp;
                         </button>

                       </div>
                     </div>
                   </div>

                   <div class="col-sm-12">
                     <hr>
                   </div>



                   <div class="col-sm-12">
                     <div id="table_merek">
                       <table id="tabel_master" class="table table-striped table-bordered responsive-table-m zui-table-rounded s-text7">
                         <thead class="bg-info" style="color:#fff;">
                           <tr>
                             <th align="center"  scope="col">#</th>
                             <th scope="col">Username</th>
                             <th scope="col">Name</th>
                             <th scope="col">Phone Number</th>
                             <th scope="col">Email</th>
                             <th scope="col">Password</th>
                             <th scope="col">Edit</th>
                             <th scope="col">Delete</th>

                           </tr>
                         </thead>
                         <tbody>

                           <?php $i = 1; ?>
                             <?php foreach($admins as $row) :?>
                             <tr>
                               <td width="60px" align="center"><?= $i; ?></td>
                               <td><?= $row->username;?></td>
                               <td><?= $row->name ?></td>
                               <td><?= $row->phone_number?></td>
                               <td><?= $row->email?></td>
                               <td><a class="change_password_admin" id="<?=$row->id ?>" data-toggle="modal" data-target="#modal_changePassword" data-backdrop="static" data-keyboard="false" href="#"><i class="fas fa-key"></i> Change</a></td>
                               <td align="center">
                                 <a href="#" name="edit_data_admin"  id="<?php echo $row->id; ?>" class="edit_data_admin" data-toggle="modal" data-target="#modal_admin" data-backdrop="static" data-keyboard="false">
                                 <i class="fas fa-eye"></i> edit
                                 </a>
                               </td >

                               <td align="center">
                                 <a href="#" name="delete_data_admin" id="<?php echo $row->id; ?>" class="delete_data_admin" data-toggle="modal" data-target="#modal_hapus" data-backdrop="static" data-keyboard="false">
                                   <span class="glyphicon glyphicon-trash">  </span> delete</a>
                                 </td>
                             </tr>

                           <?php $i++;?>
                         <?php endforeach; ?>


                         </tbody>
                       </table>
                     </div>

                   </div>
                </div>
              </div>
            </div>
          </div>
