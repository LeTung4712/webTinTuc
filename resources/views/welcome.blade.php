        <form method="post" action="store">
            <textarea name="editor1" id="editor1" class="ckeditor" rows="10" cols="80"></textarea>
            {{ csrf_field()  }}
            <input type="submit" name = "submit" value="Submit">
        </form>

        <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>

        <script>
            ClassicEditor
                .create( document.querySelector( '#editor1' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
