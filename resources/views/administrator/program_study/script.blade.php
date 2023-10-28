<script>
  $(function () {
    $('#createProgramStudyModal').on('shown.bs.modal', () => {
      $('#createProgramStudyModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('#editProgramStudyModal').on('shown.bs.modal', () => {
      $('#editProgramStudyModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('.datatable').on('click', '.editProgramStudyButton', function (e) {
      let id = $(this).data('id');
      let showURL = "{{ route('api.v1.program-studies.show', 'param') }}";
      let updateURL = "{{ route('administrators.program-studies.update', 'param') }}";
      showURL = showURL.replace('param', id);
      updateURL = updateURL.replace('param', id);

      let input = $('#editProgramStudyModal :input').not('[type=hidden]').not('.btn-close').not('.close-button').not('[type=submit]');
      input.val('Sedang mengambil data..');
      input.attr('disabled', true);

      $.ajax({
        url: showURL,
        method: 'GET',
        success: (res) => {
          input.attr('disabled', false);
          $('#editProgramStudyModal #name').val(res.data.name);
          $('#editProgramStudyModal form').attr('action', updateURL);
        },
        error: (err) => {
          Swal.fire(
            'Error',
            'Terjadi kesalahan, lapor kepada administrator!',
            'error'
          );

          $('#editProgramStudyModal').on('shown.bs.modal', () => {
            $('#editProgramStudyModal').modal('hide');
          });
        }
      });
    });
  });
</script>
