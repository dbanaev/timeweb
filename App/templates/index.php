<h1>Поиск</h1>

<div class="alert alert-danger" id="error" style="display: none;"></div>

<div class="alert alert-success" id="success" style="display: none;"></div>

<form id="search-form">
    <div class="form-group">
        <label for="exampleInputEmail1">Url</label>
        <input type="text" class="form-control" id="url" placeholder="Введите url">
    </div>
    <div class="form-group">
        <label for="type">Выберите тип элемента для поиска</label>
        <select class="form-control" id="type" name="type">
            <option value="img">Изображения</option>
            <option value="a">Ссылки</option>
            <option value="text">Текст</option>
        </select>
    </div>
    <div class="form-group" style="display: none;" id="text-group">
        <label for="exampleInputEmail1">Текст</label>
        <input type="text" class="form-control" id="text" placeholder="Введите текст">
    </div>
    <button type="submit" class="btn btn-primary">Поиск</button>
</form>