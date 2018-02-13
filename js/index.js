function appendProduct () {
  let product = $('#product').val()
  $('#todoList').append('<li><i class="fa fa-sort handle" aria-hidden="true"></i>' + product + '</li>')
  $('#product').val('')
}


$('#todoList').sortable({
  axis: 'y',
  handle: '.handle'
})