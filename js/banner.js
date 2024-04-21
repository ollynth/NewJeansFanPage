var content = [
	'https://www.youtube.com/embed/8pMReO11Ln8?si=omROYc2I_1GWVZt9',
	'https://www.youtube.com/embed/iEr6m_QCtFo?si=teeH1NRrSMJ9QYyN',
	'https://www.youtube.com/embed/GLGk6TGANP8?si=WUDbXeLaBosEhvF9'
	];

var text = [
	"Dive deep into the world of denim magic with NewJeans in the exclusive behind-the-scenes of the [Light Jeans] LEVI'S® 501 CUSTOMIZATION Hero Campaign! 🧢✨ Ever wondered how iconic denim pieces come to life? Join NewJeans on a journey behind the curtain as they unveil the secrets, creativity, and passion that fuel the LEVI'S® 501 CUSTOMIZATION Hero Campaign. 👖",
	"Explore the city of Paris with HAERIN! Follow her fun-filled adventure and surprises as she discovers the beauty of this energetic city. With her unique personality and cheerfulness, HAERIN invites you to see Paris from a different perspective and takes you to places that will surely charm your heart! Don't miss HAERIN first vlog🎬 in Paris: Get ready for an extraordinary journey and discover the beautiful beauty of Paris city with HAERIN!",
	"Ready yourself to witness the enticing performance of NewJeans as they perform their latest song of 'Super Shy' in a stunning Stage Cam footage at Kyunghee University! 🎤🌟 Don't miss out on the exciting and sensational of NewJeans presence!"
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
	}
	
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