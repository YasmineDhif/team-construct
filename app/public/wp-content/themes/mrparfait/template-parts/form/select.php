<?php
$label=false;
$labelinfo=false;
$type= false;
$value= false;
$name= false;
$options= array();

if(isset($args["label"])){
    $label=$args["label"];
}

if(isset($args["labelinfo"])){
    $labelinfo = '<span>' . $args["labelinfo"] . '</span>';
}
if (isset($args["value"])) {
    $value = 'value="' . $args["value"] . '"';
}
if (isset($args["name"])) {
    $name = 'name="' . $args["name"] . '"';
}
if (isset($args["options"])) {
    $options = $args["options"];
}

?>



<div>
    <label for="<?= $name ?>"><?= $label ?> <?= $labelinfo ?></label>
    <select <?= $name ?>>
        <?php foreach ($options as $option): ?>
            <option value="<?= $option['value'] ?>" <?php 
            if ($option['selected']) 
            {
            echo 'selected';
            } ?>><?= $option['title'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>