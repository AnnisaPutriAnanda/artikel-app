<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body>
    <div class='container'>
        <form>
                <strong>Title:</strong>
                <input type="text" name="title" placeholder="Title"><br>
                
                <strong>Thumbnail:</strong>
                <input type="file" onchange=displayImage(this) name="thumbnail" placeholder="Thumbnail" enctype="multipart/formdata"><br>
                <img id="selectedImage" style="max-width: 100%; max-height: 300px; margin-top: 20px;"><br>

                <strong>Description:</strong>
                <textarea name="content" id="content" enctype="multipart/formdata"></textarea>


        </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create( document.querySelector( '#content' ),{
    }).catch( error => { 
    });
        
    function displayImage(input) {
            var file = input.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('selectedImage').src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        }
</script>
</body>
</html>
