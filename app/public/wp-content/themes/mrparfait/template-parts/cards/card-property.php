
<?php
$field= get_fields(19);
var2console($field);
$price= get_field('price_vate',19);
$price= number_format($price,0,",",".");
$area= get_field('area',19);
var2console($area);
$bedrooms= get_field('bedrooms',19);
$bathrooms=get_field('bathrooms',19);


$image_id=false;//id de l'image
$description=false;//Chaine de caractère
$title=false;//Chaine de caractère
$price=false;//Nombre sans le signe $
$area=false;//Nombre
$bedrooms=false;//Nombre
$bathrooms=false;//Nombre
$href=false;//URL
$in_wishlist=false;//boolean

$property_id= get_the_ID();
$in_wishlist= false;


if (isset($args["image_id"]))
$image_id =$args["image_id"];

if (isset($args["description"]))
$description =$args["description"];

if (isset($args["title"]))
$title =$args["title"];

if (isset($args["price"])):
$price =$args["price"];
$price=number_format($price,0,',','.');
endif;

if (isset($args["area"]))
$area =$args["area"];

if (isset($args["bedrooms"]))
$bedrooms =$args["bedrooms"];

if (isset($args["bathrooms"]))
$bathrooms =$args["bathrooms"];

if (isset($args["href"]))
$href =$args["href"];

if (isset($args["in_wishlist"]) && $args["in_wishlist"])
$in_wishlist="active";
?>


<?php 

$property_id = $args['property_id'] ?? get_the_ID();
$in_wishlist = false;


    $in_wishlist = in_array($property_id, $_SESSION['wishlist']);

?>

<div class="card">
    <div class="card-img">
        <?php if(!empty($image_id)):?>

    <?php
           echo  wp_get_attachment_image($image_id); 

            ?>
   <?php endif; ?>

   </div>
   <div class="sub-header">
    <div class="header">
            <?php if(!empty($title)):?>
                <h3></h3>
            <?php endif; ?>

            <?php if(!empty($price)):?>
        <p><span><?php echo $price?>$</span> HTVA</p>
        <?php endif; ?>

        </div>

        <div class="list-header">
            <ul>
            <?php if(!empty($area)):?>
               <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg><?php echo $area;?>m2</li>
               <?php endif; ?>
               <?php if(!empty($bedrooms)):?>
               <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M32 32c17.7 0 32 14.3 32 32l0 256 224 0 0-160c0-17.7 14.3-32 32-32l224 0c53 0 96 43 96 96l0 224c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-32-224 0-32 0L64 416l0 32c0 17.7-14.3 32-32 32s-32-14.3-32-32L0 64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg> <?php echo $bedrooms;?>ch</li>
               <?php endif; ?>

               <?php if(!empty($bathrooms)):?>
               <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3c3.5 0 6.9 1.4 9.4 3.9l14.9 14.9C130 91.8 128 101.7 128 112c0 19.9 7.2 38 19.2 52c-5.3 9.2-4 21.1 3.8 29c9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9c-7.9-7.9-19.8-9.1-29-3.8C246 39.2 227.9 32 208 32c-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0C66.6 0 32 34.6 32 77.3L32 256c-17.7 0-32 14.3-32 32s14.3 32 32 32l448 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 256 96 77.3zM32 352l0 16c0 28.4 12.4 54 32 71.6L64 480c0 17.7 14.3 32 32 32s32-14.3 32-32l0-16 256 0 0 16c0 17.7 14.3 32 32 32s32-14.3 32-32l0-40.4c19.6-17.6 32-43.1 32-71.6l0-16L32 352z"/></svg> <?php echo $bathrooms;?>SDB</li> 
               <?php endif; ?>

            </ul>
        </div>
        
    
   </div>
   
<button class="wishlist-button <?php echo $in_wishlist ? 'active' : ''; ?>" data-id="<?php echo $property_id; ?>">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
    </svg>
               </button>
</div>

</div>

