<!DOCTYPE html>
<html lang="es">
@include('layouts.head')

<body>
   
    @include('layouts.header')

    <div class="container">
        <div class="buscador" align="left">
            <select name="categoria" class="form-control select" id="selectCategoria"  onchange="cargarLibros();">
                <option disabled selected>Seleccione una categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria['category_id'] }}">{{ $categoria['name'] }}</option>
                @endforeach
            </select>

        </div>

        
        <div class="row my-5">
            @foreach ($libros as $key => $libro)
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="libro my-3">
                        <a data-toggle="modal" data-target="#exampleModal{{$key}}">
                            <img src="{{ $libro['cover'] }}" class="card-img-top" alt="{{$libro['title']}}"></a>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">{{$libro['title']}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p><strong>Autor: </strong>{{$libro['author']}}</p>
                          <p id="resumen"><strong>Resumen: </strong>{{$libro['content_short']}}.</p>
                          <p><strong>Fecha de publicación: </strong>{{$libro['publisher_date']}}.</p>
                          <p><strong>Páginas: </strong>{{$libro['pages']}}.</p>
                          <p><strong>Lenguaje: </strong>{{$libro['language']}}.</p>
                          <p><strong>Categorías: </strong>
                        
                            @foreach($libro['categories'] as $key => $categoria)
                            @if($libro['categories']==$loop->last)
                            {{$categoria['name']}}.
                            @else
                            {{$categoria['name']}},
                            @endif
                            @endforeach
                        </p>

                        <p><strong>Tags: </strong>
                        
                            @foreach($libro['tags'] as $key => $tag)
                            @if($libro['tags']==$loop->last)
                            {{$tag['name']}}.
                            @else
                            {{$tag['name']}},
                            @endif
                            @endforeach
                        </p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                    </div>
                  </div>
            @endforeach
        </div>

    
    </div>

    @include('layouts.footer')

    @include('layouts.scripts')
</body>

</html>
