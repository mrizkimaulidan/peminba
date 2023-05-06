<script>
  $(function () {
    $('#createStudentModal').on('shown.bs.modal', () => {
      $('#createStudentModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('#editStudentModal').on('shown.bs.modal', () => {
      $('#editStudentModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('#datatable').on('click', '.showStudentButton', function (e) {
      let id = $(this).data('id');
      let showURL = "{{ route('api.v1.students.show', 'param') }}";
      showURL = showURL.replace('param', id);

      let input = $('#detailStudentModal :input').not('[type=hidden]').not('.btn-close').not('.close-button').not('[type=submit]');
      input.val('Sedang mengambil data..');

      $.ajax({
        url: showURL,
        method: 'GET',
        success: (res) => {
          $('#detailStudentModal #identification_number').val(res.data.identificationNumber);
          $('#detailStudentModal #name').val(res.data.name);
          $('#detailStudentModal #program_study_id').val(res.data.programStudy.name);
          $('#detailStudentModal #school_class_id').val(res.data.schoolClass.name);
          $('#detailStudentModal #email').val(res.data.email);
          $('#detailStudentModal #phone_number').val(res.data.phoneNumber);
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
      let showURL = "{{ route('api.v1.students.show', 'param') }}";
      let updateURL = "{{ route('administrators.students.update', 'param') }}";
      showURL = showURL.replace('param', id);
      updateURL = updateURL.replace('param', id);

      let input = $('#editStudentModal :input').not('[type=hidden]').not('.btn-close').not('.close-button').not('[type=submit]');
      input.not('[type=password]').not('select').val('Sedang mengambil data..');
      input.attr('disabled', true);

      $.ajax({
        url: showURL,
        method: 'GET',
        success: (res) => {
          input.attr('disabled', false);
          $('#editStudentModal #identification_number').val(res.data.identificationNumber);
          $('#editStudentModal #name').val(res.data.name);
          $('#editStudentModal #program_study_id').val(res.data.programStudy.id);
          $('#editStudentModal #school_class_id').val(res.data.schoolClass.id);
          $('#editStudentModal #email').val(res.data.email);
          $('#editStudentModal #phone_number').val(res.data.phoneNumber);
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
