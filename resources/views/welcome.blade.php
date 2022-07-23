<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    </head>
    <body>

        <?php
        $numOfCols = 4;
        $rowCount = 0;
        $bootstrapColWidth = 12 / $numOfCols;
        ?>
        <hr>

        <div style="padding: 10px; background-color:#1C2464">
            <div><h2 style="color: white">BUSCADOR DE LIBROS</h2></div>
        </div>

        <hr>

        <label for="cars">Categorias</label>
        <select name="categorias" id="cars">
            <option>Seleccionar</option>
            @foreach ($categorias as $categoria)
            <option value="{{ $categoria['category_id']}}">{{ $categoria['name'] }}</option>
            @endforeach
        </select>

        <hr>
        <div class="row">

            @foreach ($libros as $libro)
                {{-- <div class="col-md-<?php echo $bootstrapColWidth; ?>"> --}}


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

                <?php
                // $rowCount++;
                // if($rowCount % $numOfCols == 0) echo '</div><div class="row">';?>

            @endforeach

    </body>
</html>
