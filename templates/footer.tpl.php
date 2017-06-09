<footer id="footer">
    
    <div class="footer-top">
        <div class="container">
          <div class="row sidebar">
              
            <aside class="col-xs-12 col-sm-6 col-md-3 widget menu">
                <h4 class="block-title color-white">SEÇİM ve ADAYLAR</h4>
                <div class="block-content">
                <?php
                    $block = module_invoke('menu', 'block_view', 'menu-secim-menu');
                    print render($block['content']);
                ?>
                </div>
            </aside>

            <aside class="col-xs-12 col-sm-6 col-md-3 widget menu">
                <h4 class="block-title color-white">ÜYELER</h4>
                <div class="block-content">
                    <ul class="menu">
                    <?php if(user_is_logged_in()){?>
                        <li><a href="<?php print $base_path?>adaylarim">Adaylarım / Üyelik Yükselt</a></li>
                        <li><a href="<?php print $base_path?>node/add/aday">Aday Ekle</a></li>
                        <li><a href="<?php print $base_path?>user/<?php print $user->uid?>/orders">Siparişlerim</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php print $base_path?>user/<?php print $user->uid?>/edit">Hesap Bilgilerim</a> </li>
                        <li><a href="<?php print $base_path?>user/logout">Çıkış</a></li>
                    <?php }else{?>
                        <li> <a class="" href="<?php print $base_path?>user/register" title="Sitemize uye olun">Üye Ol</a></li>
                        <li> <a class="" href="<?php print $base_path?>user/login" title="Uye girisi yap">Üye Giriş</a></li>
                        <li> <a class="semi-bold" href="<?php print $base_path?>"  title="Uye girisi yap">Adaylara Özel Üyelikler</a></li>
                    <?php }?>
                    </ul>
                </div>
            </aside>

            <aside class="col-xs-12 col-sm-6 col-md-3 widget menu">
                <h4 class="block-title color-white"></h4>
                <div class="block-content">
                <?php
                    //$block = module_invoke('menu', 'block_view', 'menu-secim-menu');
                    //print render($block);
                ?>
                </div>
            </aside>
              
            <aside class="col-xs-12 col-sm-6 col-md-3 widget menu">
                <h4 class="block-title color-white">Seçim.in</h4>
                <div class="block-content m-b-20">
                    <ul class="menu">
                        <li> <a class="" href="<?php print $base_path?>" title="Hakkımızda bilgi alın">Hakkımızda</a></li>
                        <li> <a class="semi-bold" href="<?php print $base_path?>" title="Bize ulaşın">Bize Ulaşın</a></li>
                    </ul>
                </div>
                <div class="block-content">
                    <ul class="social-links menu">
                         <li><a href="#"><i class="fa fa-facebook fa-2x"></i></a></li>
                         <li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
                         <li><a href="#"><i class="fa fa-youtube fa-2x"></i></a></li>
                    </ul>
                </div>
            </aside>
              
          </div>
        </div>
  </div>
    
    
  <div class="footer-bottom p-t-10 p-b-10">
    <div class="container">
      <div class="row">
        <div class="copyright col-xs-12 col-sm-4 col-md-5">
		  <p class="x-small-text muted no-margin">Copyright © Secim.in 2015. Tüm hakları saklıdır.<br/>
            Sitedeki tüm görsel ve yazılı içeriklerin izinsiz kullanılması yasaktır.</p>
		</div>
		
        <div class="phone col-xs-6 col-sm-4 col-md-5">
            
        </div>
		
        <div class="col-xs-6 col-sm-4 col-md-2">
          <a href="#" class="up">
			<span class="fa fa-arrow-up"></span>
		  </a>
        </div>
      </div>
    </div>
  </div>
</footer>

<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?2lS0g0hc5RR82LxrjhIX8feIn5gqk4C8';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58142670-1', 'auto');
  ga('send', 'pageview');

</script>