<?php
namespace Mehedi\BeatnikQuiz\Frontend;

/**
 * 
 */
class Single
{
	

	function __construct(){
		add_shortcode('single-quizes', [$this, 'render_shortcode']);
	}

	public function render_shortcode( $atts, $content = '') {
		wp_enqueue_script('owl-carousel-script');
		
		wp_enqueue_style('owl-carousel-style');
		

		ob_start();
		include __DIR__ . '/views/single-quiz.php';

		return ob_get_clean();
	}
}