<?php

    get_header();

  
?>

   

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
         
            include "webxr/polys2/mixins.php";
            
        ?>

    </a-assets>
    <a-sky src="#sky"></a-sky>

    <?php
            include "webxr/polys2/rigging.php";
            include "webxr/polys2/lights.php";

?>
<a-entity id="metatraversal" position="0.05 0 -21.2" rotation="0 0 0" scale="1 1 1" visible="true">
    <a-entity id="platform-wrap" visible="true" scale="2 2 2" 
    position="0 -2 0"
                rotation="0 0 0">

                <!--
                <a-image id="12-point" mixin="scale-label" src="/assets/images/bg/12Point2.png"
               
                                                position="0.12 1.145 3.973" scale="14.5 14.5 14.5"  rotation="90 0 0"></a-image>
              <a-image id="6-point" mixin="scale-label" src="/assets/images/bg/6Point.png"
               
                                                position="0.280 1.33 4.344" scale="12 12 12"  rotation="90 30 0"></a-image>-->



            
            <a-entity id="logo-wrap"  animation="property: object3D.rotation.y; to: 360; easing: linear; dur: 24000; loop: true;" position="0 -.75 0">

               
                  
                    <a-entity id="metavrse-logo-model" class="center-obj-zone" static-body
                        full-gltf-model="#metavrse" class="collision" visible="true"
                        scale=".9 .9 .9"
                        position="4.5 1.5 -2.4"
                        rotation="0 300 0"

                        static-body="shape: box;" 
                    
                        ></a-entity>
                </a-entity>


            </a-entity><!-- /inner ring -->



                <!--
                <a-entity id="nav" class="center-obj-zone" static-body
                scale=".6 .6 .6 "
                position="0.124 .8 3.97"
                material="shader: standard; metalness: 0.8;" 
                full-gltf-model="#ring" class="collision" visible="true"></a-entity>-->
    </a-entity><!-- platform-->


    </a-entity><!--Metatraversal-->



  


     





<!--




        <a-entity position="0 -.2  -5.658" id="projector">
            <a-cylinder color="gray" rotation="0 30 0" segments-radial="8" segments-height="1" height="0.15"
                geometry="radius: 0.1"></a-cylinder>
            <a-entity id="holoartproj" visible="false">
                <a-entity mixin="holoprojector"></a-entity>
                <a-entity id="holoartifact" scale="7 7 7" rotation="0 0 0" class="center-obj-zone" static-body
                    position="0 1.25 0" full-gltf-model=""
                    animation="property: object3D.rotation.y; to: 360; easing: linear; dur: 12000; loop: true;"
                    visible="false"></a-entity>
            </a-entity>
        </a-entity>







-->


















</a-scene>
<?php
     get_footer();
?>