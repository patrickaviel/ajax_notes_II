<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Notes II</title>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Fontawesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $.get('/Notes/index_html',function(res){
                $('#notes').html(res);
            });
            $(document).on('submit','form',function(){
                var form = $(this);
                $.post(form.attr('action'), $(this).serialize(), function(res) {
                    $('#notes').html(res);
                });
                return false;
            });
            $(document).on("change","form.update", function() {
                $.post($(this).attr('action'), $(this).serialize(), function(res) {
                    $('#notes').html(res);
                });
                return false;
            });
        });
    </script>
</head>

<body>
    <div class="container-fluid p-4">

        <h1 class="display-4 mb-5">Ajax Notes II</h1>

        <div id="notes" class="row row-cols-1 row-cols-md-2 g-4 mx-auto"></div>

        <form id="create" action="notes/create" method="post" class="container w-25 border-top pt-4">
            <div class="form-floating mb-3">
                <input type="text" name="title" class="form-control" id="title" placeholder="ex.: Python">
                <label for="title">Title</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>
            <input type="submit" value="Add Note" class="btn btn-primary">
        </form>

    </div>
</body>
</html>