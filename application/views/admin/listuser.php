<div id="container_table_merek" class="container margin-transaksi" style="min-height : 480px;">
           	<div class="panel panel-default">
           		<div class="panel panel-default panel-body">
                 <div class="row ">
                   <div class="col-sm-12">
                     <nav aria-label="breadcrumb">
                       <ol class="breadcrumb" >
                         <li class="breadcrumb-item"><a href="#">
                           <i class="fas fa-cubes"></i>&nbsp;&nbsp;List User&nbsp;</a>
                         </li>
                       </ol>
                     </nav>
                   </div>

                   <div class="col-sm-12">
                     <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                       <div class="btn-group btn-group-sm" role="group" aria-label="Two group" >
                         <button name="btn_tambahCombo" id="btn_tambahCombo" type="button" class="btn btn-success btn-sm tambah_data_barang" data-toggle="modal" data-target="#add_dataCombo">
                              <i class="fas fa-file-excel"></i>&nbsp;&nbsp; Export &nbsp;
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
                             <th scope="col">Name</th>
                             <th scope="col">Address</th>
                             <th scope="col">Phone Number</th>
                             <th scope="col">Email</th>
                             <th scope="col">Details</th>
                             <th scope="col">Hapus</th>

                           </tr>
                         </thead>
                         <tbody>

                           <?php $i = 1; ?>
                             <?php foreach($users as $row) :?>
                             <tr>
                               <td width="60px" align="center"><?= $i; ?></td>
                               <td><?= $row->u_name;?></td>
                               <td><?= $row->detail_address ?></td>
                               <td align="center"><?= $row->u_phone?></td>
                               <td><?= $row->email?></td>
                               <td align="center">
                                 <a href="#" name="detail_data_user"  id="<?php echo $row->u_id; ?>" class="detail_data_user" data-toggle="modal" data-target="#modal_user" data-backdrop="static" data-keyboard="false">
                                 <i class="fas fa-eye"></i> details
                                 </a>
                               </td >

                               <td align="center">
                                 <a href="#" name="hapus_data_user" id="<?php echo $row->u_id; ?>" class="hapus_data_user" data-toggle="modal" data-target="#modal_hapus" data-backdrop="static" data-keyboard="false">
                                   <span class="glyphicon glyphicon-trash">  </span> hapus</a>
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
