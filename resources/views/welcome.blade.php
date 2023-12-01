<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>

    
    </head>
    <body class="antialiased">
        <form>
            <textarea name="editor1" id="editor1" class="ckeditor" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor 4.
            </textarea>
            
        </form>
    </body>
</html>
