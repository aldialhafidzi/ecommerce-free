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
                       <table id="tabel_master" class="table table-striped table-responsive-m table-bordered zui-table-rounded s-text7">
                         <thead class="bg-info" style="color:#fff;">
                           <tr>
                             <th align="center" width="20px"  scope="col">#</th>
                             <th scope="col">Invoice</th>
                             <th scope="col">User</th>
                             <th scope="col">Bank</th>
                             <th scope="col">Grandtotal</th>
                             <th scope="col">Details</th>
                             <th scope="col">Payment Date</th>
                             <th scope="col">Action</th>

                           </tr>
                         </thead>
                         <tbody>

                           <?php $i = 1; ?>
                             <?php foreach($list_success_transaction as $row) :?>
                             <tr>
                               <td valign="middle" width="20px" align="center"><?= $i; ?></td>
                               <td valign="middle"><?= $row->invoice;?></td>
                               <td valign="middle"><?= $row->u_name;?></td>
                               <td valign="middle" align="center"><?= $row->b_name;?></td>
                               <td valign="middle" >IDR <?= number_format($row->grandtotal,0,",",",");?></td>

                               <td valign="middle" align="center">
                                 <a id="<?= $row->t_id ?>" class="detail_invoice" href="#" data-toggle="modal" data-target="#modal_detail_transaction" data-backdrop="static" data-keyboard="false">
                                   <strong style="color : rgb(8, 176, 10);">Details</strong>
                                 </a>
                               </td >

                               <td valign="middle">
                                 <?= $row->confirm_payment_date ?>
                               </td >

                               <td>
                                 <a href="#" name="hapus_data_merek" id="<?php echo $row->t_id; ?>" class="hapus_data_merek" >
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
