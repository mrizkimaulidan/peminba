<script>
  $(function () {
    $('#createAdministratorModal').on('shown.bs.modal', () => {
      $('#createAdministratorModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('#editAdministratorModal').on('shown.bs.modal', () => {
      $('#editAdministratorModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('#datatable').on('click', '.editAdministratorButton', function (e) {
      let id = $(this).data('id');
      let showURL = "{{ route('administrator.api.v1.users.show', 'id') }}";
      let updateURL = "{{ route('administrators.users.update', 'id') }}";
      showURL = showURL.replace('id', id);
      updateURL = updateURL.replace('id', id);

      let input = $('#editAdministratorModal :input').not('[type=hidden]').not('.btn-close').not('.close-button').not('[type=submit]');
      input.not('[type=password]').val('Sedang mengambil data..');
      input.attr('disabled', true);

      $.ajax({
        url: showURL,
        method: 'GET',
        success: (res) => {
          input.attr('disabled', false);
          $('#editAdministratorModal #code').val(res.data.code);
          $('#editAdministratorModal #name').val(res.data.name);
          $('#editAdministratorModal #email').val(res.data.email);
          $('#editAdministratorModal #phone_number').val(res.data.phone_number);
          $('#editAdministratorModal form').attr('action', updateURL);
        },
        error: (err) => {
          Swal.fire(
            'Error',
            'Terjadi kesalahan, lapor kepada administrator!',
            'error'
          );

          $('#editAdministratorModal').on('shown.bs.modal', () => {
            $('#editAdministratorModal').modal('hide');
          });
        }
      });
    });
  });
</script>
