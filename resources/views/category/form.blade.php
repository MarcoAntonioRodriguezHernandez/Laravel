@if ($mode == 'Crear')
    <h1>{{$mode}} Categoria</h1>
@else
    <h1>{{$mode}} categoria {{$category->name}}</h1>
@endif
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error )
                <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif
<!--begin::All to get the category_name-->
<label for="name" style="width: 100%" class="form-label">Nombre de la categoría
    <br><input class="form-control" type="text" name="name" id="name"
               value="{{ isset($category->name)? $category->name:old('category_name')}}"> </label><br>
<!--end::All to get the category_name-->

<br><input class="btn btn-success" type="submit" value="{{$mode}} Registro">
<a class="btn btn-primary" href="{{route('categories.index')}}">Regresar</a>
