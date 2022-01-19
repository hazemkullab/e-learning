<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container my-5">
        <div class="row">
            <div class="col-6">
                Form
            </div>
            <div class="col-6">
                <div id="post_data">

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$(function() {
    var content = '<ul class="list-group">';
    $.get({
        // url: 'https://jsonplaceholder.typicode.com/posts',
        url: 'http://127.0.0.1:8000/api/categories',
        success: function(res) {
            // console.log(res.data);
            res.data.forEach(e => {
                var name = JSON.parse(e.name);
                // console.log(name.en);
                content += '<li class="list-group-item">'+name.en+'</li>';
            });
            // $.each(res, function(key, post) {
            //     // console.log(post.title);
            //     content += '<li class="list-group-item">'+post.title+'</li>';
            // });
            content += '</ul>';
            $('#post_data').html(content);
        }
    })
})

</script>

    {{-- <ul class="list-group">
  <li class="list-group-item">An item</li>
  <li class="list-group-item">A second item</li>
  <li class="list-group-item">A third item</li>
  <li class="list-group-item">A fourth item</li>
  <li class="list-group-item">And a fifth one</li>
</ul> --}}


  </body>
</html>
