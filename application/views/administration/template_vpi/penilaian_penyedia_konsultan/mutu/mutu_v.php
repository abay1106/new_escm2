<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Template Mutu Pekerjaan dan Personal</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>

          </div>
        </div>        

        <div class="ibox-content">

          <div class="table-responsive">

          <!-- Button trigger modal -->
          <span class="input-group-btn">

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_pertanyaan">
            Tambah
          </button>

          <button id="activate" disabled type="button" class="btn btn-primary" style="margin-left: 10px" onclick="return confirm('Apakah anda yakin?')">
            Aktifkan
          </button>
          <button id="remove" disabled type="button" class="btn btn-primary" onclick="return confirm('Apakah anda yakin?')">
            Nonaktifkan
          </button>

          </span>                

            <table id="mutu" class="table table-bordered table-striped"></table>

          </div>

        </div>
      </div>


    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_add_pertanyaan" tabindex="-1" role="dialog" aria-labelledby="modal_add_pertanyaanLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" class="overflow-y: initial !important" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal_add_pertanyaanLabel">Tambah Pertanyaan</h4>
        </button>
      </div>
      <form method="post" action="<?php 
      echo site_url('administration/template_vpi/penilaian_penyedia_konsultan/mutu/submit_add') ?>"
      id="app_form" >
      <div class="modal-body" style="height: 300px;overflow-y: auto;">

        <div id="form_template">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Kategori Nilai Ke-1" name="category_inp[0]" data-no="0" required="required"/>
        </div>
        <div class="form-group">
          <textarea class="form-control" rows="3" placeholder="Penjelasan Ke-1" name="note_inp[0]" data-no="0" required="required"></textarea>
        </div>
        <div style="text-align: center;">
          <button style="align-content: center;" disabled type="button" class="btn btn-primary">
            Hapus
          </button>
        </div>
        <br><br>
        </div>
        <div class="col-md-11">
          <button type="button" class="btn btn-primary" id="tambah-btn">Tambah</button>
          <button type="button" class="btn btn-primary" id="reset-btn">Reset</button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="tutup-btn" data-dismiss="modal">Tutup</button>
        <input type="submit" value="Simpan" class="btn btn-primary" id="simpan-btn">
      </div>
       </form>
    </div>
  </div>
</div>


<script type="text/javascript">


  jQuery.extend({
    getCustomJSON: function(url) {
      var result = null;
      $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        async: false,
        success: function(data) {
          result = data;
        }
      });
      return result;
    }
  });

  function detailFormatter(index, row, url) {

    var mydata = $.getCustomJSON("<?php echo site_url('administration') ?>/"+url);

    var html = [];
    $.each(row, function (key, value) {
     var data = $.grep(mydata, function(e){ 
       return e.field == key; 
     });

     if(typeof data[0] !== 'undefined'){

       html.push('<p><b>' + data[0].alias + ':</b> ' + value + '</p>');
     }
   });

    return html.join('');

  }

  function operateFormatter(value, row, index) {
    var link = "<?php echo site_url('administration/admin_tools/position') ?>";
    return [
    '<a class="btn btn-primary btn-xs action" href="'+link+'/nonaktif/'+value+'">',
    'Nonaktifkan',
    '</a>  ',
    ].join('');
  }

function totalTextFormatter(data) {
  return 'Total';
}
function totalNameFormatter(data) {
  return data.length;
}
function totalPriceFormatter(data) {
  var total = 0;
  $.each(data, function (i, row) {
    total += +(row.price.substring(1));
  });
  return '$' + total;
}

</script>

<script type="text/javascript">

  var $table = $('#mutu'),
  $remove = $('#remove'),
  $activate = $('#activate'),
  selections = [];


</script>

