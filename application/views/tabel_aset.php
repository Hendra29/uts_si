<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Data Aset</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="close-link"></a></li>
                                    <li><a class="close-link"></a></li>
                                    <li><a class="close-link"></a></li>
                                    <li><a class="close-link"></a></li>
                                    <li><a class="close-link"></a></li>
                                    <li><a class="close-link"></a></li>
                                    <a href="<?=site_url('Silab/register_aset')?>" class="btn btn-dark">Tambah</a>                                           </ul>  
                                    <div class="clearfix"></div>
                                </div>
                                                    
                                           
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                
                                                <th>No </th>
												<th>Nama Lokasi</th>
												<th>Nama Barang</th>
                                                <th>Spesifikasi</th>
                                                <th>Jumlah</th>
                                                <th>Satuan</th>
                                                <th>Keterangan</th>
                                                <th>Foto</th>
                                                <th class=" no-link last"><span class="nobr">Edit</span></th>
                                                <th class=" no-link last"><span class="nobr">Delate</span></th>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                            <?php 
                                            $no = 1;
                                            foreach($kode_aset as $val){?>
												<tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?=$val['nama_lab'];?></td>
													<td><?=$val['nama_barang'];?></td>
													<td><?=$val['spesifikasi'];?></td>
                                                    <td><?=$val['jumlah'];?></td>
                                                    <td><?=$val['satuan'];?></td>
                                                    <td><?=$val['keterangan'];?></td>
                                                    <td><img width='130' src="<?=base_url('assets/images/'.$val['foto']);?>"></td>
												
                                                    <td><a href="<?=site_url('Silab/update_register_aset/'.md5($val['kode_aset']))?>"><i  class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a></td>
                                                    <td><a href="<?=site_url('Silab/delete_aset/'.($val['kode_aset']));?>"onclick="return confirm('Anda yakin akan menghapus data ini ?');"><i  class="btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>
                                                   
												</tr>
											<?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                         <!-- Datatables -->
        <script src="<?php echo base_url();?>assets/js/datatables/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url();?>assets/js/datatables/tools/js/dataTables.tableTools.js"></script>
        <script>
            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#example').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0]
                        } //disables sorting for column one
            ],
                    'iDisplayLength': 12,
                    "sPaginationType": "full_numbers",
                    "tableTools": {
                        "sSwfPath": "<?php echo base_url();?>('assets/assets2/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); "
                    }
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
        </script>