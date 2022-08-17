<div>
Name: <input type="text" class="form-control" placeholder="name" name="name"
       autocomplete="off" value="{{ isset($frd) ? $frd->name : null }}">
Описание: <input type="text" class="form-control" placeholder="description" name="description"
       autocomplete="off" value="{{ isset($frd) ? $frd->description : null  }}">
Отображаемое имя: <input type="text" class="form-control" placeholder="display_name" name="display_name"
      autocomplete="off" value="{{ isset($frd) ? $frd->display_name : null  }}">
</div>
