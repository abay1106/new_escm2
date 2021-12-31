<div class="wrapper wrapper-content animated fadeInRight">
  <form method="post" id="form_aspek_penilaian_pelayanan" action="<?php echo site_url($controller_name."/vpi/daftar_pekerjaan/penilaian_vpi/".$vvh_id."/barang/submit_k3ldan5r");?>"  class="form-horizontal">


    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Header</h5>
            <div class="ibox-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div>
          <div class="ibox-content">

            <input type="hidden" name="contract_id_inp" value="<?php echo isset($vvh_data['contract_id']) ? $vvh_data['contract_id'] : "" ?>">
            <input type="hidden" name="vvh_id_inp" value="<?php echo $vvh_id ?>">
            <input type="hidden" name="tipe_inp" value="barang>">

            <?php $dept_id = isset($vvh_data['ptm_dept_id']) ? $vvh_data['ptm_dept_id'] : "" ?>
            <?php $dept_name = isset($vvh_data['ptm_dept_name']) ? $vvh_data['ptm_dept_name'] : "" ?>

            <div class="form-group">
              <label class="col-sm-2 control-label">Departemen</label>
              <div class="col-sm-10">
                <input type="hidden" name="dept_id_inp" class="form-control" value="<?php echo $dept_id ?>">
               <p class="form-control-static">
                <?php echo $dept_name ?>
               </p>
               </div>
            </div>

            <?php $vendor_id = isset($vvh_data['vendor_id']) ? $vvh_data['vendor_id'] : "" ?>
            <?php $vendor_name = isset($vvh_data['vendor_name']) ? $vvh_data['vendor_name'] : "" ?>

            <div class="form-group">
              <label class="col-sm-2 control-label">Penyedia Barang/Jasa</label>
              <div class="col-sm-10">
                <input type="hidden" name="vendor_id_inp" class="form-control" value="<?php echo $vendor_id ?>">
               <p class="form-control-static">
                 <?php echo $vendor_name ?>
               </p>
               </div>
             </div>

             <div class="form-group">
                <label class="col-sm-2 control-label">Deskripsi Pengadaan</label>
                <div class="col-sm-10">
                 <p class="form-control-static">
                  <?php echo $vvh_data['subject_work'] ?>
                 </p>
               </div>
             </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Bulan</label>
              <div class="col-sm-3">
                <input type="hidden" name="date_inp" value="<?php echo $vvh_data['vvh_date'] ?>">
                  <p class="form-control-static">
                    <?php echo $vvh_data['vvh_date_text'] ?>
                  </p>
             </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Tipe</label>
                <div class="col-sm-3">
                  <input type="hidden" name="date_inp" value="<?php echo $vvh_data['vvh_date']; ?>">
                  <p class="form-control-static">
                    <?php echo ucfirst($vvh_data['vvh_tipe']); ?>
                  </p>
                  </p>
               </div>
            </div>

       </div>
     </div>
    </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Penilaian K3L</h5>
            <div class="ibox-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div>
          <div class="ibox-content">
           <table class="table table-bordered tbl-pertanyaan">
          <thead>
            <tr>
              <th width="10px">No</th>
              <th>Pertanyaan</th>
              <th width="100px">Nilai A (%)</th>
            </tr>
          </thead>

          <tbody id="pertanyaan_table">
          <?php 
          if (isset($pertanyaan_k3l)) {
          $no = 1;
          foreach ($pertanyaan_k3l as $key => $value){ 
            $curval = isset($value['vvks_value']) ? $value['vvks_value'] : "";
            $id = isset($value['vvks_id']) ? $value['vvks_id'] : ""; 
            ?> 
            <tr>
              <td><?php echo $no ?></td>
              <td>
                <?php echo $value['ak_value'] ?> 
                <input type="hidden" name="ak_id_inp[<?php echo $no-1 ?>]" value="<?php echo $value['ak_id'] ?>">
              </td>
              <td>
                 <input type="hidden" name="id_k3l_inp[<?php echo $no-1 ?>]"  value="<?php echo $id ?>">
                <input type="hidden" required class="form-control money answer_k3l_inp" 
                name="answer_k3l_inp[<?php echo $no-1 ?>]" value="<?php echo $curval ?>">
                <?php echo $curval ?>
              </td>
            </tr>

           <?php $no++; } } ?>
          </tbody>
        </table>
        <div style="text-align: center; display: none;">
          <a class="btn btn-primary" id="hitung_nilai_k3l" style="align-self: center">Hitung Nilai</a>
        </div>
        
      </div>
    </div>
  </div>
