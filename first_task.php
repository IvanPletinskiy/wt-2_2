<!--TODO
    1. форма с текстом + каждое третье слово в верхний регистр, каждую 3 букву фиолетовой, посчитать кол-во о и О.
-->
<?php
$selected_link_index = -1;
if (isset($_GET["selected"])) {
    $selected_link_index = (int)htmlspecialchars($_GET["selected"]);
} else {
    $selected_link_index = -1;
}

function build_link_div(int $is_selected, string $href, string $text)
{
    if ($is_selected)
        $class_name = "selected_link";
    else {
        $class_name = "normal_link";
    }
    return '<div>
        <a class="' . $class_name . '" href="' . $href . '">' . $text . '</a>
    </div>';
}

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/wt-2/styles.css">
    <meta charset="UTF-8">
    <title>WT-2</title>
</head>
<body>
<div>' . build_link_div(0 == $selected_link_index, "/wt-2/first_task.php/?selected=0", "О компании") .
    build_link_div(1 == $selected_link_index, "/wt-2/first_task.php/?selected=1", "Услуги") .
    build_link_div(2 == $selected_link_index, "/wt-2/first_task.php/?selected=2", "Прайс") .
    build_link_div(3 == $selected_link_index, "/wt-2/first_task.php/?selected=3", "Контакты") .
    '</div>
</body>
</html>';
?>