<div class="row">
   <div class="col-lg-12">
      <div class="ibox float-e-margins">
         <div class="ibox-title">
            <h5>EVALUASI TEKNIS &amp; HARGA</h5>
            <div class="ibox-tools">
               <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
               </a>
            </div>
         </div>

         <div class="ibox-content">
            <?php if ($activity_id >= 1140) { ?>
            <div class="row">
               <div class="col-md-12">
                  <a href="<?php site_url();?>index.php/procurement/pdf_bakp/<?php echo $this->session->userdata('rfq_id'); ?>"
                     type="button" class="btn btn-sm pull-right" data-toggle="tooltip"
                     title="Uskep Online" target="_blank"
                     style="background-color:red;color:white;margin-right:5px">
                     <i class="fa fa-file-pdf-o"></i> USKEP ONLINE
                  </a>
               </div>
            </div>
            <?php } ?>
            <div class="table-responsive" style="margin-top:10px">
               <table class="table table-bordered" id="evaluasi_teknis_harga_table">
                  <thead>
                     <tr>
                        <th rowspan="2">#</th>
                        <th rowspan="2">Nilai Total</th>
                        <th rowspan="2">Nama Vendor</th>
                        <th rowspan="2">Administrasi</th>
                        <th colspan="5">Teknis</th>
                        <th colspan="6">Harga</th>
                     </tr>
                     <tr>
                        <th>Bobot</th>
                        <th>Nilai</th>
                        <th>Minimum</th>
                        <th>Hasil</th>
                        <th>Catatan</th>
                        <th>Bobot</th>
                        <th>Nilai</th>
                        <th>Hasil</th>
                        <th>Catatan</th>
                        <th>Penawaran</th>
                        <th>Setelah Nego</th>
                     </tr>
                  </thead>

                  <tbody></tbody>

               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
reloadeval();

function reloadeval() {
   $("#evaluasi_teknis_harga_table tbody").load(
      "<?php echo site_url('procurement/load_evaluation') ?>/view/teknis_harga");
}

$(document).ready(function() {

   $(document.body).on("click", ".reloadeval", function() {
      $("#dialog").modal("hide");
   });

   $('#dialog').on('hidden.bs.modal', function(e) {
      reloadeval();
   });

});
</script>