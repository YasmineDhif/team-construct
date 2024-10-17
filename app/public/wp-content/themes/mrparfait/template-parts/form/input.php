<?php
$label = false;
$labelinfo = false;
$type = false;
$value =  false;
$placeholder = false;

if (isset($args["label"])) {
    $label = $args["label"];
}
if (isset($args["labelinfo"])) {
    $labelinfo = '<span>' . $args["labelinfo"] . '</span>';
}
if (isset($args["type"])) {
    $type = 'type="' . $args["type"] . '"';
}
if (isset($args["value"])) {
    $value = 'value="' . $args["value"] . '"';
}
if (isset($args["placeholder"])) {
    $placeholder = 'placeholder="' . $args["placeholder"] . '"';
}

?>

<div>
    <label for="<?= $label ?>"><?= $label ?> <?= $labelinfo ?></label>
    <input <?= $type ?> <?= $value ?> <?= $placeholder ?>>
</div>