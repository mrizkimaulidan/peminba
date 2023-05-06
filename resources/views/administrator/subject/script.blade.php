<script>
  $(function () {
    $('#createSubjectModal').on('shown.bs.modal', () => {
      $('#createSubjectModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('#editSubjectModal').on('shown.bs.modal', () => {
      $('#editSubjectModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('#datatable').on('click', '.editSubjectButton', function (e) {
      let id = $(this).data('id');
      let showURL = "{{ route('api.v1.subjects.show', 'param') }}";
      let updateURL = "{{ route('administrators.subjects.update', 'param') }}";
      showURL = showURL.replace('param', id);
      updateURL = updateURL.replace('param', id);

      let input = $('#editSubjectModal :input').not('[type=hidden]').not('.btn-close').not('.close-button').not('[type=submit]');
      input.val('Sedang mengambil data..');
      input.attr('disabled', true);

      $.ajax({
        url: showURL,
        method: 'GET',
        success: (res) => {
          input.attr('disabled', false);
          $('#editSubjectModal #code').val(res.data.code);
          $('#editSubjectModal #name').val(res.data.name);
          $('#editSubjectModal form').attr('action', updateURL);
        },
        error: (err) => {
          Swal.fire(
            'Error',
            'Terjadi kesalahan, lapor kepada administrator!',
            'error'
          );

          $('#editSubjectModal').on('shown.bs.modal', () => {
            $('#editSubjectModal').modal('hide');
          });
        }
      });
    });
  });
</script>
