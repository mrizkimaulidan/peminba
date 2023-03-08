<script>
  $(function () {
    $('#datatable').on('click', '.showStudentButton', function (e) {
      let id = $(this).data('id');
      let showURL = "{{ route('administrator.api.v1.students.show', 'id') }}";
      showURL = showURL.replace('id', id);

      let input = $('#detailStudentModal :input').not('[type=hidden]').not('.btn-close').not('.close-button').not('[type=submit]');
      input.val('Sedang mengambil data..');

      $.ajax({
        url: showURL,
        method: 'GET',
        success: (res) => {
          $('#detailStudentModal #identification_number').val(res.data.identification_number);
          $('#detailStudentModal #name').val(res.data.name);
          $('#detailStudentModal #program_study_id').val(res.data.program_study.name);
          $('#detailStudentModal #school_class_id').val(res.data.school_class.name);
          $('#detailStudentModal #email').val(res.data.email);
          $('#detailStudentModal #phone_number').val(res.data.phone_number);
        },
        error: (err) => {
          Swal.fire(
            'Error',
            'Terjadi kesalahan, lapor kepada administrator!',
            'error'
          );

          $('#detailStudentModal').on('shown.bs.modal', () => {
            $('#detailStudentModal').modal('hide');
          });
        }
      });
    });

    $('#datatable').on('click', '.editStudentButton', function (e) {
      let id = $(this).data('id');
      let showURL = "{{ route('administrator.api.v1.students.show', 'id') }}";
      let updateURL = "{{ route('administrators.students.update', 'id') }}";
      showURL = showURL.replace('id', id);
      updateURL = updateURL.replace('id', id);

      let input = $('#editStudentModal :input').not('[type=hidden]').not('.btn-close').not('.close-button').not('[type=submit]');
      input.not('[type=password]').not('select').val('Sedang mengambil data..');
      input.attr('disabled', true);

      $.ajax({
        url: showURL,
        method: 'GET',
        success: (res) => {
          input.attr('disabled', false);
          $('#editStudentModal #identification_number').val(res.data.identification_number);
          $('#editStudentModal #name').val(res.data.name);
          $('#editStudentModal #program_study_id').val(res.data.program_study.id);
          $('#editStudentModal #school_class_id').val(res.data.school_class.id);
          $('#editStudentModal #email').val(res.data.email);
          $('#editStudentModal #phone_number').val(res.data.phone_number);
          $('#editStudentModal form').attr('action', updateURL);
        },
        error: (err) => {
          Swal.fire(
            'Error',
            'Terjadi kesalahan, lapor kepada administrator!',
            'error'
          );

          $('#editStudentModal').on('shown.bs.modal', () => {
            $('#editStudentModal').modal('hide');
          });
        }
      });
    });
  });
</script>
