$('.search').click(function(e) {
		if ($(e.target).is('#search-button')) {
			if ($('.search').hasClass('active')) {
				$('.search-box').val('');
			}
			$(this).toggleClass('active');
			$('.search-box').focus();
		}
	})


