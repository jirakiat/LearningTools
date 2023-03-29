<script src="{{ asset('assets/template_html/assets/js/app.min.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/js/theme/default.min.js')}}"></script>

<script src="{{ asset('assets/template_html/assets/plugins/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/pwstrength-bootstrap/dist/pwstrength-bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/@danielfarrell/bootstrap-combobox/js/bootstrap-combobox.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/tag-it/js/tag-it.min.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/select2/dist/js/select2.min.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/bootstrap-show-password/dist/bootstrap-show-password.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/plugins/clipboard/dist/clipboard.min.js')}}"></script>
<script src="{{ asset('assets/template_html/assets/js/demo/form-plugins.demo.js')}}"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#show_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function(){
        readURL(this);
    });
        var url = window.location.href;
        $('a[href="'+url+'"]').parent().addClass('active');
        $('.has-sub[href="'+url+'"]').parent().addClass('active');
</script>
