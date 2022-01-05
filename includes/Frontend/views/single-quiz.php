<!-- <style>
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

    .answers .answer {
    background: #f9f9f9;
    padding: 10px;
    margin-bottom: 5px;
    border-bottom: 1px solid #75c41b;
    text-transform: capitalize;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    }
</style>
<section id="singleQuiz" class="section-bottom-gap section-top-gap section-light-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 pb-4 pb-lg-0">
                <?php 

                global $wpdb;
                    // $result = $wpdb->get_results ( "SELECT * FROM {$wpdb->prefix}quizes" );
                    // foreach ( $result as $quiz )   {
                       $image = $wpdb->get_var( "SELECT * FROM {$wpdb->prefix}quizes" );
                      $title = $wpdb->get_var( "SELECT * FROM {$wpdb->prefix}quizes" );
                ?>
                <div class="cover">
                    <img class="img-fluid" src="<?php echo $image->image ?>"
                        alt="">
                </div>
                <div class="title">
                    <h2 class="py-3">
                        <?php echo $title->title ?>
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
</script> -->


<?php
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>

<style>
html,body{
    background:#fff !important;
}
.question-slider-images {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
}

.question {
    width: 50%;
    margin: 30px auto;
}

.answers{
    margin:0;
}

.answers .answer {
    background: #f9f9f9;
    padding: 10px;
    margin-bottom: 5px;
    border-bottom: 1px solid #75c41b;
    text-transform: capitalize;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.d-none{
    display:none;
}

.question-carousel .owl-dots {
    position: absolute;
    top: 0;
    left: 0;
}

.owl-theme .owl-nav.disabled+.owl-dots {
    margin-top: -25px;
}

.text-success {
    color: #38c172 !important;
}

.text-danger {
    color: #e3342f !important;
}

.cover img {
    width: 100% !important;
}

.show{
    display:block !important;
}

.hide{
    display:none !important;
}

.fade:not(.show) {
    opacity: 0;
}


.modal {
    z-index: 1072;
}

.modal {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1050;
    display: none;
    width: 100%;
    height: 100%;
    overflow: hidden;
    outline: 0;
    background: #0000004f;
}

.fade {
    transition: opacity .15s linear;
}
.modal.fade .modal-dialog {
    transition: -webkit-transform .3s ease-out;
    transition: transform .3s ease-out;
    transition: transform .3s ease-out,-webkit-transform .3s ease-out;
    -webkit-transform: translate(0,-50px);
    transform: translate(0,-50px);
}

.modal-dialog {
    position: relative;
    width: auto;
    margin: .5rem;
    pointer-events: none;
}

.modal-dialog-scrollable {
    display: -ms-flexbox;
    display: flex;
    max-height: calc(100% - 1rem);
}

.modal-dialog-centered {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    min-height: calc(100% - 1rem);
}


@media (min-width: 576px){

    .modal-dialog-scrollable {
        max-height: calc(100% - 3.5rem);
    }


    .modal-dialog {
        max-width: 500px;
        margin: 1.75rem auto;
    }
}

.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    outline: 0;
    background: #ffffff;
    border-radius: 7px;
    overflow:hidden;
}

.modal-body {
    position: relative;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
}

button.close {
    width: 25px;
    height: 25px;
    position: absolute;
    right: 0;
    border: none;
    background: red;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    cursor:pointer;
    z-index: 1;
}

.font-ubuntu{
    font-family: Ubuntu;
}

@media only screen and (max-width: 767px){
    .question {
        width: 90%;
        margin: 20px auto;
    }
}
</style>

<div class="quiz-banner-image">
    <img src="https://coconutforlife.org/wp-content/uploads/2021/03/quiz-banner.jpg" />
</div>
<?php 
        
        // $quizId = $_GET['quiz'];
        global $wpdb;
        $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}quizes" );
        $quiz = $wpdb->get_var( "SELECT * FROM {$wpdb->prefix}quizes" );
        
        // $quizURL = "https://quiz.coconutforlife.org/api/quiz-detail/" . $   ;
        // $response = wp_remote_get($quizURL);
        // if(is_array($response)){
        //     $quiz = json_decode($response['body']);             
