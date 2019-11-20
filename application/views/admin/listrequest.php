<div id="container_table_merek" class="container margin-transaksi" style="min-height : 480px;">
           	<div class="panel panel-default">
           		<div class="panel panel-default panel-body">
                 <div class="row ">
                   <div class="col-sm-12">
                     <nav aria-label="breadcrumb">
                       <ol class="breadcrumb" >
                         <li class="breadcrumb-item"><a href="#">
                           <i class="fas fa-credit-card"></i>&nbsp;&nbsp;Pending Transaction&nbsp;</a>
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
                       <table id="tabel_master" class="table table-striped table-responsive-m table-bordered zui-table-rounded ">
                         <thead class="bg-info" style="color:#fff;">
                           <tr>
                             <th align="center" width="20px"  scope="col">#</th>
                             <th scope="col">Payment Code</th>
                             <th scope="col">User</th>
                             <th scope="col">Grandtotal</th>
                             <th scope="col">Status Payment</th>
                             <th scope="col">Accept</th>
                             <th scope="col">Delete</th>

                           </tr>
                         </thead>
                         <tbody>

                           <?php $i = 1; ?>
                             <?php foreach($list_pending_transaction as $row) :?>
                             <tr>
                               <td valign="middle" width="20px" align="center"><?= $i; ?></td>
                               <td valign="middle"><?= $row->payment_code;?></td>
                               <td valign="middle"><?= $row->u_name;?></td>
                               <td valign="middle" >IDR <?= number_format($row->grandtotal,0,",",",");?></td>
                               <td valign="middle" align="center" >
                                 <?php if($row->source_proof != NULL): ?>
                                   <a href="#" class="pop">
                                     <!-- <i class="far fa-eye"></i> Open -->
                                     <img src="<?= base_url(); ?>uploads/bukti-transaksi-user/<?= $row->source_proof ?>" class="image_thumb" alt="Cinque Terre" width="40" height="50">
                                     <strong style="color : #13a726;">Complete</strong>
                                     <img src="<?= base_url(); ?>uploads/bukti-transaksi-user/<?= $row->source_proof ?>" style="display :none;" class="image_thumb" alt="Cinque Terre" width="100" height="100">
                                   </a>
                               <?php else: ?>
                                 <strong style="color : #b3b3b3;">Waiting</strong>
                               <?php endif; ?>

                               </td>
                               <td valign="middle">
                                 <?php if($row->source_proof != NULL): ?>

                                 <a href="#" name="acc_payment" id="<?php echo $row->tp_id; ?>" class="acc_payment" data-toggle="modal" data-target="#modal_acc_pending_payment_" data-backdrop="static" data-keyboard="false">
                                 <span class="glyphicon glyphicon-edit"></span> accept
                               <?php else: ?>
                                 <strong style="color : #b3b3b3;">Waiting</strong>
                               <?php endif; ?>
                               </a>
                               </td >


                               <td>
                                 <a href="#" name="hapus_data_merek" id="<?php echo $row->tp_id; ?>" class="hapus_data_merek" >
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


          <div class="modal fade coeg_modal" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" data-dismiss="modal">
              <div class="modal-content"  >
                <div class="modal-body">

                	<button type="button" class="close coeg_modal"  data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <img src="" class="imagepreview" style="width: 100%;" >

                </div>
                <div class="modal-footer">

                </div>


              </div>
            </div>
          </div>
