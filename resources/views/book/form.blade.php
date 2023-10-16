@if ($mode == 'Crear')
<h1>{{$mode}} Libros</h1>
@else
    <h1>{{$mode}} libro {{$book->title}}</h1>
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

<!--begin::All to get the title-->
<label for="title" style="width: 100%" class="form-label">Título
    <br><input class="form-control" type="text" name="title" id="title"
               value="{{ isset($book->title)? $book->title:old('title')}}" placeholder="Ej. Caperucita Roja"> </label>
<br>
<!--end::All to get the title-->
<!--begin::All to get the editorial-->
<label for="editorial" style="width: 100%" class="form-label">Editorial
    <br><input class="form-control" type="text" name="editorial" id="editorial"
               value="{{isset($book->editorial)? $book->editorial:old('editorial')}}" placeholder="Ej. Panini"> </label>
<br>
<!--end::All to get the editorial-->
<!--begin::All to get the year_edition-->
<label for="year_edition" style="width: 100%" class="form-label">Año de edición
    <br> <input class="form-control" type="date" name="year_edition" id="year_edition"
                value="{{isset($book->year_edition)? $book->year_edition:old('year_edition')}}"></label><br>
<!--end::All to get the year_edition-->
<!--begin::All to get the isbn-->
<label for="isbn" style="width: 100%" class="form-label">ISBN
    <br><input class="form-control" type="number" name="isbn" id="isbn"
               value="{{isset($book->ISBN)? $book->ISBN:old('isbn')}}" placeholder="Ej. 4578529836"></label><br>
<!--end::All to get the isbn-->
<!--begin::All to get the author-->
<label for="author_id" style="width: 100%" class="form-label">Nombre del autor
    <br><select class="form-select" name="author_id" id="author_id">
        <option value="">-- Seleccione un autor --</option>
        @foreach($authors as $author)
            <option
                value="{{ $author->id }}" {{ isset($book) && $book->author_id == $author->id ? 'selected' : '' }}>
                {{ $author->name }} {{ $author->surname }}
            </option>
    @endforeach
</label><br><br>
<!--end::All to get the author-->
<br><input class="btn btn-success" type="submit" value="{{$mode}} Registro">
<a class="btn btn-primary" href="{{route('books.index')}}">Regresar</a>

