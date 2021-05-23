<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>upload</title>
</head>
<body>
    <h1>Upload .heic file & convert to jpg</h1>
    <form action="{{ url('/proses-upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Upload .Heic File</label>
        <input type="file" name="image" id="image">
        <div class="preview-image"></div>

        <input type="submit" class="btn btn-success" value="Convert" id="btn-submit">
    </form>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('js/heic2any.min.js') }}"></script>
<script>
    $(document).ready(function(){
        var submit = $("#btn-submit");
        var input = $('#image');

        input.on('change', function(e){
            // e.preventDefault();

            // Convert .heic file to jpg
            var fileName = $(input).val();
            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
            var fileNameWithoutExt = fileName.substr(0, fileName.lastIndexOf('.') - 1);

            if(fileNameExt == "heic") {
                var blob = $(input)[0].files[0]; //ev.target.files[0];
                heic2any({
                    blob: blob,
                    toType: "image/jpg",
                }).then(function (resultBlob) {
                    alert("Image .heic Converted to JPG");
                    var url = URL.createObjectURL(resultBlob);  
                    $(".preview-image").css("background-image", "url("+url+")"); //previewing the uploaded picture
                    //adding converted picture to the original <input type="file">
                    let fileInputElement = $(input)[0];
                    let container = new DataTransfer();
                    let file = new File([resultBlob], new Date().getTime() + "_" + fileNameWithoutExt +".jpg",{type:"image/jpeg", lastModified:new Date().getTime()});
                    container.items.add(file);

                    fileInputElement.files = container.files;
                    console.log("added");
                }).catch(function (x) {
                    console.log(x.code);
                    console.log(x.message);
                });
            }


        });

    }); 

</script>