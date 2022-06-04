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
      
});