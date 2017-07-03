$(document).ready(function() {

    // ----- RESPONSIVE MENU -----

    // When menu button is clicked
    $(".btn-responsive-menu").click(function() {
        $(".menu").slideToggle(100);
    });

    if ($(window).width() <= 880) {
        $(window).bind('scroll', function() {
            var distance = $('header').height();
            if ($(window).scrollTop() > distance) {
                $('header').slideUp(100);
            } else {
                $('header').fadeIn(200);
            }
        });
    }

    // ----- GRIDS -----

    // init Isotope
    // for projects and teching
    var $container = $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
        hiddenStyle: {
      		opacity: 0
	    },
	    visibleStyle: {
	     	opacity: 1
	    }
    });

    // layout Isotope after each image loads
    $container.imagesLoaded().progress(function() {
        $container.isotope('layout');
    });

    // init Isotope
    // for publications
    var $container_pub = $('.publications').isotope({
        itemSelector: '.publication',
        layoutMode: 'fitRows',
        hiddenStyle: {
            opacity: 0
        },
        visibleStyle: {
            opacity: 1
        }
    });

    // layout Isotope after each image loads
    $container_pub.imagesLoaded().progress(function() {
        $container_pub.isotope('layout');
    });

    // bind grids filter button click
    $('#filters').on('click', 'button', function() {
        var filterValue = $(this).attr('data-filter');
        // use filterFn if matches value
        $container.isotope({
            filter: function() {
                if (filterValue == "*") return true;
                // _this_ is the item element
                var categories = $(this).attr('data-category').split(" ");
                return categories.indexOf(filterValue) != -1;
            }
        });

        $container_pub.isotope({
            filter: function() {
                if (filterValue == "*") return true;
                // _this_ is the item element
                var categories = $(this).attr('data-category').split(" ");
                return categories.indexOf(filterValue) != -1;
            }
        });

        if (isMobile()) {
            $('html, body').animate({
                scrollTop: $(".grid").offset().top
            }, 1000);
        }
    });

    // change is-checked class on filter buttons
    $('.button-group').each(function(i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', 'button', function() {
            if (!$(this).hasClass("is-checked")) {
                var $previous_checked = $buttonGroup.find('.is-checked');
                $previous_checked.removeClass('is-checked');
                $(this).addClass('is-checked');
            }
        });
    });

    // ----- TEACHING -----

    $("#preview_slides").click(function() {
        var slide_container = $("#slides_container")
        if (!$.trim(slide_container.html())) {  // if it's empty
            slide_container.append("<hr />");
            slide_container.append('<iframe class="slides" src="/assets/javascript/ViewerJS/?zoom=page-width#' + $("#download_slides").attr('href') + '" allowfullscreen webkitallowfullscreen></iframe>');
            slide_container.slideToggle(500);
            $("#preview_slides").fadeOut(500);
        }
    });

    // ----- PUBLICATIONS -----

    var side_width = 10;

    $('.details').each(function() {
        $(this).css("display", "none");
    	$(this).css("left", (70 + side_width) + "px");
    	$(this).css("right", (-40) + "px");
    });

    $('.publication').each(function() {
        var w = $(this).width();
        var h = $(this).height();
        $(this).css("cursor", "pointer");
        var svg = d3.select(this).insert("svg", ":first-child")
            .attr("width", w)
            .attr("height", h)
            .style("position", "absolute")
            .style("left", "0px")
            .style("top", "0px");
        var t;
        var type = $(this).data("type");
        if (type == "conference") {
            var t = textures.lines().thicker();
        } else if (type == "journal") {
            var t = textures.circles().thicker();
        } else {
            var t = textures.paths()
    					.d("hexagons")
					    .size(6)
					    .strokeWidth(2);
        }
        svg.call(t);
        svg.append("path")
            .attr("class", "slice3")
            .attr("d", "M 0 0 L 0 " + (h-17) + " L -5 " + (h-17) + " L 0 " + (h-13) + " L " + (w-13) + " " + (h-13) + " L " + (w-13) + " 0 Z")
            .attr("transform", "translate(12,12)")
            .attr("stroke", "#EEEEEE")
            .attr("stroke-width", "1")
            .style("fill", "#262626");
        svg.append("path")
            .attr("class", "slice2")
            .attr("d", "M 0 0 L 0 " + (h-17) + " L -5 " + (h-17) + " L 0 " + (h-13) + " L " + (w-13) + " " + (h-13) + " L " + (w-13) + " 0 Z")
            .attr("transform", "translate(8,8)")
            .attr("stroke", "#EEEEEE")
            .attr("stroke-width", "1")
            .style("fill", "#262626");
        svg.append("path")
            .attr("class", "slice1")
            .attr("d", "M 0 0 L 0 " + (h-17) + " L -5 " + (h-17) + " L 0 " + (h-13) + " L " + (w-13) + " " + (h-13) + " L " + (w-13) + " 0 Z")
            .attr("transform", "translate(4,4)")
            .attr("stroke", "#EEEEEE")
            .attr("stroke-width", "1")
            .style("fill", "#262626");
        svg.append("path")
            .attr("class", "box-bkg")
            .attr("d", "M 0 0 L 0 " + (h-13) + " L " + (w-13) + " " + (h-13) + " L " + (w-13) + " 0 Z")
            .style("fill", "#EEEEEE");
        svg.append("path")
            .attr("class", "box")
            .attr("d", "M 0 0 L 0 " + (h-13) + " L " + (w-13) + " " + (h-13) + " L " + (w-13) + " 0 Z")
            .style("fill", t.url());
        svg.append("path")
            .attr("class", "side")
            .attr("stroke", "#EEEEEE")
            .attr("stroke-width", "1")
            .attr("d", "M 0 " + 30 + " L 0 " + (h - 30) + " L " + 0 + " " + (h-13) + " L " + 0 + " 0 Z")
            .style("fill", "#1A1A1A");
    });

    $(".publication").click(function() {
    	$(this).css("cursor", "default");
        var w = $(this).width();
        var h = $(this).height();
        var slice3 = d3.select(this).select(".slice3");
        slice3.transition()
            .duration(200)
            .attr("transform", "translate(0,0)")
            .style("opacity", 0);
        var slice2 = d3.select(this).select(".slice2");
        slice2.transition()
            .duration(200)
            .attr("transform", "translate(0,0)")
            .style("opacity", 0);
        var slice1 = d3.select(this).select(".slice1");
        slice1.transition()
            .duration(200)
            .attr("transform", "translate(0,0)")
            .style("opacity", 0);
        var box = d3.select(this).select(".box");
        box.transition()
            .delay(100)
            .duration(500)
            .attr("d", "M " + side_width + " 0 L "+ side_width + " " + (h-13) + " L " + (20 + side_width) + " " + (h-13 - 30) + " L " + (20 + side_width) + " " + 30 + " Z");
        var box_bkg = d3.select(this).select(".box-bkg");
        box_bkg.transition()
            .delay(100)
            .duration(500)
            .attr("d", "M " + side_width + " 0 L "+ side_width + " " + (h-13) + " L " + (20 + side_width) + " " + (h-13 - 30) + " L " + (20 + side_width) + " " + 30 + " Z");
        var side = d3.select(this).select(".side");
        side.transition()
            .delay(100)
            .duration(500)
            .attr("d", "M 0 0 L 0 " + (h-13) + " L " + side_width + " " + (h-13) + " L " + side_width + " 0 Z");
        var label = d3.select(this).select(".label");
        label.transition()
            .delay(100)
            .duration(200)
            .style("opacity", 0);
        var details = d3.select(this).select(".details");
        details.transition()
        	.style("visibility", "visible")
            .style("display", "block")
        	.delay(300)
            .duration(300)
            .style("left", (30 + side_width) + "px")
            .style("right", 0 + "px")
            .style("opacity", 1);
        var close = d3.select(this).select(".close");
        close.transition()
            .style("visibility", "visible")
            .delay(300)
            .duration(300)
            .style("opacity", 1);
    });

    $(".close").click(function(e) {
        e.stopPropagation();
        var parent = this.parentNode;
        var publication = $(parent);
        publication.css("cursor", "pointer");
        var w = publication.width();
        var h = publication.height();
        var box_bkg = d3.select(parent).select(".box-bkg");
        box_bkg.transition()
            .duration(500)
            .attr("d", "M 0 0 L 0 " + (h-13) + " L " + (w-13) + " " + (h-13) + " L " + (w-13) + " 0 Z");
        var box = d3.select(parent).select(".box");
        box.transition()
            .duration(500)
            .attr("d", "M 0 0 L 0 " + (h-13) + " L " + (w-13) + " " + (h-13) + " L " + (w-13) + " 0 Z");
        var side = d3.select(parent).select(".side");
        side.transition()
            .duration(500)
            .attr("d", "M 0 " + 30 + " L 0 " + (h - 30) + " L " + 0 + " " + (h-13) + " L " + 0 + " 0 Z");
        var label = d3.select(parent).select(".label");
        label.transition()
            .delay(300)
            .duration(200)
            .style("opacity", 1);
        var details = d3.select(parent).select(".details");
        details.transition()
            .duration(300)
            .style("left", (70 + side_width) + "px")
            .style("right", (-40) + "px")
            .style("opacity", 0)
            .each("end", function () {
            	details.style("visibility", "hidden");
                details.style("display", "none");
            });
        var close = d3.select(this);
        close.transition()
            .duration(250)
            .style("opacity", 0)
            .each("end", function () {
                close.style("visibility", "hidden");
            });
        var slice3 = d3.select(parent).select(".slice3");
        slice3.transition()
            .delay(300)
            .duration(200)
            .attr("transform", "translate(12,12)")
            .style("opacity", 1);
        var slice2 = d3.select(parent).select(".slice2");
        slice2.transition()
            .delay(300)
            .duration(200)
            .attr("transform", "translate(8,8)")
            .style("opacity", 1);
        var slice1 = d3.select(parent).select(".slice1");
        slice1.transition()
            .delay(300)
            .duration(200)
            .attr("transform", "translate(4,4)")
            .style("opacity", 1);
    });

    // ----- Code Highlight -----

    $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
      });

    // ----- Blockquoters -----

    $('blockquote p').before("<hr class='bqline' align='center'>");
    $('blockquote p').after("<hr class='bqline' align='center'>");
});

function isMobile() {
  try{ document.createEvent("TouchEvent"); return true; }
  catch(e){ return false; }
}