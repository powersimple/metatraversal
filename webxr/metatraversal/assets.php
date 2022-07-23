<?php
 $default_skybox = "/wp-content/uploads/2022/05/skeyebox-scaled.jpg";
    $skybox = get_post_meta($post->ID,"skybox",true);
    if(!$skybox){
        $skybox = $default_skybox;
    }


    if(@$assets3D){
        foreach($assets3D as $key => $asset3D){
            ?>



<!-- ASSET <?=$asset3D['slug']?> -->

<a-asset-item id="<?=$asset3D['slug']?>-logo3D" response-type="arraybuffer" src="<?=$asset3D['asset']?>"></a-asset-item>




            <?php
        }
    }



?>
<img id="sky" src="<?=$skybox?>">



