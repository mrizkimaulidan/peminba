<script src="{{ asset('extensions/apexcharts/apexcharts.min.js') }}"></script>

<script>
  $(function () {
    let url = "{{ route('api.v1.borrowings.chart.this-year') }}";

    $.ajax({
      url: url,
      success: function (res) {
        let chart = initChart(res);

        chart.render();
      }
    });

    function initChart(data) {
      let borrowingsThisYear = {
        chart: {
          type: "bar",
          height: 300
        },
        series: [{
          name: "Peminjaman",
          data: [
            data.data.jan,
            data.data.feb,
            data.data.mar,
            data.data.apr,
            data.data.mei,
            data.data.jun,
            data.data.jul,
            data.data.agu,
            data.data.sep,
            data.data.okt,
            data.data.nov,
            data.data.des,
          ],
        }],
        colors: "#435ebe",
        xaxis: {
          categories: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "Mei",
            "Jun",
            "Jul",
            "Agu",
            "Sep",
            "Okt",
            "Nov",
            "Des",
          ],
        },
      }

      let chart = new ApexCharts(
        document.querySelector("#chart-borrowings-this-year"),
        borrowingsThisYear
      );

      return chart;
    }
  });
</script>
