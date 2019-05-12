</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>

<!-- datatable -->
<script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<!-- Custom Script -->
<script src="<?= base_url('assets/user/admin/master_data.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script type="text/javascript">
    $(function(){
        // Format mata uang.
        $( '.uang' ).mask('000.000.000', {reverse: true});

    })
</script>

<!-- Select2 -->
<script src="<?= base_url('assets/bower_components/select2/dist/js/select2.full.min.js')?>"></script>
<!-- InputMask Phone -->
<script src="<?= base_url('assets/plugins/new-inputmask/js/jquery.inputmask.bundle.min.js')?>"></script>
<script src="<?= base_url('assets/plugins/new-inputmask/js/jquery.inputmask-multi.js')?>"></script>

<!-- Morris.js charts -->
<script src="<?= base_url('assets/bower_components/raphael/raphael.min.js')?>"></script>
<script src="<?= base_url('assets/bower_components/morris.js/morris.min.js')?>"></script>
<!-- Input Mask -->
<script src="<?= base_url('assets/plugins/mask-plugin/dist/jquery.mask.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
<!-- jvectormap -->
<script src="<?= base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="<?= base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/bower_components/moment/min/moment.min.js')?>"></script>
<script src="<?= base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<!-- datepicker -->
<script src="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
<!-- Slimscroll -->
<script src="<?= base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/dist/js/demo.js')?>"></script>

<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
    //Initialize Select2 Elements
    $('.select2').select2()
    // $('[data-mask]').inputmask('9999')
  })
</script>
<script>
	var maskList = $.masksSort($.masksLoad("assets/plugins/new-inputmask/data/phone-codes.json"), ['#'], /[0-9]|#/, "mask");
	var maskOpts = {
			inputmask: {
					definitions: {
							'#': {
									validator: "[0-9]",
									cardinality: 1
							}
					},
					showMaskOnHover: false,
					autoUnmask: true,
					clearMaskOnLostFocus: false
			},
			match: /[0-9]/,
			replace: '#',
			list: maskList,
			listKey: "mask",
			onMaskChange: function(maskObj, determined) {
					if (determined) {
							var hint = maskObj.name_en;
							if (maskObj.desc_en && maskObj.desc_en != "") {
									hint += " (" + maskObj.desc_en + ")";
							}
							$("#descr").html(hint);
					} else {
							$("#descr").html(" <small>Diawali kode negara</small>");
					}
			}
	};

	$('#phone_mask').change(function() {
			if ($('#phone_mask').is(':checked')) {
					$('#customer_phone').inputmask("remove");
					$('#customer_phone').inputmasks(maskOpts);
			} else {
					$('#customer_phone').inputmasks("remove");
					$('#customer_phone').inputmask("+#{*}", maskOpts.inputmask);
					$("#descr").html(" <small>Diawali kode negara</small>");
			}
	});
	$('#phone_mask').change();
</script>
</body>
</html>
