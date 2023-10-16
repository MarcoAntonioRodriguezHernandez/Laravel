<h1>{{$mode}} Relación</h1>

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
<label for="book_id" style="width: 100%" class="form-label">Libro
    <br><select class="form-select" name="book_id" id="book_id">
        <option value="">-- Seleccione un libro --</option>
        @foreach($books as $book)
            <option
                value="{{ $book->id }}" {{ isset($booksCategories) && $booksCategories->book_id == $book->id ? 'selected' : '' }}>
                {{ $book->title }}
            </option>
    @endforeach
    </select>
</label><br>


<!--begin::All to get the cathegory-->
<label for="category_id" style="width: 100%" class="form-label">Categoría
    <br><select class="form-select" name="category_id" id="category_id">
        <option value="">-- Seleccione una categoría --</option>
        @foreach($categories as $category)
            <option
                value="{{ $category->id }}" {{ isset($booksCategories) && $booksCategories->category == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
    @endforeach
    </select>
</label><br>
<!--end::All to get the cathegory-->
<br><input class="btn btn-success" type="submit" value="{{$mode}} Registro">
<a class="btn btn-primary" href="{{route('booksCategories.index')}}">Regresar</a>

