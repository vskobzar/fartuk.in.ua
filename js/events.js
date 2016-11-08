jQuery(function($) {


						/* INDEX.HTML */

/*Sorting in .up-block*/

	var countE = false, 
		countM = false, 
		countT = false,
		yellowCount = false;

// Модальное окно в PAGE.HTML

$('.but-black').click( function () {
		if (yellowCount == false) {
			yellowCount = true;
			$('.modal-window').css('display','block');
			$('.waiting-call-mod').css('display','block');

			var start = setTimeout(function() {
				$('#yellow-shadow').css('display','block');
			}, 300);
		}
	});

	$('.close-mod').click( function () {
		yellowCount = false;
		$('.thanks-mod').css('display', 'none');
		$('.thanks-mod').css('z-index', '0');
		$('.modal-window').css('display','none');
		
		var end = setTimeout(function() {
				$('#yellow-shadow').css('display','none');
			}, 100);
	});

	// $('.wait-call-but-mod').click( function () {
	// 	$('.thanks-mod').css('z-index', '1100');
	// 	$('.thanks-mod').css('display', 'flex');
	// });

//-------------

	$('#event').click( function () {
		if (countE == false) {
			countE = true;
			/*$('.check-event').css('border-bottom','2px');*/
			$('.check-event').css('height','182px');
			$('.check-event').css('bottom','-184px');
			$('.check-event').css('opacity','1');
			$('.check-event').css('z-index','450');
			$('.arr-event').css('transform','rotate(180deg)');		
		}

		else {
			countE = false;
			/*$('.check-event').css('border-bottom','0');*/
			$('.check-event').css('bottom','-2px');
			$('.check-event').css('height','0');
			$('.check-event').css('opacity','1');
			$('.check-event').css('z-index','-5');
			$('.arr-event').css('transform','rotate(0deg)');
		}
	});

	$('#month').click( function () {
		if (countM == false) {
			countM = true;
			/*$('.check-month').css('border-bottom','2px');*/
			$('.check-month').css('height','182px');
			$('.check-month').css('bottom','-184px');
			$('.check-month').css('opacity','1');
			$('.check-month').css('z-index','450');
			$('.arr-month').css('transform','rotate(180deg)');		
		}

		else {
			countM = false;
			/*$('.check-month').css('border-bottom','0');*/
			$('.check-month').css('bottom','-2px');
			$('.check-month').css('height','0');
			$('.check-month').css('opacity','1');
			$('.check-month').css('z-index','-5');
			$('.arr-month').css('transform','rotate(0deg)');
		}
	});

	$('#theme').click( function () {
		if (countT == false) {
			countT = true;
			/*$('.check-theme').css('border-bottom','2px');*/
			$('.check-theme').css('height','182px');
			$('.check-theme').css('bottom','-184px');
			$('.check-theme').css('opacity','1');
			$('.check-theme').css('z-index','450');
			$('.arr-theme').css('transform','rotate(180deg)');		
		}

		else {
			countT = false;
			/*$('.check-theme').css('border-bottom','0');*/
			$('.check-theme').css('bottom','-2px');
			$('.check-theme').css('height','0');
			$('.check-theme').css('opacity','1');
			$('.check-theme').css('z-index','-5');
			$('.arr-theme').css('transform','rotate(0deg)');
		}
	});

/*Popups in .wrap-content*/

/* 	$('.sub-but').click( function () {
		if (yellowCount == false) {
			yellowCount = true;
			$(this).parent().parent().css('z-index', '600');
			$(this).parent().parent().children('.waiting-call').css('display','flex');

			var start = setTimeout(function() {
				$('#yellow-shadow').css('display','block');
			}, 300);
		}
	}); */

	$('.close').click( function () {
		yellowCount = false;
		$('.thanks').css('display','none');
		$('.waiting-call').css('display','none');
		
		var end = setTimeout(function() {
				$('#yellow-shadow').css('display','none');
			}, 100);
		$(this).parent().parent().css('z-index', '100');
	});


//работа выпадайки и клик или тач по кнопке Записаться
$(".sub-but").click(function(){
		if (yellowCount == false) {
			yellowCount = true;
			$(this).parent().parent().css('z-index', '600');
			$(this).parent().parent().children('.waiting-call').fadeIn(500);

			var start = setTimeout(function() {
				$('#yellow-shadow').css('display','block');
			}, 500);
		}
		return false; 
})

$(".sub-but").on("tap",function(){
  if (yellowCount == false) {
			yellowCount = true;
			$(this).parent().parent().css('z-index', '600');
			$(this).parent().parent().children('.waiting-call').fadeIn(500);

			var start = setTimeout(function() {
				$('#yellow-shadow').css('display','block');
			}, 500);
		}
		return false; 
});
//работа выпадайки и клик или тач по кнопке Записаться

//скрытие стрелок влево и вправо при отсутствии событий
var arr_right = $(".arr-event-right").html();
var arr_left = jQuery.trim($(".arr-event-left").html());
//alert(arr_right);

if(arr_right==''){
	$(".arr-event-right").hide();
}

if(arr_left==''){
	$(".arr-event-left").hide();
}

});



