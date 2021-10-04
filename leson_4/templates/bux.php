<h2>Список файлов</h2>
<?=$message?><br>
<?php foreach ($files as $file):?>
    <a href="/docs/<?=$file?>"><?=$file?></a><br>
<?php endforeach;?>
<br>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file[]" multiple>
    <input type="submit" value="Отправить">
</form>