</div>

<div class="row">
<div class="col-lg-12">
  <div class="ibox float-e-margins">
    <div class="ibox-title">
      <h5>Nilai Akhir K3L</h5>
      <div class="ibox-tools">
        <a class="collapse-link">
          <i class="fa fa-chevron-up"></i>
        </a>
      </div>
    </div>
    <div class="ibox-content">
    <?php $curval = isset($prev_data['vvk_5r_value']) ? $prev_data['vvk_k3l_value']  : ""?>
    <div class="form-group" style="text-align: center;">
        <label><h3>Skor Penyedia Barang </h3></label><br>
        <h1><span id="hasil_k3l"><?php echo $curval ?></span></h1><br>
        <input type="hidden" name="nilai_akhir_k3l_inp" id="nilai_akhir_k3l_inp" value="<?php echo $curval ?>">
      <label><h4>Nilai Maksimal (A) =  100 %</h4></label>
    </div>

    </div>
    </div>
  </div>
</div>

<!-- 5R -->

<div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Penilaian 5R</h5>
            <div class="ibox-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div>
          <div class="ibox-content">
           <table class="table table-bordered tbl-pertanyaan">
          <thead>
            <tr>
              <th width="10px">No</th>
              <th>Pertanyaan</th>
              <th width="100px">Nilai B (%)</th>
            </tr>
          </thead>

          <tbody id="pertanyaan_table">
          <?php 
          if (isset($pertanyaan_5r)) {
          $no = 1;
          foreach ($pertanyaan_5r as $key => $value){ 
            $curval = isset($value['vvks_value']) ? $value['vvks_value'] : "";
            $id = isset($value['vvks_id']) ? $value['vvks_id'] : ""; 
            ?> 
            <tr>
              <td><?php echo $no ?></td>
              <td>
                <?php echo $value['ar_value'] ?> 
                <input type="hidden" name="ar_id_inp[<?php echo $no-1 ?>]" value="<?php echo $value['ar_id'] ?>">
              </td>
              <td>
                <input type="hidden" name="id_5r_inp[<?php echo $no-1 ?>]"  value="<?php echo $id ?>">
                <input type="hidden" required class="form-control money answer_5r_inp" 
                name="answer_5r_inp[<?php echo $no-1 ?>]" value="<?php echo $curval ?>">
              <?php echo $curval ?></td>
            </tr>

           <?php $no++; } } ?>
          </tbody>
        </table>
        <div style="text-align: center;display: none;"><a class="btn btn-primary" id="hitung_nilai_5r" style="align-self: center">Hitung Nilai</a></div>
        
      </div>
    </div>
  </div>
</div>

<div class="row">
<div class="col-lg-12">
  <div class="ibox float-e-margins">
    <div class="ibox-title">
      <h5>Nilai Akhir 5R</h5>
      <div class="ibox-tools">
        <a class="collapse-link">
          <i class="fa fa-chevron-up"></i>
        </a>
      </div>
    </div>
    <div class="ibox-content">
    <?php $curval = isset($prev_data['vvk_5r_value']) ? $prev_data['vvk_5r_value']  : ""?>
    <div class="form-group" style="text-align: center;">
        <label><h3>Skor Penyedia Barang </h3></label><br>
        <h1><span id="hasil_5r"><?php echo $curval; ?></span></h1><br>
        <input type="hidden" name="nilai_akhir_5r_inp" id="nilai_akhir_5r_inp" value="<?php echo $curval; ?>">
      <label><h4>Nilai Maksimal (B) =  100 %</h4></label>
    </div>

    </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-lg-12">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>Catatan</h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="ibox-content">
      <div class="form-group">
        <?php $curval = isset($prev_data['vvk_note_attach']) ? $prev_data['vvk_note_attach'] : "";
              $data_url = isset($prev_data['vvk_note_attach']) ? site_url('log/download_attachment/vendor/').'/'.$prev_data['vvk_note_attach'] : "#"; 
         ?>
      <label class="col-sm-1 control-label">Lampiran</label>
          <div class="col-sm-5">
            <div class="input-group">
              <p class="form-control-static">
                <a href="<?php echo $data_url ?>"> <?php echo $curval ?> </a>
              </p>
            </div>
            
          </div>
        </div>
      <?php $curval = isset($prev_data['vvk_note']) ? $prev_data['vvk_note'] : ""  ?>
      <div class="form-group">
        <label class="col-sm-1 control-label">Catatan *</label>
        <div class="col-sm-11">
          <textarea readonly name="note_inp" id="note_inp" required class="form-control" maxlength="1000" style="height: 80px"><?php echo $curval ?></textarea>
        </div>
      </div>

      </div>
      </div>
    </div>
