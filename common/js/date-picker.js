$(document).ready(function() {
    $('#dateRangePicker')
        .datepicker({
            format: 'mm/dd/yyyy',
            startDate: '01/01/1900',
            endDate: '12/30/2030'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#dateRangeForm').formValidation('revalidateField', 'date');
        });

    $('#dateRangeForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        min: '01/01/1900',
                        max: '12/30/2030',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
});
