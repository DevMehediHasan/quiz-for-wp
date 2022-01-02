
<style type="text/css">
    .section {
  display: flex;
  flex-direction: row;
  font-family: sans-serif;
  background: #f1f1f1;
  margin-bottom: 20px;
}

.paragraph {
  color: #555;
  display: flex;
  flex-direction: column;
}

.content {
  padding: 30px;
}

.content a {
    text-decoration: none !important;
}

.title {
  font-size: 24px;
  color: #222;
  line-height: 36px;
}
</style>

<?php 
global $wpdb;
    $result = $wpdb->get_results ( "SELECT * FROM {$wpdb->prefix}quizes" );
    foreach ( $result as $quiz )   {
?>


<div class="card mb-3" style="max-width: 100%;">
  <div class="row g-0">
    <div class="col-md-6">
      <img src="<?php echo wp_get_original_image_url( $quiz->image );  ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-6">
      <div class="card-body">
        <h2 class="card-title"><?php echo $quiz->title;?></h2>
      </div>
    </div>
  </div>
</div>

<?php } ?>

