    <input {{ $attributes }} type="text" class="form-control datetimepicker-input" id="datetimepicker5" data-toggle="datetimepicker" data-target="#datetimepicker5"
    onchange="this.dispatchEvent(new InputEvent('input'))"
    />

@push('js')
    <script type="text/javascript">
                $(function () {
                    $('#datetimepicker5').datetimepicker({
                        format: 'LT'
                    });
                });
    </script>
@endpush