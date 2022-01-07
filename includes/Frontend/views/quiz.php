<?php
/*
Template Name: Quiz
Template Post Type: post, page, event
*/
?>

<?php
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>



<?php //get_header(); ?>
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
.quiz-banner-image img {
    width: 100%;
}
.quiz-wrap .title{
    font-size: 32px;
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
        <a href="http://beatnik.mehedi/quiz/detail/?quiz=<?php echo $quiz->id;?>" class="d-block">
            <img class="img-fluid" src="<?php echo wp_get_original_image_url( $quiz->image ); ?>" />
        </a>
    </div>
    <div class="col-md-6 align-self-center">
        <a href="http://beatnik.mehedi/quiz/detail/?quiz=<?php echo $quiz->id;?>" class="d-block p-3" style="text-decoration: none;">
            <h2 class="title"><?php echo $quiz->title; ?></h2>
        </a>
    </div>
</div>
<?php }
        }
?>







<!--<section id="quizzesWrap" class="section-bottom-gap section-top-gap section-light-bg">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-8 col-md-8">-->
<!--                <div class="col-lg-12 col-md-12">-->
<!--                    <div id="quizzes"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<?php //get_footer(); ?>

