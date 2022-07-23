<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>

        <div id="render">
            <hr>

            <div style="padding: 10px; background-color:#1C2464">
                <div><h2 style="color: white">BUSCADOR DE LIBROS</h2></div>
            </div>

            <hr>

            <label for="cars">Categorias</label>
            <select name="categorias" id="categorias">
                <option>Seleccionar</option>
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria['category_id']}}" name="categoria" id="categoria">{{ $categoria['name'] }}</option>
                @endforeach
            </select>

            <hr>
            <div class="row">

                @foreach ($libros as $libro)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <img class="card-img-top" src="{{ $libro['cover'] }}" alt="Card image cap">
                            <h3 class="card-title text-success">{{ $libro['title'] }}</h3>
                            <h5 class="card-title text-secondary">{{ $libro['author'] }}</h5>
                            <p class="card-text">{{ $libro['content_short'] }}</p>
                            <p class="card-text"><small class="text-muted">Publisher {{ $libro['publisher_date'] }}</small></p>
                            <p class="card-text"><small class="text-muted">Pages {{ $libro['pages'] }}</small></p>
                            <p class="card-text"><small class="text-muted">Language {{ $libro['language'] }}</small></p>
                            <?php $categorias = '';?>
                            @foreach ($libro['categories'] as $categoria)
                            <?php
                                if ($categorias) $categorias .= ', ';
                                    $categorias .= $categoria['name']; ?>
                            @endforeach
                            <p class="card-text text-info"><small>{{ $categorias }}</small></p>
                            <p class="card-text text-warning"><small>{{ $libro['tags']['0']['name'] }}</small></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </body>
</html>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

<script>
    $('#categorias').change(function(){
        var id_categoria = $(this).find('option:selected').val();
        $.ajax({
          url:'getBookByIdCategorie',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data:{'id_categoria': id_categoria},
          type:'post',
          success: function (response) {
                $("#render").html(response);
          },
          statusCode: {
             404: function() {
                alert('web not found');
             }
          },
          error:function(x,xs,xt){
              //nos dara el error si es que hay alguno
              window.open(JSON.stringify(x));
              //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
          }
       });
    });

</script>
