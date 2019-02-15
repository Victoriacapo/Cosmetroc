//Récupérer le nom du fichier uploader
    $('.input-file').each(function () {
        var $input = $(this),
                $label = $input.next('.js-labelFile'),
                labelVal = $label.html();
        $input.on('change', function (element) {
            var fileName = '';
            if (element.target.value) {
                fileName = element.target.value.split('/').pop();
            }
            fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
        });
    });

    //File Input
    //Afficher un aperçu de l'image
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#photo').change(function () {
        readURL(this);
    });