<?php

    get_header();

  
?>
<div style="background:#fff;color:#000;position:absolute;z-index:100;top:50px; width:300px;height:0vh; left:0;overflow-y:auto;">
<?php
    $menu = get_menu_array("dayinthelife-credits");
    $credits = getCreditsArray($menu);
    $assets3D = get3DAssets($credits);
    
?>
</div>

   

<a-scene gltf-model="dracoDecoderPath: assets/draco/;" grab-panels item-grab device-set nomination-link anti-drop
    device-orientation-permission-ui physics="iterations: 30;"
    inspector="https://cdn.jsdelivr.net/gh/aframevr/aframe-inspector@master/dist/aframe-inspector.min.js"
    loading-screen="backgroundColor: #12171a" renderer="colorManagement: true; foveationLevel: 2;"
    background="color: #000000">
    <a-entity tracked-controls="controller: 0; idPrefix: OpenVR"></a-entity>
    <a-entity tracked-controls="controller: 1; idPrefix: OpenVR"></a-entity>
    <a-assets timeout="800000">
        <!-- Loads assets -->
        <?php
            include "webxr/metatraversal/assets.php";
            include "webxr/metatraversal/mixins.php";
        ?>

    </a-assets>
    <a-sky src="#sky" rotation="0 -90 0"></a-sky>

    <?php
            include "webxr/metatraversal/rigging.php";
            include "webxr/metatraversal/lights.php";

?>
<a-entity id="outer-wrap" position="0.05 3.5
 800" rotation="0 0 0" scale="1 1 1" visible="true">
    <a-entity id="credits-wrap" visible="true" scale="2 2 2" 
    position="0 -2 0"
                rotation="0 0 0">

        <?php
        $z_offset = 0;
        foreach($credits as $key => $credit){

             getCredit($credit,$z_offset);
           
            $z_offset = ($z_offset-(30*-1));
        }
        ?>
  
    </a-entity><!-- credits-->


</a-entity><!--Metatraversal-->



  


<?php

     











</a-scene>
<?php
     get_footer();
?>