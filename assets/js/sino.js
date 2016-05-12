$(function(){
		// this will get the full URL at the address bar
		var url = window.location.href; 

		// passes on every "a" tag 
		$("#sidebar-wrapper a").each(function() {
				// checks if its the same on the address bar
			if(url == (this.href)) { 
				$(this).closest("li").addClass("active");
			}
		});
	});
	
	
$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
	
	
$('.rate').each(function() {
  var $this = $(this),
      countTo = $this.attr('data-count');
  
  $({ countNum: $this.text()}).animate({
    countNum: countTo
  },

  {

    duration: 5000,
    easing:'linear',
    step: function() {
      $this.text(Math.floor(this.countNum));
    },
    complete: function() {
      $this.text(this.countNum);
      //alert('finished');
    }

  });  
  
  

});
