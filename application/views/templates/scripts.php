<!-- jQuery -->
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url()?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="<?php echo base_url()?>assets/libs/js/main-js.js"></script>


    <script src="<?php echo base_url()?>assets/vendor/select2/js/select2.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/summernote/js/summernote-bs4.js"></script>
<!-- datepicker-->
<script src="<?php echo base_url()?>assets/vendor/datepicker/moment.js"></script>
<script src="<?php echo base_url()?>assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
<script src="<?php echo base_url()?>assets/vendor/datepicker/datepicker.js"></script>
<!-- Page level plugin JavaScript-->
<!-- Optional JavaScript -->
    <script src="<?php echo base_url()?>assets/vendor/multi-select/js/jquery.multi-select.js"></script>
<!-- Core plugin JavaScript data table-->
<script src="<?php echo base_url()?>assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url()?>assets/js/sb-admin.min.js"></script>

<!-- Page level plugin JavaScript-->
<!-- Demo scripts for this page-->
<script src="<?php echo base_url()?>assets/js/demo/datatables-demo.js"></script>
<script src="<?php echo base_url()?>assets/js/demo/chart-area-demo.js"></script>
<!-- sweetalert-->
<script src="<?php echo base_url()?>assets/vendor/sweetalert/sweetalert.min.js"></script>

<!-- calendar-->
	<script src='<?php echo base_url()?>assets/vendor/full-calendar/js/moment.min.js'></script>
	<script src='<?php echo base_url()?>assets/vendor/full-calendar/js/fullcalendar.js'></script>
	<script src='<?php echo base_url()?>assets/vendor/full-calendar/js/jquery-ui.min.js'></script>
	<script src='<?php echo base_url()?>assets/vendor/full-calendar/js/calendar.js'></script>
<!-- jquery 3.3.1 -->
<!-- bootstap bundle js -->
<!-- slimscroll js -->
<!-- main js -->
<script src="<?php echo base_url()?>assets/vendor/multi-select/js/jquery.multi-select.js"></script>
<!-- jvactormap js -->
        <script src="<?php echo base_url()?>assets/vendor/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendor/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo base_url()?>assets/vendor/jvectormap/jquery-jvectormap-in-mill.js"></script>
        <script src="<?php echo base_url()?>assets/vendor/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
        <script src="<?php echo base_url()?>assets/vendor/jvectormap/jquery-jvectormap-uk-mill-en.js"></script>
        <script src="<?php echo base_url()?>assets/vendor/jvectormap/jquery-jvectormap-au-mill.js"></script>
        <script src="<?php echo base_url()?>assets/libs/js/jvectormap.custom.js"></script>
<!-- chart chartist js -->
<script src="<?php echo base_url()?>assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/charts/chartist-bundle/Chartistjs.js"></script>
<script src="<?php echo base_url()?>assets/vendor/charts/chartist-bundle/chartist-plugin-threshold.js"></script>
<!-- chartjs js -->
<script src="<?php echo base_url()?>assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
<script src="<?php echo base_url()?>assets/vendor/charts/charts-bundle/chartjs.js"></script>
<!-- sparkline js -->
<script src="<?php echo base_url()?>assets/vendor/charts/sparkline/jquery.sparkline.js"></script>

<!-- gauge js -->
<script src="<?php echo base_url()?>assets/vendor/gauge/gauge.min.js"></script>
<!-- morris js -->
<script src="<?php echo base_url()?>assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/charts/morris-bundle/morris.js"></script>
<script src="<?php echo base_url()?>assets/vendor/charts/morris-bundle/morrisjs.html"></script>

<!-- chart c3 js -->
<script src="<?php echo base_url()?>assets/vendor/charts/c3charts/c3.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/charts/c3charts/C3chartjs.js"></script>


<script src="<?php echo base_url()?>assets/libs/js/dashboard-ecommerce.js"></script>
<!---->
<!-- This Page JS -->
    <script src="<?php echo base_url()?>assets/vendor/bootstrap-colorpicker/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap-colorpicker/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap-colorpicker/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap-colorpicker/%40claviska/jquery-minicolors/jquery.minicolors.min.js"></script>


