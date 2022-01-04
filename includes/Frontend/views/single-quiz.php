<style>
    .congrats-modal .modal-content {
        position: relative;
        text-align: center;
    }

    .congrats-modal .modal-content .close {
        position: absolute;
        top: 0;
        right: 0;
        width: 30px;
        height: 30px;
        background: red;
        color: #ffffff;
        z-index: 2;
    }

    .congrats-modal .modal-content .modal-body {
        padding: 4rem 2rem;
    }

    .congrats-modal .modal-content .modal-body .percentage {
        font-size: 30px;
    }

    .quiz-reference a {
        text-decoration: none;
        color: #000000;
    }

    .quiz-reference a:hover {
        color: #000000;
    }
</style>
<section id="singleQuiz" class="section-bottom-gap section-top-gap section-light-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 pb-4 pb-lg-0">
                <?php 

                //global $wpdb;
                    // $result = $wpdb->get_results ( "SELECT * FROM {$wpdb->prefix}quizes" );
                    // foreach ( $result as $quiz )   {
                       //$image = $wpdb->get_var( "SELECT * FROM {$wpdb->prefix}quizes" );
                      // $title = $wpdb->get_var( "SELECT * FROM {$wpdb->prefix}quizes" );
                ?>
                <div class="cover">
                    <img class="img-fluid" src="https://quiz.coconutforlife.org/storage/images/quiz/thumbnail/1608537184.png"
                        alt="">
                </div>
                <div class="title">
                    <h2 class="py-3">
                        How Beauty-Savvy Are You? Take A Quick Quiz!
                    </h2>
                </div>

                <div class="owl-carousel">
                    <?php
                        //global $wpdb;
                        //$result = $wpdb->get_results ( "SELECT * FROM {$wpdb->prefix}quiz_questions" );
                        //foreach ( $result as $ques )   {
                        ?>
                            <div class="question-sliders">
                                <div>
                                    <img src="https://quiz.coconutforlife.org/storage/images/question/thumbnail/1608537705.png" alt="">
                                </div>
                                <ul class="answers">
                                    <li class="answer d-flex align-items-center justify-content-between"
                                        data-quiz="as" data-question="as"
                                        data-answer="as">assas
                                        <div class="icon">
                                            <i class="fas fa-check-circle text-success d-none"></i>
                                            <i class="fas fa-times-circle text-danger d-none"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        <?php //} ?>
                </div>
                
            </div>
        </div>
</section>

<script>
    jQuery(document).ready(function(){
    jQuery(".owl-carousel").owlCarousel({
        loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:1,
            nav:true,
            loop:false
        }
    }
    });
    });
</script>
