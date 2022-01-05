
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

<!-- 

<style>
.quiz-wrap {
    display: flex;
    width: 50%;
    margin: 15px auto;
    border: 1px solid #4caf5014;
    margin-bottom: 10px;
    border-radius: 7px;
    overflow: hidden;
    align-items: center;
    transition:all 0.25s linear;
}

.quiz-wrap:hover{
    box-shadow: 1px 1px 10px rgb(0 0 0 / 4%);
    transform:scale(1.02);
}

.quiz-wrap .title{
    font-size: 36px;
    padding: 15px;
    margin: 0;
}

.d-block{
    display:flex;
}

.col-md-6{
    width:50%;
}

@media only screen and (max-width: 767px){
    .quiz-wrap {
        width: 90%;
        flex-direction:column;
    }
    .col-md-6{
        width:100%;
    }
}
</style>

<div class="quiz-banner-image">
    <img src="https://coconutforlife.org/wp-content/uploads/2021/03/quiz-banner.jpg" />
</div>

<?php 
    // $quizURL = 'https://quiz.coconutforlife.org/api/beauty-quiz';
    // $response = wp_remote_get($quizURL);

    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}quizes" );
    // $quiz = $wpdb->get_var( "SELECT * FROM {$wpdb->prefix}quizes" );
    
    // if(is_array($response)){
    //     $quezzes = json_decode($response['body']);
        foreach($results as $quiz){
?>
<?php  if($uriSegments[1]){ ?>
 <div class="row quiz-wrap mb-3">
    <div class="col-md-6 p-lg-0">
        <a href="http://localhost/beatnik/quiz/detail/?quiz=<?php echo $quiz->id;?>" class="d-block">
            <img class="img-fluid" src="<?php echo wp_get_original_image_url( $quiz->image ); ?>" />
        </a>
    </div>
    <div class="col-md-6 align-self-center">
        <a href="http://localhost/beatnik/quiz/detail/?quiz=<?php echo $quiz->id;?>" class="d-block p-3">
            <h2 class="title"><?php echo $quiz->title; ?></h2>
        </a>
    </div>
</div>
<?php }
        }
?> -->