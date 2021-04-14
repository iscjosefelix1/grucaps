$(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Agregar Módulo');
  });
  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'addModule',
      data: {
        '_token': $('input[name=_token]').val(),
        'course_id': $('input[name=course_id]').val(),
        'name': $('input[name=name]').val(),
        'descripcion': $('input[name=descripcion]').val()
      },
      success: function(data){
        if ((data.errors)) {
          //$('.error').addClass('alert');
          // $('.error').
          $('.error').text(data.errors.course_id);
          $('.error').text(data.errors.name);
          $('.error').text(data.errors.descripcion);

          alert("No se puedo agregar, verifique sus datos");
        } else {
          $('.error').remove();
          $('#table').append("<tr class='module" + data.id + "'>"+
          "<td>" + "NEW" + "</td>"+
          "<td>" + data.name + "</td>"+
          "<td>" + data.descripcion + "</td>"+
          "<td>" + "<a class='btn btn-success text-white' href=''><i class='fa fa-plus'></i>Recursos</a>"
          +"</td>"+
          "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-descripcion='" + data.descripcion + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-descripcion='" + data.descripcion + "'><span class='fa fa-edit'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-descripcion='" + data.descripcion + "'><span class='fa fa-trash'></span></button></td>"+
          "</tr>");

          alert("Se agregó correctamente");
        }
      },
    });
    $('#name').val('');
    $('#descripcion').val('');

    
  });

//function Edit POST
$(document).on('click', '.edit-modal', function() {
$('#footer_action_button').text(" Actualizar");
$('#footer_action_button').addClass('glyphicon-check');
$('#footer_action_button').removeClass('glyphicon-trash');
$('.actionBtn').addClass('btn-success');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('edit');
$('.modal-title').text('Actualizar Módulo');
$('.deleteContent').hide();
$('.form-horizontal').show();
$('#fid').val($(this).data('id'));
$('#n').val($(this).data('name'));
$('#d').val($(this).data('descripcion'));
$('#mymodal').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {
  $.ajax({
    type: 'POST',
    url: 'editModule',
    data: {
'_token': $('input[name=_token]').val(),
'id': $("#fid").val(),
'name': $('#n').val(),
'descripcion': $('#d').val()
},
success: function(data) {
      $('.module' + data.id).replaceWith(" "+
      "<tr class='module" + data.id + "'>"+
      "<td>" + data.id + "</td>"+
      "<td>" + data.name + "</td>"+
      "<td>" + data.descripcion + "</td>"+
      "<td>" + "<a class='btn btn-success text-white' href=''><i class='fa fa-plus'></i>Recursos</a>"
      +"</td>"+
      // "<td>" + data.created_at + "</td>"+
      "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-descripcion='" + data.descripcion + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-descripcion='" + data.descripcion + "'><span class='fa fa-edit'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-descripcion='" + data.descripcion + "'><span class='fa fa-trash'></span></button></td>"+
      "</tr>");
    }
  });
});


// form Delete function
$(document).on('click', '.delete-modal', function() {
$('#footer_action_button').text(" Eliminar");
$('#footer_action_button').removeClass('glyphicon-check');
$('#footer_action_button').addClass('glyphicon-trash');
$('.actionBtn').removeClass('btn-success');
$('.actionBtn').addClass('btn-danger');
$('.actionBtn').addClass('delete');
$('.modal-title').text('Eliminar Módulo');
$('.id').text($(this).data('id'));
$('.deleteContent').show();
$('.form-horizontal').hide();
//$('.id').hide();
$('.name').html($(this).data('name'));
$('#mymodal').modal('show');
});

$('.modal-footer').on('click', '.delete', function(){
  $.ajax({
    type: 'POST',
    url: 'deleteModule',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.modid').text()
    },
    success: function(data){
        $('.module' + $('.modid').text()).remove();
        // $('.module' + $('.id').text()).remove();
    }
  });
});

  // Show function
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  $('#i').text($(this).data('id'));
  $('#ti').text($(this).data('name'));
  $('#by').text($(this).data('descripcion'));
  $('.modal-title').text('Información del Módulo');
  });