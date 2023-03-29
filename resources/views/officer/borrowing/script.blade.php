<script>
  $(function() {
    $('#datatable').on('click', '.showBorrowingButton', function (e) {
      let id = $(this).data('id');
      let showURL = "{{ route('api.v1.borrowings.show', 'id') }}";
      showURL = showURL.replace('id', id);

      let input = $('#detailBorrowingModal :input').not('[type=hidden]').not('.btn-close').not('.close-button').not('[type=submit]');
      input.val('Sedang mengambil data..');

      $.ajax({
        url: showURL,
        method: 'GET',
        success: (res) => {
          $('#detailBorrowingModal #student_identification_number').val(res.data.student.identification_number);
          $('#detailBorrowingModal #student_name').val(res.data.student.name);
          $('#detailBorrowingModal #student_phone_number').val(res.data.student.phone_number);
          $('#detailBorrowingModal #program_study_name').val(res.data.student.program_study.name);
          $('#detailBorrowingModal #school_class_name').val(res.data.student.school_class.name);

          $('#detailBorrowingModal #commodity_name').val(res.data.commodity.name);
          $('#detailBorrowingModal #subject_name').val(res.data.subject.name);
          $('#detailBorrowingModal #time_start').val(res.data.time_start);
          $('#detailBorrowingModal #time_end').val(res.data.time_end);
          $('#detailBorrowingModal #is_returned').val(res.data.is_returned ? 'Sudah dikembalikan' : 'Belum dikembalikan');
          $('#detailBorrowingModal #note').val(res.data.note);
        },
        error: (err) => {
          Swal.fire(
            'Error',
            'Terjadi kesalahan, lapor kepada administrator!',
            'error'
          );

          $('#detailBorrowingModal').on('shown.bs.modal', () => {
            $('#detailBorrowingModal').modal('hide');
          });
        }
      });
    });
  });
</script>
