jQuery('.content ul li a, #pageContent ul li a').each(function(){
		if (jQuery(this).attr('href').match('.pdf')) {
			jQuery(this).parent().addClass('pdf');
		} else if(jQuery(this).attr('href').match('.xls')) {
			jQuery(this).parent().addClass('xls');
		} else if (jQuery(this).attr('href').match('provo.edu')) {
			jQuery(this).parent().addClass('int');
		} else {
			jQuery(this).parent().addClass('ext');
		}

	});
