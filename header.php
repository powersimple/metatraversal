<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/images/icons/favicon.ico" />
<?php wp_head(); 
    $url = wp_upload_dir();
?>
    <link href="<?php echo get_stylesheet_directory_uri();?>/assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    
   
    <link href="<?php echo get_stylesheet_directory_uri();?>/assets/lib/animate.css/animate.css" rel="stylesheet">
    <link rel='stylesheet' id='drawer-css'
        href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' type='text/css'
        media='all' />
    <link href="<?php echo get_stylesheet_directory_uri();?>/assets/lib/flexslider/flexslider.css" rel="stylesheet">

    <!-- Main stylesheet and color file-->
    <link href="<?php echo get_stylesheet_directory_uri();?>/style.css" rel="stylesheet">
<?php 

if(is_front_page()){
  $page_title= '';
} else {
  $page_title = $post->post_title . " | ";
}

  if(strpos($_SERVER['HTTP_HOST'],':3000')){
    $page_title = '🅳🅴🆅 '.$page_title;
  } else if (strpos($_SERVER['HTTP_HOST'],'staging')){
    $page_title = '🆂🆃🅰🅶🅸🅽🅶 '.$page_title;// doesn't work
  }
  wp_head(); 

  ?>





  <?php

  // 
  
    // INCLUDES AFRAME JS TAGES ONLY IF IT IS ENABLED.

  //
  $aframe =    get_post_meta($post->ID,"use_aframe",true);
  if(@$aframe == 1){
    //hacks
    
  }
?>

<script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/donmccurdy/aframe-extras@v6.1.1/dist/aframe-extras.min.js"></script>
    <script src="https://unpkg.com/aframe-event-set-component@5.0.0/dist/aframe-event-set-component.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri();?>/assets/aframe/aframe-physics-system.min.js"></script>
    <script src="https://unpkg.com/aframe-aabb-collider-component@3.1.0/dist/aframe-aabb-collider-component.min.js">
    </script>
    <script src="<?php echo get_stylesheet_directory_uri();?>/assets/aframe/aframe-look-controls.js"></script>


    <script src="https://unpkg.com/super-hands@^3.0.1/dist/super-hands.min.js"></script>
    <script src="https://unpkg.com/aframe-physics-extras@0.1.2/dist/aframe-physics-extras.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/aframe-blink-controls/dist/aframe-blink-controls.min.js"></script>
   
    </script>
    <script src="https://unpkg.com/aframe-troika-text/dist/aframe-troika-text.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri();?>/assets/aframe/msc_basis_transcoder.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri();?>/assets/aframe/full-gltf-model.js"></script>
    <script src="https://unpkg.com/aframe-fps-counter-component/dist/aframe-fps-counter-component.min.js"></script>
    <style>
  .a-enter-ar-button{
            display: none !important;
            
        }       
            <?php
              /// 
              //DISAPPEARS THE HEADER AND FOOTER FOR PURE AFRAME
              //USED IN VIRTUALPRODUCTION
              ///

            if(@$_GET['disappear']==1){
            ?>
              
                    .a-enter-ar-button, .a-enter-vr-button, .toggle-edit, .sidedrawer
                  {
                        display: none !important;
                        
                    } 
                    header, footer {
                        display: none !important;
                        
                    } 

            <?php
              } 
            ?>
    </style>

<?php

  // 
  
    // END AFRAME

  //

?>
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> <!--  -->

    <link rel='stylesheet' id='drawer-css'
        href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' type='text/css'
        media='all' />





    <title><?=$page_title?><?=get_bloginfo('name')?> - <?=bloginfo("description");?></title>
 <script>

if (location.protocol !== 'https:') {
    location.replace(`https:${location.href.substring(location.protocol.length)}`);
}
      // Wordpress PHP variables to render into JS at outset.
      var active_id = <?=$post->ID?>,
      active_object = "<?=$post->post_type?>",
      home_page = <?=get_option( 'page_on_front' )?>,
      site_title = "<?=get_bloginfo('name')?>",
      xr_path = "<?=get_stylesheet_directory_uri()?>/xr/",
      data_path = "<?=get_stylesheet_directory_uri()?>/data/",
      useWheelNav = false,
      uploads_path =  "<?=$url['baseurl']?>/",
      slug = "<?=$post->post_name;?>",
      profile_template = ''//hack
      
      
      var hero_slides = [
          <?php $slides = get_slides($post->ID);
          $slide_version_list = array();
        foreach ($slides as $key => $media_id) {
          $src= wp_get_attachment_image_src( $media_id,"Full");
          //var_dump($src);//var_dump(get_media_data($media_id));
          $media_data = get_media_data($media_id);
        //  var_dump($media_data);
          $versions = getThumbnailVersions($media_id);
          $version_list = array();
          foreach($versions as $v => $version){https://twitter.com/hunicke
              array_push($version_list,"'".$v."'".": '".$version."'");

          }
          array_push($slide_version_list,"{".implode(",",$version_list)."}
          ");
          
        
        // print "<BR>";
          // var_dump($versions);
            extract((array) get_media_data($media_id));
        }
        print implode(",",$slide_version_list);
      
        ?>
         ]
      <?php
      // post specific hacks
     
    
          if(function_exists('icl_object_id')){
              global $sitepress;

        //     print "var languages = ".json_encode(getLanguageList());
            


        
   
   
  

    $thumbnail =getThumbnail(get_post_thumbnail_id($post->ID),"Full");
          }
      ?>
     
  </script>
  <link rel="stylesheet" type="text/css" media="print" href="<?=get_stylesheet_directory_uri()?>/print.css">
</head>



  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" class="<?php echo @$class_bg;?>">


        <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
<header id="header" class="navbar navbar-custom navbar-fixed-top navbar-transparent" role="navigation">
        <div class="container">
         
          <div class="navbar-header">
         
           <div id="logo" class="onpage-navigation"><a  href="/"></a></div>
            
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
         

                   
                  
                  
            </div>
       
        
            <div id="main-menu"></div>
            <div id="social-menu">
      <a href="https://twitter.com/metatraversal" target="_blank"
                class="fa fa-twitter" title="Follow us on Twitter"></a>
        
            <a href="https://www.linkedin.com/company/metatraversal" target="_blank" class="fa fa-linkedin"
                title="Connect with us on LinkedIn" target="_blank"></a>
                <a href="https://www.youtube.com/channel/UCBRnEdbmKvanvN8rtfnzApw/playlists" target="_blank" class="fa fa-youtube"
                title="Please Subscribe to our YouTube Channel" target="_blank"></a>
            <a href="https://discord.gg/yNFUnksfQk" class="fa discord" target="_blank"
                title="Join our community Discord"></a>
        </div>
      </div>  
    
</header>
      



