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
                @if($Bn)
                <h3 class="font36 hindi-siliguri-medium m-0 pb-3">কুইজ</h3>
                @else
                <h3 class="font36 ubuntu-medium m-0 pb-3">Quiz</h3>
                @endif
                <div class="cover">
                    <img class="img-fluid" src="{{asset("storage/images/quiz/thumbnail")}}/{{$quiz['thumbnail']}}"
                        alt="">
                </div>
                <div class="title">
                    <h1 class="py-3">
                        @if($Bn) কুইজ: {{$quiz['quizBn']}} @else Quiz: {{$quiz['quizEn']}} @endif
                    </h1>
                    <p class="mb-3">@if($Bn) {!!$quiz['shortDescriptionBn']!!} @else {!!$quiz['shortDescriptionEn']!!}
                        @endif</p>
                </div>

                <div class="owl-carousel owl-theme question-carousel">
                    @foreach($quiz['questions'] as $key => $question)
                    <div class="item">
                        @if($Bn)
                        <div class="question-sliders"
                            style="background-image:url('{{asset("storage/images/question/thumbnail_bn")}}/{{$question['thumbnail_bn']}}')">
                            @else
                            <div class="question-sliders"
                                style="background-image:url('{{asset("storage/images/question/thumbnail")}}/{{$question['thumbnail']}}')">
                                @endif
                            </div>
                            <ul class="answers">
                                @foreach($question['answers'] as $answer)
                                <li class="answer d-flex align-items-center justify-content-between"
                                    data-quiz="{{$quiz['quizEn']}}" data-question="{{$question['id']}}"
                                    data-answer="{{$answer['id']}}">
                                    @if($Bn){{$answer['answerBn']}}@else {{$answer['answerEn']}} @endif
                                    <div class="icon">
                                        <i class="fas fa-check-circle text-success d-none"></i>
                                        <i class="fas fa-times-circle text-danger d-none"></i>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>

                    {{-- Share --}}
                    <ul class="share-wrap d-flex align-items-center justify-content-between py-2 my-3">
                        <li class="react-button" data-bn="{{$Bn}}" id="love" data-quizId="{{$quiz['id']}}">
                            <div class="d-flex flex-column flex-lg-row align-items-center align-items-lg-start">
                                <img src="{{asset('images/icon/love.svg')}}" alt="">
                                <div class="d-flex flex-row flex-lg-column align-items-center p-2 ">
                                    @if($Bn)
                                    <h4 class="font21 m-0">লাভ ইট</h4>
                                    <h3 class="font36 bold m-0 ml-2 love">{{banglaNumber($quiz['love'])}}</h3>
                                    @else
                                    <h4 class="font21 m-0">Love It!</h4>
                                    <h3 class="font36 bold m-0 ml-2 love">{{$quiz['love']}}</h3>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="react-button" data-bn="{{$Bn}}" id="useful" data-quizId="{{$quiz['id']}}">
                            <div class="d-flex flex-column flex-lg-row align-items-center align-items-lg-start">
                                <img src="{{asset('images/icon/useful.svg')}}" alt="">
                                <div class="d-flex flex-row flex-lg-column align-items-center p-2 ">
                                    @if($Bn)
                                    <h4 class="font21 m-0">প্রয়োজনীয়</h4>
                                    <h3 class="font36 bold m-0 ml-2 useful">{{banglaNumber($quiz['useful'])}}</h3>
                                    @else
                                    <h4 class="font21 m-0">Useful</h4>
                                    <h3 class="font36 bold m-0 ml-2 useful">{{$quiz['useful']}}</h3>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="react-button" data-bn="{{$Bn}}" id="wow" data-quizId="{{$quiz['id']}}">
                            <div class="d-flex flex-column flex-lg-row align-items-center align-items-lg-start">
                                <img src="{{asset('images/icon/wow.svg')}}" alt="">
                                <div class="d-flex flex-row flex-lg-column align-items-center p-2 ">
                                    @if($Bn)
                                    <h4 class="font21 m-0">ওয়াও</h4>
                                    <h3 class="font36 bold m-0 ml-2 wow">{{banglaNumber($quiz['wow'])}}</h3>
                                    @else
                                    <h4 class="font21 m-0">WOW</h4>
                                    <h3 class="font36 bold m-0 ml-2 wow">{{$quiz['wow']}}</h3>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="post-share share position-relative d-none d-lg-block">
                            <div class="sshare d-flex align-items-center">
                                <i class="fas fa-share-alt p-2"></i>
                                @if($Bn)
                                <span class="d-inline-block p-2">শেয়ার</span>
                                @else
                                <span class="d-inline-block p-2">Share</span>
                                @endif

                                <i class="fas fa-chevron-down p-2"></i>
                            </div>
                            <ul class="position-absolute share-option">
                                <li>
                                    <a target="_blank" class="d-block"
                                        href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}">
                                        <img style="width:24px" src="{{asset('images/icon/facebookCircle.svg')}}"
                                            alt="">
                                        <span class="pl-2">Facebook</span>
                                    </a>
                                </li>
                                <li><a href="https://wa.me/?text={{ URL::current() }}" class="social-button " id=""><img
                                            style="width:24px" src="{{asset('images/icon/whatsapp.svg')}}" alt=""><span
                                            class="pl-2">Whatsapp</span></a></li>

                                <li><a href="https://twitter.com/intent/tweet?url={{ URL::current() }}"
                                        class="social-button " id=""><img style="width:24px"
                                            src="{{asset('images/icon/twitter2.svg')}}" alt=""><span
                                            class="pl-2">Twitter</span></a></li>

                                <li>
                                    <a href="https://pinterest.com/pin/create/link/?url={{ URL::current() }}&media={{asset("storage/images/quiz/thumbnail")}}/{{$quiz['thumbnail']}}&description={{$Bn==1? $quiz['quizBn']: $quiz['quizEn']}}"
                                        class="social-button " id=""><img style="width:24px"
                                            src="{{asset('images/icon/pinterest.svg')}}" alt="">
                                        <span class="pl-2">Pinterest</span>
                                    </a>
                                </li>

                                <li><a href="mailto:?subject={{$Bn==1? $quiz['quizBn']: $quiz['quizEn']}}&amp;body={{ URL::current() }}"
                                        class="social-button " id=""><img style="width:24px"
                                            src="{{asset('images/icon/mail.svg')}}" alt=""><span
                                            class="pl-2">Email</span></a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="share-wrap d-flex  align-items-center justify-content-center py-2 d-lg-none">
                        <li class="post-share share position-relative">
                            <div class="sshare d-flex align-items-center">
                                <i class="fas fa-share-alt p-2"></i>
                                <span class="d-inline-block p-2">Share</span>
                                <i class="fas fa-chevron-down p-2"></i>
                            </div>
                            <ul class="position-absolute share-option">
                                <li>
                                    <a target="_blank" class="d-block"
                                        href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}">
                                        <img style="width:24px" src="{{asset('images/icon/facebookCircle.svg')}}"
                                            alt="">
                                        <span class="pl-2">Facebook</span>
                                    </a>
                                </li>
                                <li><a href="https://wa.me/?text={{ URL::current() }}" class="social-button " id=""><img
                                            style="width:24px" src="{{asset('images/icon/whatsapp.svg')}}" alt=""><span
                                            class="pl-2">Whatsapp</span></a></li>

                                <li><a href="https://twitter.com/intent/tweet?url={{ URL::current() }}"
                                        class="social-button " id=""><img style="width:24px"
                                            src="{{asset('images/icon/twitter2.svg')}}" alt=""><span
                                            class="pl-2">Twitter</span></a></li>

                                <li>
                                    <a href="https://pinterest.com/pin/create/link/?url={{ URL::current() }}&media={{asset("storage/images/quiz/thumbnail")}}/{{$quiz['thumbnail']}}&description={{$Bn==1? $quiz['quizBn']: $quiz['quizEn']}}"
                                        class="social-button " id=""><img style="width:24px"
                                            src="{{asset('images/icon/pinterest.svg')}}" alt="">
                                        <span class="pl-2">Pinterest</span>
                                    </a>
                                </li>

                                <li><a href="mailto:?subject={{$Bn==1? $quiz['quizBn']: $quiz['quizEn']}}&amp;body={{ URL::current() }}"
                                        class="social-button " id=""><img style="width:24px"
                                            src="{{asset('images/icon/mail.svg')}}" alt=""><span
                                            class="pl-2">Email</span></a></li>
                            </ul>
                        </li>
                    </ul>
                    {{-- Share --}}


                    @if($quiz['quizRefrenceBn'] != null || $quiz['quizRefrenceEn'] != null)
                    <div class="my-4 quiz-reference">
                        @if($Bn)
                        <h4>প্রসঙ্গ</h4>
                        <p>{!!$quiz['quizRefrenceBn']!!}</p>
                        @else
                        <h4>Reference</h4>
                        <p>{!!$quiz['quizRefrenceEn']!!}</p>
                        @endif
                    </div>
                    @endif


                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 d-md-none d-lg-block">
                    <div class="populer">
                        @if($Bn)
                        <h3 class="font36 hindi-siliguri-medium m-0 pb-3">সাম্প্রতিক পোস্ট</h3>
                        @else
                        <h3 class="font36 ubuntu-medium m-0 pb-3">Recent Posts</h3>
                        @endif

                        <ul class="items pl-2">
                            @if(count($recentPosts) > 0 )
                            @foreach($recentPosts as $recentPost)
                            <li class="d-flex flex-row-reverse item white-bg-color">
                                @if($recentPost->video != null)
                                <div class="video">
                                    <iframe src="https://www.youtube.com/embed/{{$recentPost->video}}?start=1"
                                        frameBorder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowFullScreen></iframe>
                                </div>
                                @else
                                <div class="thumbnail"
                                    style="background-image:url('{{asset("storage/images/posts/thumbnail/$recentPost->thumbnail")}}')">
                                </div>
                                @endif
                                <div class="info p-3 ">
                                    @if($Bn)
                                    <a href="{{route('singleBlog', [app()->getLocale(), $recentPost->url_bn, Replace($recentPost->slug_bn)])}}"
                                        class="black-text-color">
                                        <h3 class="title font18 hindi-siliguri-bold">{{$recentPost->title_bn}}
                                        </h3>

                                    </a>
                                    @else
                                    <a href="{{route('singleBlog', [app()->getLocale(), $recentPost->url_en, Replace($recentPost->slug_en)])}}"
                                        class="black-text-color">
                                        <h3 class="title font18 ubuntu-bold">{{$recentPost->title_en}}</h3>

                                    </a>
                                    @endif

                                </div>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>


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
                {{-- @if($Bn)
            <h1>দারুণ! আপনি এই কুইজে <span class="percentage">0%</span> স্কোর করেছেন!
                কুইজটি বন্ধুদের সাথে শেয়ার করতে ভুলবেন না।</h1>
            @else
            <h1>Congratulations! You've scored <span class="percentage">0%</span> on this quiz! 
                Don't forget to share this quiz with your friends!</h1>
            @endif --}}
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        const Bn = "{{$Bn}}"
        let questionSlider = $('.owl-carousel');
        let rightAnswers = 0;
        let wrongAnswers = 0;
        let slideCount = 0;
        let totalQuestion = "{{count($quiz['questions'])}}";
        $(document).on('click','.answer',function() {
            let questionId = $(this).attr('data-question');
            let _this = this;
            let answerId = $(this).attr('data-answer');
            let url = "";
            if(Bn == 1){
                url = "{{URL::to('bn/answer')}}/" + questionId
            }else{
                url = "{{URL::to('en/answer')}}/" + questionId
            }
            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
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
                    if(slideCount === parseInt(totalQuestion)){
                        $('.congrats-modal').modal('show');
                        if(Bn == 1){
                            let banglanumbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                            if(Math.round(percentage) < 60){
                                $('.congratulations').html(`
                            <h3>আপনি এই কুইজে <span class="percentage">${Math.round(percentage)}%</span> স্কোর করেছেন! আবার চেষ্টা করতে চান?
এছাড়া, কুইজটি বন্ধুদের সাথে শেয়ার করতে ভুলবেন না।</h3>
                            `)
                            }else if(Math.round(percentage) >= 60 && Math.round(percentage) <= 70){
                                $('.congratulations').html(`
                            <h3>আপনি এই কুইজে <span class="percentage">${Math.round(percentage)}%</span> স্কোর করেছেন!
কুইজটি বন্ধুদের সাথে শেয়ার করতে ভুলবেন না।</h3>
                            `)
                            }else if(Math.round(percentage) > 70){
                                $('.congratulations').html(`
                            <h3>দারুণ! আপনি এই কুইজে <span class="percentage">${Math.round(percentage)}%</span> স্কোর করেছেন!
কুইজটি বন্ধুদের সাথে শেয়ার করতে ভুলবেন না।</h3>
                            `)
                            }


                            $('.percentage').text(function(i, v) {
                                var chars = v.split('');
                                    for (var i = 0; i < chars.length; i++) {
                                    if (/\d/.test(chars[i])) {
                                        chars[i] = banglanumbers[chars[i]];
                                        }
                                    }
                                    return chars.join('');
                            });
                           
                        }else{
                            if(Math.round(percentage) < 60){
                                $('.congratulations').html(`
                            <h3>You've scored <span class="percentage">${Math.round(percentage)}%</span> on this quiz! Do you want to try again?
Also, don't forget to share this quiz with your friends!</h3>
                            `)
                            }else if(Math.round(percentage) >= 60 && Math.round(percentage) <= 70){
                                $('.congratulations').html(`
                            <h3>You've scored <span class="percentage">${Math.round(percentage)}%</span> on this quiz! 
Don't forget to share this quiz with your friends!</h3>
                            `)
                            }else if(Math.round(percentage) > 70){
                                $('.congratulations').html(`
                            <h3>Congratulations! You've scored <span class="percentage">${Math.round(percentage)}%</span> on this quiz! 
Don't forget to share this quiz with your friends!</h3>
                            `)
                            }
                        }
                        
                    }
                }
            })
           
        })

        $('.close').on('click', function(){
            window.location.reload();
        })
     questionSlider.owlCarousel({
        navigation : false,
        loop:false,
        margin:10,
        nav:false,
        mouseDrag:false,
        dots:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
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

<script>
    $(document).ready(function(){
            let btnHit = 1;
            $('.react-button').on('click', function(){
              let lang = $(this).attr('data-bn');
               if(btnHit){
                  $clickedButton = $(this).attr('id');
                  $quizId = $(this).attr('data-quizId');
                  if($clickedButton === 'love'){
                      sendAjaxRequest($quizId, $clickedButton, lang);
                  }else if($clickedButton === 'useful'){
                      sendAjaxRequest($quizId, $clickedButton, lang);
                  }else if($clickedButton === 'wow'){
                      sendAjaxRequest($quizId, $clickedButton, lang);
                  }
               }else{
                 return false;
               }
                btnHit=0;
                
            })

            equalHeight('.related-blogs .card-body .title');
        })

        function sendAjaxRequest(quizId, reaction, lang){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                url:"{{URL::to('quiz-react')}}",
                data:{
                    id:quizId,
                    reaction:reaction,
                    lang: lang
                },
                success: function( data ) {
                    $('.love').text(data.love);
                    $('.useful').text(data.useful);
                    $('.wow').text(data.wow);
                }
            });
        }
</script>