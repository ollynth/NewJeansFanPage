var content = [
	'https://www.youtube.com/embed/qyNIxxJ1FWU?si=LNO3ZNgaitXKNRfB',
	'https://www.youtube.com/embed/tjJ-iLDZckw?si=X5Vfm1pl7bEO-V4N',
	'https://www.youtube.com/embed/28fpCU4X_jI?si=24KB9VXRTPOOR9KA'
	];

	var text = [
		"Watch HANNI's amazing performance as he covers the song 'Best Part' by Daniel Caesar & H.E.R. with full emotion and authenticity! 🎤🌟 Listen to her beautiful vocals and simple yet stunning musical accompaniment, as she delivers a personal interpretation that touches the heart. With captivating visuals, this video not only entertains, but also evokes deep feelings and amazes the audience with the beauty of the music!",
		"Witness the thrilling adventure of the NewJeans team in a challenge full of surprises and laughter! 🤣 Amidst the spotlight of fun, they face various games with stakes and punishments that tickle the funny bone! 😆 From amusing challenges to tense moments, every second will entertain and captivate you. Witness the amusing interactions among team members, and feel the positive and enjoyable energy displayed in this video!",
		"Explore the beauty and creativity behind the scenes of the Vogue Korea photo shoot with HYEIN in the video 'Light Jeans' by NewJeans! 📸 Get an exclusive insight into the creative process and professionalism involved in creating stunning images! Join this journey to experience the magic of the world of fashion and unforgettable beauty! 😍"
		];

var i= 0;

$(document).ready(function () {
	$('.slide-dots p').on('click', function () {
        i = $(this).index();
		update();
	});
	
	$('.button').on('click', function () {
		if ($(this).hasClass('next')) {
			i = (i + 1);
		}else {
			i = (i - 1 + content.length)
		}
		i %=content.length;
		update();
    });
	
	function update(){
		$('#iFrame').attr('src', content[i]);
        $('.slide-text p').text(text[i]);
		$('.slide-dots p').css('background-color', 'grey');
        $('.slide-dots p').eq(i).css('background-color', 'white');
	}g
	
	$('.slide-dots p').hover(function () {
		$(this).css('background-color', 'white');
	},function () {
		if ($(this).index() === i) {
			$(this).css('background-color', 'white');
		} else {
			$(this).css('background-color', 'grey');
		}
	});
});