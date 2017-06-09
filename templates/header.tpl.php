<div id="topbox">
	<div class="container">
		<div id="topbox-wrapper" class="row text-white">
			<div class="col-xs-12 col-sm-5 col-md-4">
				<?php 
                //print drupal_render(drupal_get_form('search_block_form'));
                ?>
			</div>
			
			<div class="col-xs-12 col-sm-7 col-md-8">
                  <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed text-white" data-toggle="collapse" data-target="#user-menu-links">
			        Üye ve Aday İşlemleri <span class="fa fa-bars large-text"></span>
			      </button>
			    </div>
			    <div id="user-menu-links" class="navbar-collapse collapse">
	                <ul id="top-menu" class="nav navbar-nav navbar-right">
	                    
	                    <?php
	                        global $user;
	                        $quantity = 0;
	                        $order = commerce_cart_order_load($user->uid);
	                        if ($order) {
	                            $wrapper = entity_metadata_wrapper('commerce_order', $order);
	                            $line_items = $wrapper->commerce_line_items;
	                            $quantity = commerce_line_items_quantity($line_items, commerce_product_line_item_types());
	                            $total = commerce_line_items_total($line_items);
	                            $currency = commerce_currency_load($total['currency_code']);
	                        }
	                        //print format_plural($quantity, '1 item', '@count items');
	                    ?>
	                    <?php if($quantity > 0 || user_is_logged_in()){?>
	                    <li class="dropdown">
	
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-shopping-cart"></i> Sepetim <span class="badge animated bounceIn"><?php print $quantity ?></span> <span class="caret"></span></a>
	                        <ul class="dropdown-menu" role="menu">
	                            <?php if($quantity == 0){?>
	                            <li style="padding: 15px !important;"><span class="muted">Sepetinizde ürün bulunmuyor.</span></li>
	                            <?php } else{?>
	                            <li class="dropdown-header all-caps semi-bold" style="padding: 10px 15px !important;">Sepetimdeki Ürünler </li>
	                            <li class="divider"></li>
	                            <li>
	                                <div id="cart-nav-box" class="p-all-5">
	                                <?php  print views_embed_view('commerce_cart_block', 'block_2'); ?>
	                                </div>
	                                
	                            </li>
	                            <?php } ?>
	                        </ul>
	                    </li>
						<?php } ?>
						
						<li> <a class="" href="<?php print $base_path?>uyelikler" id="user-options" title="Adaylara Özel Üyelik Seçenekleri">Adaylara Özel</a></li>
	                    
	                    <?php if(user_is_logged_in()){?>
	                    <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Aday İşlemleri <span class="caret"></span></a>
	                        <ul class="dropdown-menu" role="menu">
	                            <li><a href="<?php print $base_path?>adaylarim"><i class="fa fa-users after"></i>&nbsp;&nbsp;&nbsp;&nbsp;Adaylarım</a></li>
	                            <li class="divider"></li>
	                            <li><a href="<?php print $base_path?>node/add/aday"><i class="fa fa-plus after"></i>&nbsp;&nbsp;&nbsp;&nbsp;Aday Ekle</a></li>
	                            <li class="divider"></li>
	                            <li><a href="<?php print $base_path?>user/<?php print $user->uid?>/orders"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;Siparişlerim</a></li>
	                        </ul>
	                    </li>
	                    
	                    <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="semi-bold"><?php print $user->name?></span> <span class="caret"></span></a>
	                        <ul class="dropdown-menu" role="menu">
	                            <li><a href="<?php print $base_path?>user/<?php print $user->uid?>/edit"><i class="fa fa-gear"></i>&nbsp;&nbsp;&nbsp;&nbsp;Hesap Bilgilerim</a> </li>
	                            <li class="divider"></li>
	                            <li><a href="<?php print $base_path?>user/logout"><i class="fa fa-power-off"></i>&nbsp;&nbsp;&nbsp;&nbsp;Çıkış</a></li>
	                        </ul>
	                    </li>
	                    <?php }else{?>
	                    <li class="input-prepend inside no-boarder hide"> 
	                        <span class="add-on input-focus"><span class="iconset top-search"></span></span>
	                        <input name="" type="text" class="no-boarder " placeholder="Ara..." style="width:150px;">
	                    </li>
	                    <li class="quicklinks"> <a class="" href="<?php print $base_path?>user/register" id="user-options" title="Sitemize uye olun">Üye Ol</a></li>
	                    <li class="quicklinks"> <a class="" href="<?php print $base_path?>user/login" id="user-options" title="Uye girisi yap">Üye Giriş <i class="fa fa-lock after"></i></a></li>
	                    <?php }?>
	                </ul>
                </div>
			</div>
		</div>
	</div>	
</div>



<div id="header" class="navbar navbar-default header" role="navigation">
    <div class="container">
        <div id="header-wrapper" class="row">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu-links">
                    <span class="text-red hidden-xs m-r-10">MENU</span>
                    <span class="fa fa-bars x-large-text m-r-5 m-l-5"></span>
                </button>

                <a class="navbar-brand" href="<?php print $base_path?>" title="Anasayfa">
                    <img src="<?php print $base_path.$directory?>/assets/img/secimin-logo.png" class="logo" alt="" data-src="<?php print $base_path.$directory?>/assets/img/secimin-logo.png" data-src-retina="<?php print $base_path.$directory?>/assets/img/secimin-logo.png" width="200" height="73"/>
                </a>
            </div>
            
            <nav id="main-menu-links" class="navbar-collapse collapse">
                <ul id="main-menu" class="nav navbar-nav navbar-right">
                    <li style="display:none;">
                        <a href="#"><i class="fa fa-users fa-2x color-grey muted"></i><br/>
                            <span class="text-red">TÜM ADAYLAR</span></a>
                    </li>
                    <li>
                        <a href="<?php print $base_path?>partiler" class="first-item" data-toggle="tooltip" data-placement="bottom" title="Partiler ve adayları">
                            <i class="fa fa-flag-o fa-2x color-grey muted"></i><br/>
                            <span class="text-red">PARTİLER</span></a>
                    </li>
                    
                    <li>
                        <a href="<?php print $base_path?>il-secim-bolgeleri" data-toggle="tooltip" data-placement="bottom" title="İllere göre adaylar">
                            <i class="fa fa-map-marker fa-2x color-grey muted"></i><br/>
                            <span class="text-red">ŞEHİRLER</span></a>
                    </li>
                    
                    <li>
                        <a href="<?php print $base_path?>seçim-rehberi/seçim-rehberi" data-toggle="tooltip" data-placement="bottom" title="Seçim haberleri">
                            <i class="fa fa-info-circle fa-2x color-grey muted"></i><br/>
                            <span class="text-red">SEÇİM REHBERİ</span></a>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-comments-o fa-2x color-grey muted"></i><br/>
                            <span class="text-red">SEÇMENİN SESİ</span></a>
                    </li>
                </ul>
            </nav>
        </div>    
    </div>
</div>

<?php if ($messages): ?>
<div id="message-box" class="message-box m-b-15 animated bounce">
    <?php print $messages; ?>
</div>
<?php endif; ?>