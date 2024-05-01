<script>
  $(function () {
    $('#createOfficerModal').on('shown.bs.modal', () => {
      $('#createOfficerModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('#editOfficerModal').on('shown.bs.modal', () => {
      $('#editOfficerModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('.datatable').on('click', '.editOfficerButton', function (e) {
      let id = $(this).data('id');
      let showURL = "{{ route('api.v1.users.show', 'param') }}";
      let updateURL = "{{ route('administrators.officers.update', 'param') }}";
      showURL = showURL.replace('param', id);
      updateURL = updateURL.replace('param', id);

      let input = $('#editOfficerModal :input').not('[type=hidden]').not('.btn-close').not('.close-button').not('[type=submit]');
      input.not('[type=password]').val('Sedang mengambil data..');
      input.attr('disabled', true);

      $.ajax({
        url: showURL,
        method: 'GET',
        success: (res) => {
          input.attr('disabled', false);
          $('#editOfficerModal #code').val(res.data.code);
          $('#editOfficerModal #name').val(res.data.name);
          $('#editOfficerModal #email').val(res.data.email);
          $('#editOfficerModal #phone_number').val(res.data.phone_number);
          $('#editOfficerModal form').attr('action', updateURL);
        },
        error: (err) => {
          Swal.fire(
            'Error',
            'Terjadi kesalahan, lapor kepada administrator!',
            'error'
          );

          $('#editOfficerModal').on('shown.bs.modal', () => {
            $('#editOfficerModal').modal('hide');
          });
        }
      });
    });
  });
</script>
