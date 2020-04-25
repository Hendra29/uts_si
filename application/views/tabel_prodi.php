<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Data Prodi</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="close-link"></a></li>
                                    <li><a class="close-link"></a></li>
                                    <li><a class="close-link"></a></li>
                                    <li><a class="close-link"></a></li>
                                    <li><a class="close-link"></a></li>
                                    <li><a class="close-link"></a></li>
                                    <a href="<?=site_url('Silab/register_prodi')?>" class="btn btn-dark">Tambah</a>                                           </ul>  
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-lg-12">
                                <div class="content-panel">
                                <p>
                                <form action="<?= site_url('Silab/search_prodi'); ?>" method="post">
                                <div class="col-lg-4">
								<input type="text" class="form-control" placeholder="search keyword.."
								name="keyword" autocomplete="off" autofocus>
                                </div>
                                <input class="btn btn-primary" type="submit" name="search_submit" value="Cari">
								<p>                        
                                           
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                
                                                <th>No </th>
                                                <th>Nama Prodi</th>
                                                <th>Jurusan</th>
                                                <th>Fakultas</th>
                                                <th class=" no-link last"><span class="nobr">Edit</span></th>
                                                <th class=" no-link last"><span class="nobr">Delate</span></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                            <?php 
                                            $no = 1;
                                            foreach($id_prodi as $val){?>
												<tr>
                                                <td><?php echo $no++ ?></td>
													<td><?=$val['nama_prodi'];?></td>
													<td><?=$val['jurusan'];?></td>
													<td><?=$val['fakultas'];?></td>
													<td><a href="<?=site_url('Silab/update_register_prodi/'.md5($val['id_prodi']))?>"><i  class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a></td>
                                                    <td><a href="<?=site_url('Silab/delete_prodi/'.($val['id_prodi']));?>"onclick="return confirm('Anda yakin akan menghapus data ini ?');"><i  class="btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>
												</tr>
											<?php } ?>
                                        </tbody>
                                    </table>
                                    <?php echo $this->pagination->create_links();?>
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