<script src="<?php echo base_url()?>assets/vendor/cropper/dist/cropper.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/cropper/dist/cropper-int.js"></script>
<script src="<?php echo base_url()?>assets/js/moment.min.js"></script>

<script src="<?php echo base_url()?>assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>

<script>
	$(function() {
	  $('input[name="daterange"]').daterangepicker({
	      opens: 'left'
	  }, function(start, end, label) {
	      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
	  });
	});
</script>
    <script>
    $(function(e) {
        "use strict";
        $(".date-inputmask").inputmask("dd/mm/yyyy"),
            $(".phone-inputmask").inputmask("(999) 999-9999"),
            $(".international-inputmask").inputmask("+9(999)999-9999"),
            $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
            $(".purchase-inputmask").inputmask("aaaa 9999-****"),
            $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
            $(".ssn-inputmask").inputmask("999-99-9999"),
            $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
            $(".currency-inputmask").inputmask("$9999"),
            $(".percentage-inputmask").inputmask("99%"),
            $(".decimal-inputmask").inputmask({
                alias: "decimal",
                radixPoint: "."
            }),

            $(".email-inputmask").inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                greedy: !1,
                onBeforePaste: function(n, a) {
                    return (e = e.toLowerCase()).replace("mailto:", "")
                },
                definitions: {
                    "*": {
                        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            })
    });
    </script>
<script>
	$(window).bind("load", function() {
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();
			});
		}, 4000);
	});
</script>
<script>
    $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
            control: $(this).attr('data-control') || 'hue',
            defaultValue: $(this).attr('data-defaultValue') || '',
            format: $(this).attr('data-format') || 'hex',
            keywords: $(this).attr('data-keywords') || '',
            inline: $(this).attr('data-inline') === 'true',
            letterCase: $(this).attr('data-letterCase') || 'lowercase',
            opacity: $(this).attr('data-opacity'),
            position: $(this).attr('data-position') || 'bottom left',
            swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
            change: function(value, opacity) {
                if (!value) return;
                if (opacity) value += ', ' + opacity;
                if (typeof console === 'object') {
                    console.log(value);
                }
            },
            theme: 'bootstrap'
        });

    });
    </script>
		<script>
		    $('#my-select, #pre-selected-options').multiSelect()
		    </script>
		    <script>
		    $('#callbacks').multiSelect({
		        afterSelect: function(values) {
		            alert("Select value: " + values);
		        },
		        afterDeselect: function(values) {
		            alert("Deselect value: " + values);
		        }
		    });
		    </script>
		    <script>
		    $('#keep-order').multiSelect({ keepOrder: true });
		    </script>
		    <script>
		    $('#public-methods').multiSelect();
		    $('#select-all').click(function() {
		        $('#public-methods').multiSelect('select_all');
		        return false;
		    });
		    $('#deselect-all').click(function() {
		        $('#public-methods').multiSelect('deselect_all');
		        return false;
		    });
		    $('#select-100').click(function() {
		        $('#public-methods').multiSelect('select', ['elem_0', 'elem_1'..., 'elem_99']);
		        return false;
		    });
		    $('#deselect-100').click(function() {
		        $('#public-methods').multiSelect('deselect', ['elem_0', 'elem_1'..., 'elem_99']);
		        return false;
		    });
		    $('#refresh').on('click', function() {
		        $('#public-methods').multiSelect('refresh');
		        return false;
		    });
		    $('#add-option').on('click', function() {
		        $('#public-methods').multiSelect('addOption', { value: 42, text: 'test 42', index: 0 });
		        return false;
		    });
		    </script>
		    <script>
		    $('#optgroup').multiSelect({ selectableOptgroup: true });
		    </script>
		    <script>
		    $('#disabled-attribute').multiSelect();
		    </script>
		    <script>
		    $('#custom-headers').multiSelect({
		        selectableHeader: "<div class='custom-header'>Selectable items</div>",
		        selectionHeader: "<div class='custom-header'>Selection items</div>",
		        selectableFooter: "<div class='custom-header'>Selectable footer</div>",
		        selectionFooter: "<div class='custom-header'>Selection footer</div>"
		    });
		    </script>
