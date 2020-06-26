<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Tài khoản</title>
<link rel="stylesheet" type="text/css" href="background.css">
<link rel="stylesheet" type="text/css" href="button.css" >
<script type="text/javascript">
  $(function() {  
  $('.btn-6')
    .on('mouseenter', function(e) {
      var parentOffset = $(this).offset(),
          relX = e.pageX - parentOffset.left,
          relY = e.pageY - parentOffset.top;
      $(this).find('span').css({top:relY, left:relX})
    })
    .on('mouseout', function(e) {
      var parentOffset = $(this).offset(),
          relX = e.pageX - parentOffset.left,
          relY = e.pageY - parentOffset.top;
      $(this).find('span').css({top:relY, left:relX})
    });
  $('[href=#]').click(function(){return false});
});

</script>
</head>
<body>







<div class="wrapper">











  <ul class="bg-bubbles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
  </ul>
<div class="centerer">
  <h1>Just Some More</h1>
  <h1>Button Hover Effects</h1>
  <h4>By: <a href="http://kylebrumm.com" target="_blank">Kyle Brumm</a></h4>

  <div class="wrap">
    <a class="btn-0" href="#">Swipe</a>
    <a class="btn-1" href="#">Diagonal Swipe</a>
    <a class="btn-1-2" href="#">Double Swipe</a>
    <a class="btn-2" href="#">Diagonal Close</a>
    <a class="btn-3" href="#"><span>Zoning In</span></a>
    <a class="btn-4" href="#"><span>4 Corners</span></a>
    <a class="btn-5" href="#">Slice</a>
  </div>
  <div class="wrap">
    <a class="btn-6" href="#">Position Aware<span></span></a>
    <a class="btn-7" href="#"><span>Alternate</span></a>
    <a class="btn-8" href="#">Smoosh</a>
    <a class="btn-9" href="#"><span>Vertical Overlap</span></a>
    <a class="btn-10" href="#"><span>Horizontal Overlap</span></a>
    <a class="btn-11" href="#">Collision</a>
  </div>
</div>







</div>










</body>
</html>