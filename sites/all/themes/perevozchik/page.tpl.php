<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
﻿<html>
<head>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $head; ?>
  <?php print $scripts; ?>
  <?php print $top_script; ?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

<script type="text/javascript">
<!--
jQuery(document).ready(function(){
if ((jQuery.browser.msie == true)&(jQuery.browser.version <=8)) 
{
	var deg2radians = Math.PI * 2 / 360,
		deg = -1;
		rad = deg * deg2radians,
		costheta = Math.cos(rad),
		sintheta = Math.sin(rad);
		
		jQuery('.rotatedBlock').css({
				filter: 'progid:DXImageTransform.Microsoft.Matrix(M11='+costheta+', M12='+(-1)*sintheta+', M21='+sintheta+', M22='+costheta+', SizingMethod="auto expand", enabled=true)'
			});
};
});
-->
</script>



</HEAD>
<body >

<div class="wrapper">

  <div class="header">
<div class="header_main">
    <div class="logo"><a href="/">главная</a></div>
    <div class="slogan"><br><p>ПЕРЕЕЗД «ПОД КЛЮЧ»</p> <p class="text_slogan">Грузоперевозки: Донецк, Донецкая</p><p class="text_slogan">область, Украина, Россия, Крым</p></div>
<div class="contact_top"><?php print $contact_top; ?></div>
     
 <div class="clearing">&nbsp;</div>
  </div></div>
<div class="menugl"><?php print $top_menu; ?></div>
<div class="top">
<div class="shapka"><?php print $shapka; ?></div>
<div class="banners"><?php print $banners; ?></div>
<div class="razdel"><?php print $column_razdely; ?></div>
</div>



<div class="content_text"> <?php print $messages; ?>
      <?php if ($tabs): ?>
        <div class="tabs">
        <?php print $tabs; ?>
        </div>
      <?php endif; ?>

 <?php print $content; ?>
<div class="push"></div> 
</div>

 <div class="clearing">&nbsp;</div>
<div class="push"></div> 
</div>


</div>

<div class="bottom">
<div class="banners"><?php print $banners_bottom; ?></div>
<div class="razdel"><?php print $column_razdely_bottom; ?></div>
</div>

<div class="footer">
<div class="footer_main">
<div class="bottom_logo"></div>
<div class="bottom_menu"><?php print $bottom_menu; ?></div>
<div class="bottom_contact"><?php print $bottom_contact; ?></div>
<div class="clearing">&nbsp;</div>
</div>
</div>


<!-- Yandex.Metrika counter -->
<script type="text/javascript">
var yaParams = {/*Здесь параметры визита*/};
</script>
 
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter19793812 = new Ya.Metrika({id:19793812,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    trackHash:true,
                    ut:"noindex",params:window.yaParams||{ }});
        } catch(e) { }
    });
 
    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";
 
    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/19793812?ut=noindex" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>

</HTML>
