<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="contact-map"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="container">
        <div class="row justify-content-between ">
          <div class="content ">
            <div class="wrap p-0 d-flex justify-content-between flex-wrap ">
              <div class="text col-12 col-lg-6">

                <?php if ($subtitle): ?>
                  <h6 class="label"><?= $subtitle ?></h6>
                <?php endif ?>
                
                <?php if ($title): ?>
                  <h2><?= $title ?></h2>
                <?php endif ?>
                
                <?= $text ?>

                <?php if ($button): ?>
                  <div class="btn-wrap d-flex align-items-center">
                    <a href="<?= $button['url'] ?>" class="btn-default btn-big"<?php if($button['target']) echo ' target="_blank"' ?>><?= html_entity_decode($button['title']) ?></a>
                  </div>
                <?php endif ?>
                
              </div>

              <?php if (!empty($map)): ?>
                <div id="map" class="col-lg-6 col-12">
                  <div class="acf-map">
                    <div class="marker" data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>"></div>
                  </div>
                </div>
              <?php endif ?>

            </div>

          </div>
        </div>
      </div>
    </section>

    <?php if ($args['index'] == 0): ?>
    </div>
  <?php endif ?>

  <style type="text/css">

    .acf-map {
      width: 100%;
      height: 475px;
    }

    .acf-map img {
     max-width: inherit !important;
   }

 </style>

 <script type="text/javascript">

  jQuery(document).ready(function($) {

    function new_map( $el ) {

      var $markers = $el.find('.marker');

      var args = {
        zoom    : 16,
        center    : new google.maps.LatLng(0, 0),
        mapTypeId : google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: true,
      };

      var map = new google.maps.Map( $el[0], args);

      map.markers = [];

      $markers.each(function(){

        add_marker( $(this), map );

      });

      center_map( map );

      return map;

    }

    function add_marker( $marker, map ) {

      var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

      var marker = new google.maps.Marker({
        position  : latlng,
        map     : map
      });

      map.markers.push( marker );

      if( $marker.html() )
      {

        var infowindow = new google.maps.InfoWindow({
          content   : $marker.html()
        });

        google.maps.event.addListener(marker, 'click', function() {

          infowindow.open( map, marker );

        });
      }

    }

    function center_map( map ) {

      var bounds = new google.maps.LatLngBounds();

      $.each( map.markers, function( i, marker ){

        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

        bounds.extend( latlng );

      });

      if( map.markers.length == 1 )
      {
        map.setCenter( bounds.getCenter() );
        map.setZoom( 16 );
      }
      else
      {

        map.fitBounds( bounds );
      }

    }

    var map = null;

    $(document).ready(function(){

      $('.acf-map').each(function(){

        map = new_map( $(this) );

      });

    });
  });

</script>

<?php endif; ?>