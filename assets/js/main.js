function typeWriter(text, n) {
    if (n < (text.length)) {
      $('.pintro2').html(text.substring(0, n+1));
      n++;
      setTimeout(function() {
        typeWriter(text, n)
      }, 150);
    }
  }
  
  var text = $('.pintro2').data('text');
  
  typeWriter(text, 0);
