<nav id="site-navigation" class="navbar navbar-default" role="navigation">
    <div class="navheader">  
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-mobile">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php bloginfo( 'name' ); ?></a>
        </div>
        <!--<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_s' ); ?></a>-->
		<div class="hidden-xs hidden-sm">
        <?php
            wp_nav_menu( array(
                //'menu'              => 'primary',
                'theme_location'    => 'main',
                'depth'             => 4,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse dropnav',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
		</div>
		
		<div class="visible-xs visible-sm">
		<?php
            wp_nav_menu( array(
                'menu'              => 'Mobile Main Menu',
                //'theme_location'    => 'header',
                'depth'             => 4,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse dropnav',
                'container_id'      => 'bs-example-navbar-collapse-mobile',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
		</div>
        <?php
        /*
        wp_nav_menu( array( 
                'theme_location' 	=> 'main',
                'container' 		=> 'div',
                'container_class' 	=> 'collapse navbar-collapse',
                'container_id'    	=> 'main-navbar-collapse',
                'menu_class'      	=> 'nav navbar-nav',
                'menu_id'         	=> '',
                'echo'            	=> true,
                'fallback_cb'     	=> 'wp_page_menu',
                'before'          	=> '',
                'after'           	=> '',
                'link_before'     	=> '',
                'link_after'      	=> '',
                'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           	=> 0,
                'walker'          	=> ''
        ));
        */
        ?>
		<ul class="search_box">
			<a href="#" class="search-icon"><span class="search_icon"> </span></a>
			<form method="get" action="<?php echo site_url(); ?>" id="searchform" class="search-form" role="search" style="display: none;">
				<div class="input-group add-on">
					<input class="form-control" placeholder="Search" name="s" id="srch-term" type="text">
				<div class="input-group-btn">
					<button class="btn search-submit" type="submit">search</button>
				</div>
				</div>
			</form>
		</ul>
    </div>
	
</nav><!-- #site-navigation -->
<?php if(get_the_ID() == '16406' ){ ?>
	<?php $post   = get_post( 16974 );  ?>
	<div class="marquee-container" onmouseover="this.stop();" onmouseout="this.start();">
	<span class="red-badge">Announcements</span>
	<marquee onmouseover="this.stop();" onmouseout="this.start();" class="header-marquee"><a href="<?php echo get_permalink( $post->ID ); ?>">14th World Congress of Bioethics: Notice for Change of Venue</a>&nbsp;|&nbsp;<a href="http://ijme.in/nbc-20140321/index.php/14th-wcb-india/index/pages/view/call-for-abstract"> Call for Abstracts</a>&nbsp;|&nbsp; <a href="http://ijme.in/nbc-20140321/index.php/14th-wcb-india/index/pages/view/call-for-symposia-workshops">Call for Symposia/Workshops</a>&nbsp;|&nbsp; <a href="http://ijme.in/nbc-20140321/index.php/14th-wcb-india/index/pages/view/call-for-papers">FAB 2018 - Call for Papers</a>&nbsp;|&nbsp; <a href="http://ijme.in/nbc-20140321/index.php/14th-wcb-india/index/pages/view/call-for-pre-congress-events">Call for pre-Congress events</a>&nbsp;|&nbsp; <a href="http://ijme.in/nbc-20140321/index.php/14th-wcb-india/index/pages/view/home-page">Submission timeline extended to April 30,2018 for calls for abstracts and calls for embedded symposia/workshop</a></marquee>
	</div>
<?php } ?>
