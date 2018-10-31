<?php
/**
 * Plugin Name:  Tutsplus List Child Pages
 * Plugin URI:   https://github.com/rachelmccollin/tutsplus-list-child-pages
 * Description:  Output a list of children of the current page or a specific page with featured images.
 * Author:       Rachel McCollin
 * Author URI:   https://rachelmccollin.com
 * Version:      1.0
 * Text Domain:  tutsplus
 * License:      GPLv2.0+
 */

/*************************************************************************************************
tutpslus_list_current_child_pages - outputs a list of child pages of the current page
/*************************************************************************************************/

function tutpslus_list_current_child_pages() {
	
	if ( is_page() ) {
						
		global $post;
		
		// define the page they need to be children of
		$parentpage = get_the_ID();
	    
		// define args
		$args = array(
			'parent' => $parentpage,
			'sort_order' => 'ASC',
			'sort_column' => 'menu_order',
		);
		
		$children = get_pages( $args );
		
		if ( $children ) { ?>
		
			<div class="child-page-listing">
				
				<h2><?php _e( 'Learn More', 'tutsplus' ); ?></h2>
			
				<?php //foreach loop to output
				foreach ( $children as $post ) {
					
					setup_postdata( $post ); ?>
					
					<article id="<?php the_ID(); ?>" class="child-listing" <?php post_class(); ?>>
						
						<?php if ( has_post_thumbnail() ) { ?>
						
							<a class="child-post-title" href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
							
							<div class="child-post-image">	
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium' ); ?>
								</a>
							</div>	
					
						<?php }	?>
					
					</article>	
					
				<?php } ?>
				
			</div>
			
		<?php }
			
	}
			
}

/*************************************************************************************************
tutpslus_list_locations_child_pages - outputs a list of child pages of the locations page
/*************************************************************************************************/

function tutpslus_list_locations_child_pages() {
				
	global $post;
	
	// define the page they need to be children of
	$page = get_page_by_path( 'locations', OBJECT, 'page' );
    
    $parentpage = $page->ID;
    
    // define args
	$args = array(
		'parent' => $parentpage,
		'sort_order' => 'ASC',
		'sort_column' => 'menu_order',
	);
	
	//run get_posts
	$children = get_pages( $args );
	
	if ( $children ) { ?>
	
		<div class="child-page-listing">
			
			<h2><?php _e( 'Our Locations', 'tutsplus' ); ?></h2>
		
			<?php //foreach loop to output
			foreach ( $children as $post ) {
				
				setup_postdata( $post ); ?>
				
				<article id="<?php the_ID(); ?>" class="location-listing" <?php post_class(); ?>>
					
					<?php if ( has_post_thumbnail() ) { ?>
					
						<a class="location-title" href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
						
						<div class="location-image">	
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'medium' ); ?>
							</a>
						</div>	
				
					<?php }	?>
				
				</article>	
				
			<?php } ?>
			
		</div>
		
	<?php }
			
}

