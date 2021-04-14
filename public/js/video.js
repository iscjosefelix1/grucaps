$(document).on("change", ".custom-file-input", function(evt) {
  var $source = $('#video_here');
  $source[0].src = URL.createObjectURL(this.files[0]);
  $source.parent()[0].load();
});



$(document).on('click', '.edit-modalv', function() {
$('#footer_action_button').text(" Actualizar");
$('#footer_action_button').addClass('glyphicon-check');
$('#footer_action_button').removeClass('glyphicon-trash');
$('.cab').removeClass('bg-danger');
$('.cab').addClass('bg-warning');
$('.actionBtn').addClass('btn-success');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('editvideo');
$('.modal-title').text('Actualizar Información del Video');
$('.deleteContent').hide();
$('.form-horizontal').show();
$('#editpublic').val($(this).data('public'));
$('#fid').val($(this).data('id'));
$('#n').val($(this).data('nombre'));
$('#d').val($(this).data('descripcion'));
$('#mymodal').modal('show');
});

$('.modal-footer').on('click', '.editvideo', function() {
  $.ajax({
    type: 'POST',
    url: 'editVideo',
    data: {
'_token': $('input[name=_token]').val(),
'id': $("#fid").val(),
'nombre': $('#n').val(),
'descripcion': $('#d').val(),
'public': $('#editpublic').val()
},
success: function(data) {

  $('#modalconf').modal('show');
  // alert("Se actualizó correctamente");



      // $('.video' + data.id).replaceWith(" "+
      // "<tr class='video" + data.id + "'>"+
      // "<td>" + data.id + "</td>"+
      // "<td>" + data.nombre + "</td>"+
      // "<td>" + data.descripcion + "</td>"+
      // "<td>" + "<a class='btn btn-success text-white' href=''><i class='fa fa-plus'></i>Recursos</a>"
      // +"</td>"+
      // // "<td>" + data.created_at + "</td>"+
      // "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-descripcion='" + data.descripcion + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-descripcion='" + data.descripcion + "'><span class='fa fa-edit'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-descripcion='" + data.descripcion + "'><span class='fa fa-trash'></span></button></td>"+
      // "</tr>");
    }
  });
});


$(document).on('click', '.reload', function() {
  window.location.reload();
});

// form Delete function
$(document).on('click', '.delete-modalv', function() {
$('#footer_action_button').text(" Eliminar");
$('#footer_action_button').removeClass('glyphicon-check');
$('#footer_action_button').addClass('glyphicon-trash');
$('.cab').removeClass('bg-warning');
$('.cab').addClass('bg-danger');
$('.actionBtn').removeClass('btn-success');
$('.actionBtn').addClass('btn-danger');
$('.actionBtn').addClass('deletevideo');
$('.modal-title').text('Eliminar Video');
$('.id').text($(this).data('id'));
$('.url').text($(this).data('url'));
$('.deleteContent').show();
$('.form-horizontal').hide();
//$('.id').hide();
$('.name').html($(this).data('nombre'));
$('#mymodal').modal('show');
});

$('.modal-footer').on('click', '.deletevideo', function(){
  $.ajax({
    type: 'POST',
    url: 'deleteVideo',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.vidid').text(),
      'url': $('.vidurl').text()
    },
    success: function(data){
        $('.video' + $('.vidid').text()).remove();
        //$('.name').html($(this).data('nombre'));
        $('#modalconfirm').modal('show');
        // $('.module' + $('.id').text()).remove();
    }
  });
});

