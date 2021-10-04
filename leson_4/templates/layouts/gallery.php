<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="/css/gallery.css"/>
    <script type="text/javascript" src="/scripts/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="/scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="/scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="/scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen"/>
    <script type="text/javascript">
        $(document).ready(function () {
            $("a.photo").fancybox({
                transitionIn: 'elastic',
                transitionOut: 'elastic',
                speedIn: 500,
                speedOut: 500,
                hideOnOverlayClick: false,
                titlePosition: 'over'
            });
        }); </script>
</head>

<body>
<div id="main">
    <?= $menu ?>
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">

        <?= $content ?>

    </div>
    <h4>Форма для загрузки</h4>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" alt="image">
        <input type="submit" value="Отправить">
    </form>
</div>

</body>
</html>
