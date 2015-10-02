/**
 * make all columns in a row have equal height
 * @return {[type]} [description]
 */
var makeEqualHeightColumns = function() {
	/* Set equal height for all columns in a row */
	var cols = $('.row-eq-height').children();
	var maxHeight = 0;
	$.each(cols, function() {
		if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
	});

	$.each(cols, function() {
		$this = $(this);
		$child = $this.find('.card');
		$child.css('height', maxHeight + 'px');
	});
}

var initializeMiniCalendar = function() {
	$('#miniCalendar').datepicker();
}

var initializeActivityList = function() {
	var el = $('.activity-list');
	var sidebarHeight = $('.sidebar').height();
	var calHeight = $('.mini-calendar').height();
	var h = sidebarHeight - calHeight;
	el.height(h);
	el.css('max-height', h + 'px');
}


$(function () {
	$('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function() {	    	
	makeEqualHeightColumns();
	initializeMiniCalendar();
	initializeActivityList();
});

/* Toggle the Mini Calendar */
var isMiniCalShown = true;

$('#collapseCalendar').click(function() {
	$this = $(this);
	$('#miniCalendar').slideToggle();
	if(isMiniCalShown) {
		$this.children().removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
		isMiniCalShown = false;
	} else {
		$this.children().removeClass('glyphicon-cahevron-up').addClass('glyphicon-chevron-down');
		isMiniCalShown = true;
	}
});

$(window).resize(function() {
	initializeActivityList();
});

/* Tooltip for day in mini calendar */
$('.ui-state-default').on('hover', function() {
	$(this).attr('title', 'Ngày đẹp trời');
});

$('.popoverable').click(function() {
	$this = $(this);
	var popover = $($this.attr('data-popover'));

});

var displayPopoverForm = function(caller) {
	$this = $(caller.attr('data-popover'));
	$this.show();
}

/**
 * Handle activated event of popoverable
 */

$('.popoverable').click(function() {
	$this = $(this);
	var popover = $($this.attr('data-popover'));
	var top = $this.offset().top;
	top += ($this.height()+14);
	var left = $this.offset().left;
	var right = $(window).width() - ($this.offset().left + $this.outerWidth());
	popover.toggle();
	$(popover).css({
		position: 'absolute',
		top: top+'px',
		right: right+'px',
		display: 'block'
	});
});