</div>

<?php echo buttonback('vendor/vpi/monitor_pekerjaan/penilaian_vpi/'.$vvh_id,lang('back'),lang('save')) ?>
  </form>

</div>

<script type="text/javascript"> 
  $(document).ready(function() {
    numeric_format();

    $('.answer_inp').keypress(function(e){
      if (e.which != 8 && e.which != 0 && e.which < 48 || e.which > 57)
      {
          e.preventDefault();
      }
    });

     <?php if(!isset($pertanyaan_k3l)){ ?>
      alert('Pertanyaan K3L Belum dibuat');
    <?php }elseif(!isset($pertanyaan_5r)) { ?>
      alert('Pertanyaan 5R Belum dibuat');
    <?php } ?>

    var total_pertanyaan_k3l = <?php echo count($pertanyaan_k3l);?>;
    var total_pertanyaan_5r = <?php echo count($pertanyaan_5r);?>;

           $('.answer_inp').keypress(function(e){
              if (e.which != 8 && e.which != 0 && e.which < 48 || e.which > 57)
              {
                  e.preventDefault();
              }
            });

        $('#hitung_nilai_k3l').click(function() {
          hitung_k3l();
        });       

        function hitung_k3l(){
          var total_nilai_k3l = 0;
          for (var i = 0; i < total_pertanyaan_k3l; i++) {
            if ($('input[name="answer_k3l_inp['+i+']"]').val() == "") {
              var current_val = 0;
            }else{
              var current_val = $('input[name="answer_k3l_inp['+i+']"]').val()
            }
            
            total_nilai_k3l += parseFloat(current_val)
          }
          total_nilai_k3l = total_nilai_k3l/total_pertanyaan_k3l/10
          total_nilai_k3l = total_nilai_k3l.toFixed(2)
          // if(check_total('k3l') != 'false'){
            $('#hasil_k3l').html(total_nilai_k3l)
            $('#nilai_akhir_k3l_inp').val(total_nilai_k3l);
            $('#hitung_nilai_k3l').prop('disabled', true);

          // };
        }

       $('.answer_k3l_inp').on('change',function(event) {
        $('#hitung_nilai_k3l').prop('disabled', false);
        hitung_k3l()
        // $('#hasil_k3l').html("0")
        // $('#nilai_akhir_k3l_inp').val("");
      });

       $('#hitung_nilai_5r').click(function() {
          hitung_5r();
        });

       function hitung_5r(){
        var total_nilai_5r = 0;
        for (var i = 0; i < total_pertanyaan_5r; i++) {
          if ($('input[name="answer_5r_inp['+i+']"]').val() == "") {
            var current_val = 0;
          }else{
            var current_val = $('input[name="answer_5r_inp['+i+']"]').val()
          }
          total_nilai_5r += parseFloat(current_val)
        }
        total_nilai_5r = total_nilai_5r/total_pertanyaan_5r/10
        total_nilai_5r = total_nilai_5r.toFixed(2)

        $('#hasil_5r').html(total_nilai_5r)
        $('#nilai_akhir_5r_inp').val(total_nilai_5r);
        $('#hitung_nilai_5r').prop('disabled', true);
       }

       $('.answer_5r_inp').on('change',function(event) {
        $('#hitung_nilai_5r').prop('disabled', false);
        hitung_5r();
        // $('#hasil_5r').html("0")
        // $('#nilai_akhir_5r_inp').val("");
      });
      
        function check_total(tipe){
        var current_total = 0;
        $('.answer_'+tipe+'_inp').each(function(){
            current_total += parseFloat($(this).val().replace(',','.'))
        });
        total = current_total 
        // - parseFloat(current_val.toString().replace(',','.')) + parseFloat(newValue.replace(',','.'))

        if (total > 100) {
          alert('Maksimum Total Nilai 100%')
          $('.answer_'+tipe+'_inp').val('')
          return 'false';
        }else{
          return 'true';
        }
      }

      function numeric_format(){
          $("input.money").autoNumeric({
              aSep: '.',
              aDec: ',', 
              aSign: '',
              vMax:'100'
            });
      }

  });
</script>