<script type="text/javascript">

  $(function () {

    $table.bootstrapTable({

      url: "<?php echo site_url('administration/template_vpi/penilaian_penyedia_konsultan/mutu/data_mutu') ?>",
      cookieIdTable:"adm_vpi_hasil_mutu_pekerjaan",
      idField:"ahm_id",
      <?php echo DEFAULT_BOOTSTRAP_TABLE_CONFIG ?>
      columns: [
        {
        field: 'checkbox',
        checkbox:true,
        align: 'center',
        valign: 'middle'
      },{
        field: 'ahm_seq',
        title: 'Urutan',
        sortable:true,
        order:true,
        searchable:true,
        align: 'left',
        valign: 'middle',
        width: '5%',
        editable: {
          placement: 'right',
          type:  'text',
          validate: function(v) {
              if(!v){ return 'Required field!'}
                else{
                  $.ajax({
                  url: "<?php echo site_url('administration/template_vpi/penilaian_penyedia_konsultan/mutu/update?key=urutan&data=') ?>"+v,
                  type:"get"
                });
 
              };
          },

        },
      },
      {
        field: 'ahm_category',
        title: 'Kategory Nilai',
        sortable:true,
        order:true,
        searchable:true,
        align: 'left',
        valign: 'middle',
        width: '10%'
      },{
        field: 'ahm_note',
        title: 'Penjelasan',
        sortable:true,
        order:true,
        searchable:true,
        align: 'left',
        valign: 'middle'
      },
      {
        field: 'ahm_status_name',
        title: 'Status',
        sortable:true,
        order:true,
        searchable:true,
        align: 'left',
        valign: 'middle',
        width: '20%',
      },
      {
        field: 'created_datetime',
        title: 'Created date',
        sortable:true,
        order:true,
        searchable:true,
        align: 'left',
        valign: 'middle',
        width: '20%',
      },
      {
        field: 'updated_datetime',
        title: 'Update date',
        sortable:true,
        order:true,
        searchable:true,
        align: 'left',
        valign: 'middle',
        width: '20%',
      },
      ]

    });
setTimeout(function () {
  $table.bootstrapTable('resetView');
}, 200);

$table.on('expand-row.bs.table', function (e, index, row, $detail) {
  $detail.html(detailFormatter(index,row,"alias_position"));
});

$table.on('check.bs.table  check-all.bs.table', function () {
  $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
  $activate.prop('disabled', !$table.bootstrapTable('getSelections').length);

  selections = getIdSelections();
  var param = "";
  var selected = "";
  $.each(selections,function(i,val){
    param += val+"=1&";
    selected = val;
  });
  $.ajax({
    url:"<?php echo site_url('Administration/selection/selection_hasil_mutu_pekerjaan') ?>",
    data:param,
    type:"get"
  });

  //set session ahm_id
  
  $.ajax({
    url:"<?php echo site_url('administration/set_session/ahm_id') ?>"+'/'+selected,
    type:"get"
  });

});
$table.on('uncheck.bs.table uncheck-all.bs.table', function () {
  $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
  $activate.prop('disabled', !$table.bootstrapTable('getSelections').length);

  selections = getIdSelections();

  var param = "";
  $.each(selections,function(i,val){
    param += val+"=0&";
  });
  $.ajax({
    url:"<?php echo site_url('Administration/selection/selection_hasil_mutu_pekerjaan') ?>",
    data:param,
    type:"get"
  });
});
$table.on('expand-row.bs.table', function (e, index, row, $detail) {
  $detail.html(detailFormatter(index,row));

});
$table.on('all.bs.table', function (e, name, args) {
  //console.log(name, args);
});
$remove.click(function () {
  var ids = getIdSelections();
  $table.bootstrapTable('remove', {
    field: 'id',
    values: ids
  });
  $remove.prop('disabled', true);
});

$activate.click(function () {
  var ids = getIdSelections();
  $table.bootstrapTable('remove', {
    field: 'id',
    values: ids
  });
  $activate.prop('disabled', true);
});

function getIdSelections() {
  return $.map($table.bootstrapTable('getSelections'), function (row) {
    return row.ahm_id
  });
}
function responseHandler(res) {
  $.each(res.rows, function (i, row) {
    row.state = $.inArray(row.ahm_id, selections) !== -1;
  });
  return res;
}


});
</script>


