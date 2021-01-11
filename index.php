<p>
<?php echo_the_excerpt(); ?>
<a href="<?php the_permalink(); ?> "> Read more&raquo;</a>
</p>
<?php single_post_title(); ?>
<?php
 
get_header();
 
if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>
 
        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
		<?php the_content() ?>
	
	<?php endwhile;
 
else :
	echo '<p>There are no posts!</p>';
 
endif;
 
get_footer();
 
?>

    <nav>
        <ul class="pager">
            <li><?php
					global $wp_query;
					
					$big = 999999999; // need an unlikely integer
					$translated = __( 'Page', 'mytextdomain' ); // Supply translatable string
					
					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages,
							'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
					) );
					?></li><br>
			<li><?php //next_posts_link( 'Previous' ); ?></li>
			<br>
            <li><?php //previous_posts_link( 'Next' ); ?></li>
        </ul>