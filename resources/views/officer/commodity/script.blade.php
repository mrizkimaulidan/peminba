<script>
  $(function () {
    $('#createCommodityModal').on('shown.bs.modal', () => {
      $('#createCommodityModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('#editCommodityModal').on('shown.bs.modal', () => {
      $('#editCommodityModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('#datatable').on('click', '.editCommodityButton', function (e) {
      let id = $(this).data('id');
      let showURL = "{{ route('officer.api.v1.commodities.show', 'id') }}";
      let updateURL = "{{ route('officers.commodities.update', 'id') }}";
      showURL = showURL.replace('id', id);
      updateURL = updateURL.replace('id', id);

      let input = $('#editCommodityModal :input').not('[type=hidden]').not('.btn-close').not('.close-button').not('[type=submit]');
      input.val('Sedang mengambil data..');
      input.attr('disabled', true);

      $.ajax({
        url: showURL,
        method: 'GET',
        success: (res) => {
          input.attr('disabled', false);
          $('#editCommodityModal #name').val(res.data.name);
          $('#editCommodityModal form').attr('action', updateURL);
        },
        error: (err) => {
          Swal.fire(
            'Error',
            'Terjadi kesalahan, lapor kepada administrator!',
            'error'
          );

          $('#editCommodityModal').on('shown.bs.modal', () => {
            $('#editCommodityModal').modal('hide');
          });
        }
      });
    });
  });
</script>
