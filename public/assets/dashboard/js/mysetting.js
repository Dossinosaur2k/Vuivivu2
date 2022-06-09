jQuery(document).ready(function() {
    
    $('#profile-update').on('submit', function (e){
        e.preventDefault();
        if (!$('#profile-update input[name=password]').val()) {
            e.preventDefault();
            $('#profile-update input[name=password]').parent().parent().removeClass('d-none')
        }
        else {
            this.submit();
        }
        
        
    });

    $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-success").slideUp(500);
    });
    $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-danger").slideUp(500);
    });


    $('.custom-file-input').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })

    $('#summernote').summernote()

    // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //       var reader = new FileReader();
      
    //       reader.onload = function (e) {
    //         $('#blah').attr('src', e.target.result).width(150).height(200);
    //       };
      
    //       reader.readAsDataURL(input.files[0]);
    //     }
    //   }

    $('.custom-file-input').on('change', function (e) {

        const [file] = e.target.files 

        console.log(URL.createObjectURL(file))
        if (file) {

            $('.img-upload').attr({
                "src" : URL.createObjectURL(file) 
            }) 
            $('.img-upload').removeClass("d-none")
        }
    })
      
    function myCallback(start, end) {
        $('#dateRange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $('#date_range').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'))
    }
    $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment()],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment(),
        },
        myCallback
        // function (start, end) {
        //   $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        // }, 
        
      )
    $('#btn-reset').on('click', function(){
        $('#date_range').val('')
    })
});