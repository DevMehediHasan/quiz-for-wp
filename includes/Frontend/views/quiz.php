
<style type="text/css">


.align-content{
  width: 100%;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);

}
.position-relative{
  position: relative;
}

.align-content a {
    color: #000000;
    text-decoration: none;
}
</style>

<?php 
global $wpdb;
    $result = $wpdb->get_results ( "SELECT * FROM {$wpdb->prefix}quizes" );
    foreach ( $result as $quiz )   {
      // print_r($quiz);
?>


<div class="card mb-3" style="max-width: 70%;">
  <div class="row g-0">
    <div class="col-md-6">
      <img src="<?php echo wp_get_original_image_url( $quiz->image );  ?>" class="img-fluid">
    </div>
    <div class="col-md-6 position-relative">
      <div class="card-body align align-content">
       <a href="<?php echo BT_QUIZ_URL . '/includes/Frontend/views/single-quiz.php?id= '.$quiz->id.' '; ?>"><h2 class="card-title"><?php echo $quiz->title;?></h2> </a>
      </div>
    </div>
  </div>
</div>

<?php } ?>

