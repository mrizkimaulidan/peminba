<script>
  $(function () {
    $('#createSchoolClassModal').on('shown.bs.modal', () => {
      $('#createSchoolClassModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('#editSchoolClassModal').on('shown.bs.modal', () => {
      $('#editSchoolClassModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('.datatable').on('click', '.editSchoolClassButton', function (e) {
      let id = $(this).data('id');
      let showURL = "{{ route('api.v1.school-classes.show', 'param') }}";
      let updateURL = "{{ route('administrators.school-classes.update', 'param') }}";
      showURL = showURL.replace('param', id);
      updateURL = updateURL.replace('param', id);

      let input = $('#editSchoolClassModal :input').not('[type=hidden]').not('.btn-close').not('.close-button').not('[type=submit]');
      input.val('Sedang mengambil data..');
      input.attr('disabled', true);

      $.ajax({
        url: showURL,
        method: 'GET',
        success: (res) => {
          input.attr('disabled', false);
          $('#editSchoolClassModal #name').val(res.data.name);
          $('#editSchoolClassModal form').attr('action', updateURL);
        },
        error: (err) => {
          Swal.fire(
            'Error',
            'Terjadi kesalahan, lapor kepada administrator!',
            'error'
          );

          $('#editSchoolClassModal').on('shown.bs.modal', () => {
            $('#editSchoolClassModal').modal('hide');
          });
        }
      });
    });
  });
</script>