<script type="text/javascript">
  $(document).ready(function() {
    var no = 1;
    var scroll = 200;
    $('#tambah-btn').click(function() {
      var html = ''
      html += '<span id="span_'+no+'">'
      html += '<div class="form-group">'
      html += '<input type="text" class="form-control" placeholder="Kategori Nilai Ke-'+(no+1)+'" name="category_inp['+no+']" data-no="'+no+'" required="required"/>'
      html += '</div>'
      html += '<div class="form-group">'
      // html += '<input type="text" class="form-control" placeholder="Penjelasan" name="note_inp[0]" data-no="0" required="required"/>'
      html += '<textarea class="form-control" rows="3" placeholder="Penjelasan Ke-'+(no+1)+'" name="note_inp['+no+']" data-no="'+no+'" required="required"></textarea>'
      html += '</div>'
      html += '<div style="text-align: center;">'
      html += '<button style="align-content: center;" type="button" class="btn btn-primary hapus-btn" data-no="'+no+'">'
      html += 'Hapus'
      html += '</button>'
      html += '</div>'
      html += '<br><br>'
      html += '</span>'
      $('#form_template').append(html)

      $('input[name="category_inp['+no+']"]').focus();
      $('.modal-body').scrollTop(scroll);

      scroll = scroll+250
      no = no+1;

          $('button.hapus-btn').click(function() {
            var this_no = $(this).data('no')
            $('#span_'+this_no).remove()
          });

    });

    $('#reset-btn').click(function() {
      reset()
    });

     $('#tutup-btn').click(function() {
      reset()
    });

     $('#modal_add_pertanyaan').on('hidden.bs.modal', function () {
      reset()        
    })

    function reset(){
      no = 1;
      var html = ''
      html += '<span id="span_0">'
      html += '<div class="form-group">'
      html += '<input type="text" class="form-control" placeholder="Kategori Nilai Ke-1" name="category_inp[0]" data-no="0" required="required"/>'
      html += '</div>'
      html += '<div class="form-group">'
      // html += '<input type="text" class="form-control" placeholder="Penjelasan" name="note_inp[0]" data-no="0" required="required"/>'
      html += '<textarea class="form-control" rows="3" placeholder="Penjelasan Ke-1" name="note_inp[0]" data-no="0" required="required"></textarea>'
      html += '</div>'
      html += '<div style="text-align: center;">'
      html += '<button disabled style="align-content: center;" disabled type="button" class="btn btn-primary">'
      html += 'Hapus'
      html += '</button>'
      html += '</div>'
      // html += '<br><br>'
      html += '</span>'
      $('#form_template').html(html)
      scroll=200;
    }

    $('#app_form').submit(function(e) {
       e.preventDefault(); // avoid to execute the actual submit of the form.
      $('#app_form').ajaxSubmit({
        url: '<?php echo site_url('administration/template_vpi/penilaian_penyedia_konsultan/mutu/submit_add') ?>', 
        type: 'post',
        success: function(msg){
          alert(msg)
          reset();
          $table.bootstrapTable('refresh');
        }
      })
    });  

   $remove.click(function(e) {
      e.preventDefault(); // avoid to execute the actual submit of the form.
           $.ajax({
                 type: "POST",
                 url: "<?php echo site_url('administration/template_vpi/penilaian_penyedia_konsultan/mutu/nonaktif');?>",
                 success: function(data)
                 {
                     alert(data); // show response from the php script.
                     $table.bootstrapTable('refresh');
                     $activate.prop('disabled', true);
                 }
               });

   });

   $activate.click(function(e) {
      e.preventDefault(); // avoid to execute the actual submit of the form.
           $.ajax({
                 type: "POST",
                 url: "<?php echo site_url('administration/template_vpi/penilaian_penyedia_konsultan/mutu/aktifkan');?>",
                 success: function(data)
                 {
                     alert(data); // show response from the php script.
                     $table.bootstrapTable('refresh');
                     $remove.prop('disabled', true);
                 }
               });

   });

  });
</script>