/*Validate phone number in popups inputs*/

var re = /^\d[\d\(\)\ -]{4,14}\d$/,
	numReg = /^[a-zA-Zа-яА-ЯёЁ'][a-zA-Zа-яА-Я-ёЁ']+[a-zA-Zа-яА-ЯёЁ']?$/;


	function validPhone (but) {
    	var	output = "", 
    		phone = $(but).parent().children('.number').val();

    	var	valid = re.test(phone);
    	if (valid) {
    		output = 'Номер телефона введен правильно!';
    		$('.mess').css('color', '#ffffff');
    	}
    	else {
    		output = 'Номер телефона введен неправильно!';
    		$('.mess').css('color', '#d91a26');
    	}
    	$('.mess').html(output);
    	return valid;
	};

	$('.wait-call-but').click(function() {
		var tr = validPhone($(this));
		if (tr) {
			$(this).parent().parent().children('.thanks').css('display','flex');
		}
	});


// .modal-window valid function

	function validPhone_1 (but) {
    	var	output = "", 
    		phone = $(but).parent().children('.number').val();

    	var	valid = re.test(phone);
    	if (valid) {
    		output = 'Номер телефона введен правильно!';
    		$('.mess').css('color', '#ffffff');
    	}
    	else {
    		output = 'Номер телефона введен неправильно!';
    		$('.mess').css('color', '#d91a26');
    	}
    	$('.mess').html(output);
    	return valid;
	};

	$('.wait-call-but-mod').click(function() {
		var tr = validPhone_1($(this));
		if (tr) {
			$('.thanks-mod').css('display','flex');
			$('.thanks-mod').css('z-index', '1100');
		}
	});


						/* PAGE.HTML */

/* .event-slider */



var windoW = function () {
	var vi = $(window).width();
  	if ( vi <= 920) {
  		return 1;
  	}
  	else if ( vi >= 1120) {
  		return 3;
  	}
  	else if ( vi <= 1120) {
  		return 2;
  	}
  };


$('.center').slick({
  centerMode: true,
  centerPadding: '200px',
  slidesToShow: windoW(),
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});

var v = $(window).width();

if (v < 770) {
	$('.center').slick('unslick');
}

/*$('.multiple-items').slick({
  infinite: true,
  slidesToShow: 5,
  slidesToScroll: 3
});*/


/* Show more foto in .event-past */

	$("#show-past").click(function(){

		var vi = $(window).width();
  		if ( vi > 1025) {
			$(".past2").css('display', 'flex');
		}
		else if ( vi < 1025) {
			$(".past2").css('display', 'block');
		}
	});


/* Delete text in Slick-slider buttons */

    $('.slick-prev').html("");
    $('.slick-next').html("");
    $('.slick-arrow').html("");
	
$('.back-to-calendar').click(function(){
	window.location.href ="http://fartuk.in.ua/events";
})



//**Denis's govnocode**//
$(".kind_of_event").each(function(){
	var kind = $(this).val();
	
	switch(kind){
		case 'Курс кондитер':
			$(this).parent().parent().addClass('dish-5'); 
		break;
		case 'Курс кухни мира':
			$(this).parent().parent().addClass('dish-1'); 
		break;		 
		case 'Курс повар-кулинар':
			$(this).parent().parent().addClass('dish-2'); 
		break;	
		case 'Курс европейские десерты':
			$(this).parent().parent().addClass('dish-3'); 
		break;
		case 'Курс юный кулинар':
			$(this).parent().parent().addClass('dish-4'); 
		break;
	}
	
});
//**Denis's govnocode**//



////////// Работа фильтров  //////////
	// переменные фильтров
	var eventCatFilter = $("#event > .check-event > div");
	var eventCatText = $("#event > #event-text");
	var monthButFilter = $("#month > .check-month");
	// переменные блока событий
	var dishBlock = $(".dish");
	var noSimilar = $(".no-similar");
	// выбор категории фильтров
	eventCatFilter.click(function(){
		var activeCatFilter = $(this).children(".ev-txt").text();
		var activeCurs = $(".kind_of_event[value='"+activeCatFilter+"']");
		dishBlock.hide();
		activeCurs.parent().parent().show();
		// если курсов нет то показываем сообщение
		if(activeCurs.length == 0){
			noSimilar.show();
		}
		issetMontCurs(activeCurs);
	});
	// выбор месяца фмльтра
	
	// выбор темы курса
	
	// функция проверки на существования месяцеф фильтра
	function issetMontCurs(activeCurs){
		monthButFilter.addClass("grey-check-default");
		activeCurs.each(function(i){
			
		});
	}
	// функция проверки на существование тем курса
	
////////// Работа фильтров  //////////