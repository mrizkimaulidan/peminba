<script>
  $(function() {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

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
          $('#detailBorrowingModal #student_identification_number').val(res.data.student.identificationNumber);
          $('#detailBorrowingModal #student_name').val(res.data.student.name);
          $('#detailBorrowingModal #student_phone_number').val(res.data.student.phoneNumber);
          $('#detailBorrowingModal #program_study_name').val(res.data.student.programStudy);
          $('#detailBorrowingModal #school_class_name').val(res.data.student.schoolClass);

          $('#detailBorrowingModal #commodity_name').val(res.data.commodity.name);
          $('#detailBorrowingModal #subject_name').val(res.data.subject.name);
          $('#detailBorrowingModal #time_start').val(res.data.timeStart);
          $('#detailBorrowingModal #time_end').val(res.data.timeEnd);
          $('#detailBorrowingModal #is_returned').val(res.data.isReturned);
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
