
<h2 style="font-size: 30px; color: #262626;">Grafik Monitoring</h2>

<div id="container"></div>

<script src="../asset/plugin/chart/js/highcharts.js"></script>
<script src="../asset/plugin/chart/js/exporting.js"></script>
<script type="text/javascript">
	Highcharts.chart('container', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Data Jumlah Nasabah Tiap RT'
    },
    subtitle: {
        text: 'Source: Bank Sampah Kenanga 09'
    },
    xAxis: {
		
        categories: [
		<?php $query = mysqli_query($conn, "SELECT * FROM nasabah group by rt"); while($row = mysqli_fetch_array($query)){echo $row['rt'].","; } ?>],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Total Setoran'
        },
        labels: {
            formatter: function () {
                return this.value;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ' Rupiah'
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [ {
        name: 'Jumlah Setoran RT',	
        data: [<?php $query = mysqli_query($conn, "SELECT SUM(total) AS total FROM setor LEFT JOIN nasabah ON setor.nin= nasabah.nin where (tanggal_setor)<='".date("Y-11-31")."'  group by nasabah.rt"); while($row = mysqli_fetch_array($query)){echo $row['total'].","; } ?>]
    }]
});
</script>