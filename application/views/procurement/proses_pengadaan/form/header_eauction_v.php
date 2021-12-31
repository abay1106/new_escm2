<?php if($prep['ptp_eauction']){ ?>
<div class="row" id="matgis_form">
  <div class="col-lg-12">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>E-Auction 
          <?php echo ($permintaan['ptm_type_of_plan'] == "rkp_matgis") ? "MATERIAL STRATEGIS" : "NON MATERIAL STRATEGIS" ?>
        </h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="ibox-content">

        <?php $curval = (isset($eauction_header['judul'])) ? $eauction_header['judul'] : set_value("judul_eauction_inp") ?>
        <div class="form-group">
          <label class="col-sm-2 control-label">Judul E-Auction</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" required name="judul_eauction_inp" id="judul_eauction_inp" value="<?php echo $curval ?>">
          </div>

        </div>

        <?php $curval = (isset($eauction_header['deskripsi'])) ? $eauction_header['deskripsi'] : set_value("deskripsi_eauction_inp") ?>
        <div class="form-group">
          <label class="col-sm-2 control-label">Deskripsi E-Auction</label>
          <div class="col-sm-8">
            <textarea name="deskripsi_eauction_inp" id="deskripsi_eauction_inp" required class="form-control"><?php 
            echo $curval; ?></textarea>
          </div>
        </div>
<?php /*
        <div class="form-group">
          <label class="col-sm-2 control-label">Batas Nilai eAuction</label>
          <div class="col-sm-2">
            <div class="input-group">
              <input type="radio" id="persentase" value="1" name="metode_batas" checked="checked">
              <span>Persentase</span>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="input-group">
              <input type="radio" id="nominal" value="2" name="metode_batas">
              <span>Nominal</span>
            </div>
          </div>
        </div>
*/ ?>
<div class="form-group" id="batas_persentase">
  <?php //if (is_array($eauction_header) || $eauction_header['batas_method'] == 1 || empty($eauction_header['batas_method'])) { ?>

    <?php $persenbb = (isset($eauction_header['batas_bawah_percent'])) ? $eauction_header['batas_bawah_percent'] : set_value("b_bawah_eauction_percent_inp"); ?>
    <label class="col-sm-2 control-label">Batas Bawah (%)</label>
    <div class="col-sm-3">
      <div class="input-group">
        <input type="text" class="form-control money" id="b_bawah" name="b_bawah_eauction_percent_inp" value="<?php echo $persenbb ?>" maxlength="6">
        <span class="input-group-addon">%</span>
      </div>
    </div>
    <?php $persenba = (isset($eauction_header['batas_atas_percent'])) ? $eauction_header['batas_atas_percent'] : set_value("b_atas_eauction_percent_inp"); ?>
    <label class="col-sm-2 control-label">Batas Atas (%)</label>
    <div class="col-sm-3">
      <div class="input-group">
        <input type="text" class="form-control money" id="b_atas" name="b_atas_eauction_percent_inp" value="<?php echo $persenba ?>" maxlength="6">
        <span class="input-group-addon">%</span>
      </div>
    </div>
    <div class="col-sm-4">
     <p class="form-control-static" style="display: none;" id="b_eauction_label"></p>
     <?php $curval = (isset($eauction_header['batas_atas'])) ? $eauction_header['batas_atas'] : set_value("b_atas_eauction_money_inp"); ?>
     <input type="hidden" name="b_atas_eauction_money_inp" id="b_atas_eauction_money_inp_h" value="<?php echo $curval ?>">
     <?php $curval = (isset($eauction_header['batas_bawah'])) ? $eauction_header['batas_bawah'] : set_value("b_bawah_eauction_money_inp"); ?>
     <input type="hidden" name="b_bawah_eauction_money_inp" id="b_bawah_eauction_money_inp_h" value="<?php echo $curval ?>">
   </div>
   <?php //} ?>
 </div>

 <div class="form-group" id="batas_nominal">
  <?php //if (is_array($eauction_header) || $eauction_header['batas_method'] == 2) { ?>

   <?php $curval = (isset($eauction_header['batas_bawah'])) ? $eauction_header['batas_bawah'] : set_value("b_bawah_eauction_money_inp"); ?>
   <label class="col-sm-2 control-label">Batas Bawah (Nominal)</label>
   <div class="col-sm-3">
    <div class="input-group">
      <span class="input-group-addon">IDR</span>
      <input type="text" class="form-control money" id="b_bawah_eauction_money_inp" name="b_bawah_eauction_money_inp" value="<?php echo $curval ?>">
    </div>
  </div>
  <?php $curval = (isset($eauction_header['batas_atas'])) ? $eauction_header['batas_atas'] : set_value("b_atas_eauction_money_inp"); ?>
  <label class="col-sm-2 control-label">Batas Atas (Nominal)</label>
  <div class="col-sm-3">
    <div class="input-group">
      <span class="input-group-addon">IDR</span>
      <input type="text" class="form-control money" id="b_atas_eauction_money_inp" name="b_atas_eauction_money_inp" value="<?php echo $curval ?>">

    </div>
  </div>

  <div class="col-sm-2">
   <p class="form-control-static" style="display: none;" id="b_eauction_label"></p>
   <?php $curval = (isset($eauction_header['batas_atas_percent'])) ? $eauction_header['batas_atas_percent'] : $persenba; ?>
   <input type="hidden" name="b_atas_eauction_percent_inp_h" id="b_atas" value="<?php echo $curval ?>">
   <?php $curval = (isset($eauction_header['batas_bawah_percent'])) ? $eauction_header['batas_bawah_percent'] : $persenbb ?>
   <input type="hidden" id="b_bawah" name="b_bawah_eauction_percent_inp_h"  value="<?php echo $curval ?>">
 </div>
 <?php //} ?>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">Tanggal Mulai</label>
  <div class="col-sm-3">
    <?php $curval = (isset($eauction_header['tanggal_mulai'])) ? $eauction_header['tanggal_mulai'] : set_value("tgl_mulai_eauction_inp") ?>
    <input type="text" class="form-control datetimepicker" required name="tgl_mulai_eauction_inp" id="tgl_mulai_eauction_inp" value="<?php echo $curval ?>">
  </div>
  <label class="col-sm-2 control-label">Tanggal Selesai</label>
  <div class="col-sm-3">
    <?php $curval = (isset($eauction_header['tanggal_berakhir'])) ? $eauction_header['tanggal_berakhir'] : set_value("tgl_selesai_eauction_inp"); ?>
    <input type="text" class="form-control datetimepicker" required name="tgl_selesai_eauction_inp" id="tgl_selesai_eauction_inp" value="<?php echo $curval ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">Tipe</label>
  <div class="col-sm-2">

    <?php $curval = (isset($eauction_header['tipe'])) ? $eauction_header['tipe'] : "B" ?>

    <?php if($permintaan['ptm_type_of_plan'] == "rkp_matgis"){ ?>

      <input type="hidden" name="tipe_eauction_inp" value="<?php echo $curval ?>">
      <p class="form-control-static">Itemize</p>

    <?php } else { ?>

      <select name="tipe_eauction_inp" id="tipe_eauction_inp" class="form-control">
        <option selected disabled>Pilih</option>
        <option <?php echo ($curval == "A") ? "selected" : "" ?> value="A">Paket</option>
        <option <?php echo ($curval == "B") ? "selected" : "" ?> value="B">Itemize</option>
      </select>

    <?php } ?>

  </div>
  <label class="col-sm-2 control-label type_a">Minimum Penurunan</label>
  <div class="col-sm-2 type_a">
    <?php $curval = (isset($eauction_header['minimal_penurunan'])) ? $eauction_header['minimal_penurunan'] : set_value("penurunan_eauction_inp"); ?>
    <input type="text" class="form-control money target" name="penurunan_eauction_inp" value="<?php echo $curval ?>">
  </div>
  <label class="col-sm-2 control-label">Ulangi E-Auction</label>
  <div class="col-sm-1">
    <div class="checkbox">
      <input type="checkbox" name="reset_inp" value="1">
    </div>
  </div>
</div>

</div>
</div>
</div>
</div>

<script type="text/javascript">

  $(document).ready(function(){
    //$('#batas_nominal').hide()
    $('input[type=radio][name=metode_batas]').change(function() {
      reset_range(this.value);
      /*
      if (this.value == '1') {
          html = '';
          html += "<label class='col-sm-2 control-label'>Batas Bawah</label>";
          html += '<div class="col-sm-2">';
          html += '<div class="input-group">';
          html += '<input type="text" class="form-control money" id="b_bawah" name="b_bawah_eauction_percent_inp" value="'+$('[name=b_bawah_eauction_percent_inp]').val()+'" maxlength="6">';
          html += '<span class="input-group-addon">%</span>';
          html += '</div> </div>';
          html += '<label class="col-sm-2 control-label">Batas Atas</label>';
          html += '<div class="col-sm-2">';
          html += '<div class="input-group">';
          html += '<input type="text" class="form-control money" id="b_atas" name="b_atas_eauction_percent_inp" value="'+$('[name=b_atas_eauction_percent_inp]').val()+'" maxlength="6">';
          html += '<span class="input-group-addon">%</span>';
          html += '</div> </div>';
          html += '<div class="col-sm-4">';
          html += '<p class="form-control-static" id="b_eauction_label"></p>';
          html += '<input type="hidden" name="b_atas_eauction_money_inp" id="b_atas_eauction_money_inp" value="'+$('[name=b_atas_eauction_money_inp]').val()+'">';
          html += '<input type="hidden" name="b_bawah_eauction_money_inp" id="b_bawah_eauction_money_inp" value="'+$('[name=b_bawah_eauction_money_inp]').val()+'">';
          html += '</div>';
          $('#batas_persentase').html('');
          $('#batas_nominal').html('');
          $('#batas_nominal').hide();
          $('#batas_persentase').show();
          $('#batas_persentase').html(html);
          $("#b_eauction_label").html('Range : <strong>'+inttomoney($("#b_bawah_eauction_money_inp").val())+'</strong> - <strong>'+inttomoney($("#b_atas_eauction_money_inp").val())+'</strong>');
             
      }
      else if (this.value == '2') {
          html = '';
          html += '<label class="col-sm-2 control-label">Batas Bawah</label>';
          html += '<div class="col-sm-3">';
          html += '<div class="input-group">';
          html += '<span class="input-group-addon">IDR</span>';
          html += '<input type="text" class="form-control money" id="b_bawah_eauction_money_inp" name="b_bawah_eauction_money_inp" value="'+$('[name=b_bawah_eauction_money_inp]').val()+'">';
          html += '</div> </div>';
          html += '<label class="col-sm-2 control-label">Batas Atas</label>';
          html += '<div class="col-sm-3">';
          html += '<div class="input-group">';
          html += '<span class="input-group-addon">IDR</span>';
          html += '<input type="text" class="form-control money" id="b_atas_eauction_money_inp" name="b_atas_eauction_money_inp" value="'+$('[name=b_atas_eauction_money_inp]').val()+'">';
          html += '</div> </div>';
          html += '<div class="col-sm-2">';
          html += '<p class="form-control-static" id="b_eauction_label"></p>';
          html += '<input type="hidden" name="b_atas_eauction_percent_inp" id="b_atas" value="'+$('[name=b_atas_eauction_percent_inp]').val()+'">';
          html += '<input type="hidden" id="b_bawah" name="b_bawah_eauction_percent_inp"  value="'+$('[name=b_bawah_eauction_percent_inp]').val()+'">';
          html += '</div>';
          $('#batas_nominal').html('');
          $('#batas_persentase').html('');
          $('#batas_nominal').show();
          $('#batas_persentase').hide();
          $('#batas_nominal').html(html);
          $("#b_eauction_label").html('Range : <strong>'+inttomoney($('#b_bawah').val())+' % </strong> - <strong>'+inttomoney($('#b_atas').val())+' % </strong>');
              
      }
      */
    });

    //hlmifzi
    $(".datetimepicker").datetimepicker({format:"YYYY-MM-DD HH:mm:ss"});

    $( ".target" ).autoNumeric({
      aSep: '.',
      aDec: ',', 
      aSign: ''
    });
    //end

    
    var tipe = "<?php echo (isset($eauction_header['tipe'])) ? $eauction_header['tipe'] : '0'; ?>";
    
    if (tipe == '0') {
      $("select[name='tipe_eauction_inp']").change(function(){
        var val = $(this).find("option:selected").val();
        if(val == "A"){
          $(".type_a").show();
          $(".type_b").hide();
        } else {
          $(".type_a").hide();
          $(".type_b").show();
        }

      });
    }

    if(tipe == 'A'){
      $(".type_a").show();
      $(".type_b").hide();
    } else {
      $(".type_a").hide();
      $(".type_b").show();
    }
    var hps = $("#total_alokasi_inp").val();
      // $("#b_atas_eauction_money_inp").val(hps);
      // $("#b_bawah_eauction_money_inp").val(hps);
      // $("#b_eauction_label").html('Range : <strong>'+inttomoney(hps)+'</strong> - <strong>'+inttomoney(hps)+'</strong>');
      
      /*
    if ($('#metode_batas').val() == null || $('#metode_batas').val() == 1) {
      
      $("#b_eauction_label").html('Range : <strong>'+inttomoney($("#b_bawah_eauction_money_inp").val())+'</strong> - <strong>'+inttomoney($("#b_atas_eauction_money_inp").val())+'</strong>');
    }else{
      $("#b_eauction_label").html('Range : <strong>'+inttomoney($('#b_bawah').val())+'</strong> - <strong>'+inttomoney($('#b_atas').val())+'</strong>');
    }
    */

    $("#b_atas,#b_bawah").change(function(){
      var val = moneytoint($("#b_atas").val());
      var persen = 1+(val/100);
      var nominal_atas = persen*hps;
      console.log("NOMINAL ATAS "+nominal_atas);
      $("#b_atas_eauction_money_inp").val(inttomoney(nominal_atas));
      val = moneytoint($("#b_bawah").val());
      persen = 1-(val/100);
      var nominal_bawah = persen*hps;
      $("#b_bawah_eauction_money_inp").val(inttomoney(nominal_bawah));
      console.log("NOMINAL BAWAH "+nominal_bawah);
      $("#b_eauction_label").html('Range : <strong>'+inttomoney(nominal_bawah)+'</strong> - <strong>'+inttomoney(nominal_atas)+'</strong>');
    });

    $("#b_bawah_eauction_money_inp,#b_atas_eauction_money_inp").change(function(){
     var val = moneytoint($("#b_atas_eauction_money_inp").val());
        // var persen = 1+(val/100);
        var nominal_atas = (val/hps*100)-100;
        var x = parseFloat(nominal_atas).toFixed(2);
        console.log("PERSEN ATAS "+x);
        $("#b_atas").val(x);
        val = moneytoint($("#b_bawah_eauction_money_inp").val());
        // persen = 1-(val/100);
        var nominal_bawah = 100 - (val/hps*100);
        var x = parseFloat(nominal_bawah).toFixed(2);
        console.log("PERSEN BAWAH "+x);
        $("#b_bawah").val(x);
        $("#b_eauction_label").html('Range : <strong>'+inttomoney(nominal_bawah)+'</strong> - <strong>'+inttomoney(nominal_atas)+'</strong>');
      });
    
    function reset_range(metode){
      if (metode == 1 || metode == '') {

      }else{

      }
    }
    reset_range($('[name=metode_batas]').val());

    

  });

</script>

<?php if($sampai-time() > 0){ ?>
  <input type="hidden" name="eauction_running" value="1">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <style type="text/css">
  #toast-container > .toast-info:before {
    content: "";
  }
</style>
<script type="text/javascript">

  $('#tipe_eauction_inp').find(':not(:selected)').attr('disabled','disabled');
  $('#matgis_form .form-control').prop('disabled', true);

  function update_lowest(money){
    $(".lowest_bid").text(money);
  }

  function update_latest(money){
    $(".latest_bid").text(money);
  }

  setInterval(function(){

    $.ajax({
      url:"<?php echo site_url('procurement/eauction_list') ?>",
      type:"post",
      data:"tenderid=<?php echo $permintaan['ptm_number'] ?>",
      dataType:"json",
      success:function(data){
        update_latest(data.latest_bid);
        update_lowest(data.lowest_bid);
      }
    })

  },1000);

  toastr.options.closeButton = false;
  toastr.options.extendedTimeOut = 0;
  toastr.options.timeOut = 0;
  toastr.options.tapToDismiss = false;
  toastr.info('<center><h4 id="waktu"></h4>Penawaran Terendah Saat Ini : <span class="lowest_bid" style="font-weight: bold;">-</span></center>');
  $('#toast-container').css({'margin-top' : '4%',  'position' : 'absolute'});

  var deadline = '<?php echo date("Y-m-d H:i:s",$sampai) ?>';
  
  function getTimeRemaining(endtime){
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor( (t/1000) % 60 );
    var minutes = Math.floor( (t/1000/60) % 60 );
    var hours = Math.floor( (t/(1000*60*60)) % 24 );
    var days = Math.floor( t/(1000*60*60*24) );
    return {
      'total': t,
      'days': days,
      'hours': hours,
      'minutes': minutes,
      'seconds': seconds
    };
  }

  function initializeClock(id, endtime){
    var clock = document.getElementById(id);
    var timeinterval = setInterval(function(){
      var t = getTimeRemaining(endtime);
      clock.innerHTML = '<strong>' + t.days + '</strong> Hari ' +
      '<strong>'+ t.hours + '</strong> Jam ' +
      '<strong>' + t.minutes + '</strong> Menit ' +
      '<strong>' + t.seconds+ '</strong> Detik ';
      if(t.total<=0){
        clearInterval(timeinterval);
        window.location.reload();
      }
    },1000);
  }

  function updateClock(id){
    var clock = document.getElementById(id);
    var t = getTimeRemaining(deadline);
    clock.innerHTML = 'days: ' + t.days + '<br>' +
    'hours: '+ t.hours + '<br>' +
    'minutes: ' + t.minutes + '<br>' +
    'seconds: ' + t.seconds;
    if(t.total<=0){
      clearInterval(timeinterval);
      window.location.reload();
    }
  }

  initializeClock('waktu', deadline);

</script>
<?php } ?>

<?php 
  include(VIEWPATH."procurement/proses_pengadaan/view/header_eauction_v.php");
}
?>