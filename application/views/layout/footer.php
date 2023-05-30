<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/')?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/')?>dist/js/demo.js"></script>
<script>
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
</script>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
<script src="<?=base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url('assets/')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/')?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
</script>
<script src="<?=base_url('assets/')?>dist/js/demo.js"></script>
<script src="<?=base_url('assets/')?>/dist/js/sweetalert.min.js"></script>
<script src="<?=base_url('assets/')?>/dist/js/sweetalert2.all.min.js"></script>
<script>
$(document).ready(function() {
    p = $('#bb').val()
    var dob = new Date(p);
    var today = new Date()
    var tgl_aw = moment(dob)
    var tgl_ak = moment(today)
    var numYears, numMonths, numDays;

    numYears = tgl_ak.diff(tgl_aw, 'years');
    tgl_aw = tgl_aw.add(numYears, 'years');
    numMonths = tgl_ak.diff(tgl_aw, 'months');
    tgl_aw = tgl_aw.add(numMonths, 'months');
    numDays = tgl_ak.diff(tgl_aw, 'days');


    if (numYears == 0 && numMonths == 0) {
        if (numDays == 0) {
            var hasil = '1 Hari'
        } else {
            var hasil = numDays + ' Hari'
        }
    } else if (numYears == 0 && numMonths != 0) {
        if (numDays == 0) {
            var hasil = numMonths + ' Bulan'
        } else {
            var hasil = numMonths + ' Bulan, ' + numDays + ' Hari'
        }
    } else if (numYears != 0) {
        if (numMonths == 0 && numDays == 0) {
            var hasil = numYears + ' Tahun';
        } else if (numMonths != 0 && numDays == 0) {
            var hasil = numYears + ' Tahun, ' + numMonths + ' Bulan'
        } else if (numMonths == 0 && numDays != 0) {
            var hasil = numYears + ' Tahun, ' + numDays + ' Hari'
        } else if (numMonths != 0 && numDays != 0) {
            var hasil = numYears + ' Tahun, ' + numMonths + ' Bulan, ' + numDays + ' Hari'
        }
    }
    temp_html = `<p class="text-muted">${hasil}  </p>`;
    $('.masa_kerja').append(temp_html)
});






// p = $('#bb').val()
// var dob = new Date(p);
// var today = new Date();
// var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
// // $('#umur').val(age + ' Tahun');
// temp_html = `<p class="text-muted">${age} Tahun </p>`;
// $('.masa_kerja').append(temp_html)
// console.log(age)
// });
</script>

<?php if ($user['role'] == 'User') { 
$awal = date_create($user['masa_kerja']);
$akhir = date_create(); // waktu sekarang
$diff = date_diff( $awal, $akhir );
 } ?>
<script>
console.log('<?php $akhir?>. k')
</script>
<?php if ($user['role'] == 'User') { ?>
<?php 
// $date1 = $user['tgl_akhir']; 
// $end = date('Y-m-d', strtotime('+2 years'));
$date = strtotime($user['tgl_akhir']);
$newdate = date('Y-m-d',strtotime("+2 year",$date));
$newdate1 = date('Y-m-d',strtotime("+2 year, -1 days",$date));
$newdate12 = date('Y-m-d',strtotime("+2 year, -2 days",$date));
$end=date('Y-m-d');
// echo $end;
// echo $newdate;
// echo $newdate1;
if ($end == $newdate || $end == $newdate1|| $end == $newdate12) {?>
<script>
Swal.fire({
    title: 'selamat KGB, Segara Urus Berkasmu!!',
    text: 'Jangan Lupa Traktir TEMEN ya🤩',
    width: 600,
    padding: '3em',
    color: '#716add',
    background: '#fff url(<?=base_url('assets/')?>img/bg.jpg)',
    backdrop: `
    rgba(0,0,123,0.4)
    url("<?=base_url('assets/')?>img/nyan-cat.gif")
    left top
    no-repeat
  `
})
</script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
<?php } ?>
<?php } ?>

</body>

</html>