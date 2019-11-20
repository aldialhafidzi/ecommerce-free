<div id="container_table_merek" class="container margin-transaksi" style="min-height : 480px;">
           	<div class="panel panel-default">
           		<div class="panel panel-default panel-body">
                 <div class="row ">
                   <div class="col-sm-12">
                     <nav aria-label="breadcrumb">
                       <ol class="breadcrumb" >
                         <li class="breadcrumb-item"><a href="#">
                           <i class="fas fa-cubes"></i>&nbsp;&nbsp;Master&nbsp;</a>
                         </li>
                       </ol>
                     </nav>
                   </div>

                   <div class="col-sm-12">
                     <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                       <div class="btn-group btn-group-sm" role="group" aria-label="Two group" >
                         <button name="add_merek" id="add_merek" type="button" class="btn btn-info add_product" data-toggle="modal" data-target="#modal_master" data-backdrop="static" data-keyboard="false">
                           <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Tambah
                         </button>
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
                       <table id="tabel_master" class="table table-striped table-bordered responsive-table-m zui-table-rounded ">
                         <thead class="bg-info" style="color:#fff;">
                           <tr>
                             <th align="center"  scope="col">#</th>
                             <th scope="col">Kode</th>
                             <th scope="col">Nama</th>
                             <th width="120px" scope="col">Source</th>
                             <th scope="col">Harga</th>
                             <th scope="col">Stock</th>
                             <th scope="col">Edit</th>
                             <th scope="col">Hapus</th>

                           </tr>
                         </thead>
                         <tbody>

                           <?php $i = 1; ?>
                             <?php foreach($goods as $row) :?>
                             <tr>
                               <td width="60px" align="center"><?= $i; ?></td>
                               <td><?= $row->code;?></td>
                               <td><?= $row->name;?></td>
                               <td align="center">
                                 <?php if($row->source): ?>
                                   <img src="<?= base_url(); ?>public/images/products/<?= $row->source ?>" class="image_thumb" alt="Cinque Terre" width="40" height="50">
                                 <?php endif; ?>
                                 <?php if($row->source_1): ?>
                                   <img src="<?= base_url(); ?>public/images/products/<?= $row->source_1 ?>" class="image_thumb" alt="Cinque Terre" width="40" height="50">
                                 <?php endif; ?>
                                 <?php if($row->source_2): ?>
                                   <img src="<?= base_url(); ?>public/images/products/<?= $row->source_2 ?>" class="image_thumb" alt="Cinque Terre" width="40" height="50">
                                 <?php endif; ?>
                               </td>
                               <td >IDR <?= number_format($row->price,0,",",",");?></td>
                               <td ><?= $row->stock;?> PCS</td>
                               <td>
                                 <a href="#" name="edit_data_product"  id="<?php echo $row->id; ?>" class="edit_data_product" data-toggle="modal" data-target="#modal_master" data-backdrop="static" data-keyboard="false">
                                 <span class="glyphicon glyphicon-edit">  </span> edit
                                 </a>
                               </td >

                               <td>
                                 <a href="#" name="hapus_data_product" id="<?php echo $row->id; ?>" class="hapus_data_product" data-toggle="modal" data-target="#modal_hapus" data-backdrop="static" data-keyboard="false">
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