?>
<?php  //if($uriSegments[1] == 'bn'){ ?>


    <div class="question">
        <div class="cover">
            <img class="img-fluid" src="<?php echo $quiz; ?>" alt="">
        </div>
        <div class="title">
            <h1 class="py-3 font-ubuntu" style="margin-bottom:50px;">
                <?php echo $quiz->quizBn; ?>
            </h1>
        </div>


    
    <div class="owl-carousel owl-theme question-carousel">
        <?php foreach($quiz->questions as $key => $question){ ?>
            <div class="item">
                <div class="question-slider-images">
                <img src="<?php echo $question->thumbnailBn; ?>" alt=""/>
                </div>
                <ul class="answers">
                    <?php foreach($question->answers as $answer){?>
                    <li class="answer d-flex align-items-center justify-content-between font-ubuntu"
                        data-quiz="<?php echo $quiz->quizEn; ?>" data-question="<?php echo $question->id; ?>"
                        data-answer="<?php echo $answer->id; ?> ">
                        <?php echo $answer->answerBn; ?> 
                        <div class="icon">
                            <i class="fas fa-check-circle text-success d-none"></i>
                            <i class="fas fa-times-circle text-danger d-none"></i>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>



<!-- Congrats Modal -->
<div class="modal congrats-modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="congratulations"></div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        let langurls = $('.wpml-ls-link');
        let urlbn = "<?php echo $quiz->urlBn;?>";
        let urlen = "<?php echo $quiz->urlEn;?>";
        $.each(langurls, function(index, langurl){
            console.log($(langurl).attr('href').split("/")[3]);
            if($(langurl).attr('href').split("/")[3] == 'en'){
                $(langurl).attr('href', `https://coconutforlife.org/en/quiz/detail/?quiz=${urlen}`);
            }else if($(langurl).attr('href').split("/")[3] == 'bn'){
                $(langurl).attr('href', `https://coconutforlife.org/bn/quiz/detail/?quiz=${urlbn}`);
            }
        });
    });
</script>


<script>
    $(document).ready(function(){
        let questionSlider = $('.owl-carousel');  
         let rightAnswers = 0;
        let wrongAnswers = 0;
        let slideCount = 0;
        let totalQuestion = "<?php echo count($quiz->questions); ?>";

        $(document).on('click','.answer',function() {
            let questionId = $(this).attr('data-question');
            let _this = this;
            let answerId = $(this).attr('data-answer');
            let url = "https://quiz.coconutforlife.org/api/answer/"+questionId;

            $.ajax({
                type:'POST',
                url:url,
                dataType:'json',
                success:function(data){
                    $.each(data, function(key, answer){
                        if(answer.id === parseInt(answerId) && answer.answer){
                            $(_this).children().children(':first-child').removeClass('d-none');
                            ++rightAnswers;
                        }else if(answer.id === parseInt(answerId) && !answer.answer){
                            ++wrongAnswers;
                            $.each(data, function(key, answer2){
                                $(_this).siblings().each(function() {
                                    if(answer2.answer && answer2.id === parseInt($(this).attr('data-answer'))){
                                        $(this).children().children(':first-child').removeClass('d-none')
                                    }
                                });
                            });
                            $(_this).children().children(':last-child').removeClass('d-none')
                        }
                    })
                    ++slideCount;
                    setTimeout(() => {
                        questionSlider.trigger('next.owl.carousel');
                    }, 1000);
                },
                complete: function(data) {
                    let percentage = (rightAnswers / (rightAnswers + wrongAnswers)) * 100;
                    if(slideCount == parseInt(totalQuestion)){
                        $('.congrats-modal').addClass('show');
                       if(Math.round(percentage) < 60){
                                $('.congratulations').html(`
                            <h3 class="font-ubuntu">You've scored <span class="percentage">${Math.round(percentage)}%</span> on this quiz! Do you want to try again?
Also, don't forget to share this quiz with your friends!</h3>
                            `)
                            }else if(Math.round(percentage) >= 60 && Math.round(percentage) <= 70){
                                $('.congratulations').html(`
                            <h3 class="font-ubuntu">You've scored <span class="percentage">${Math.round(percentage)}%</span> on this quiz! 
Don't forget to share this quiz with your friends!</h3>
                            `)
                            }else if(Math.round(percentage) > 70){
                                $('.congratulations').html(`
                            <h3 class="font-ubuntu">Congratulations! You've scored <span class="percentage">${Math.round(percentage)}%</span> on this quiz! 
Don't forget to share this quiz with your friends!</h3>
                            `)
                            }                    
                    }
                }
            })
        });
        
        $(document).on('click','.close', function(){
            window.location.reload();
        })

        questionSlider.owlCarousel({
            navigation : false,
            loop:false,
            margin:10,
            nav:false,
            mouseDrag:false,
            dots:true,
            autoplay:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })

        $( '.owl-dot' ).on( 'click', function() {
            return false;
        })
    })
</script>
