<?php
/**
 * The post list.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

$url = get_permalink( get_option( 'page_for_posts' ) );
?>
<div class="breadcrumb--wrapper">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb--item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
				<a class="breadcrumb--link" href="<?php echo esc_url( $url ); ?>" itemprop="url">
					<span itemprop="title">Blog</span>
				</a>
			</li>
			<?php if ( is_search() ) : ?>
			<li class="breadcrumb--item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
				<a class="breadcrumb--link" href="<?php echo esc_url( get_search_link( get_search_query() ) ); ?>" itemprop="url">
					<span itemprop="title"><?php echo esc_html( sprintf( __( 'Search Results for &#8220;%s&#8221;', 'elemarjr' ), get_search_query() ) ); ?></span>
				</a>
			</li>
				<?php
				elseif ( is_archive() ) :
					$title = get_the_archive_title();

					if ( is_category() ) :
						$url   = get_category_link( get_query_var( 'category_name' ) );
						$title = single_cat_title( '', false );
					elseif ( is_tag() ) :
						$url = get_tag_link( get_query_var( 'tag' ) );
					endif;
					?>
			<li class="breadcrumb--item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
				<a class="breadcrumb--link" href="<?php echo esc_url( $url ); ?>" itemprop="url">
					<span itemprop="title"><?php echo wp_kses_post( $title ); ?></span>
				</a>
			</li>
					<?php
				elseif ( is_single() ) :
					$categories = get_the_category();

					if ( $categories ) :
						$category = $categories[0];
						$url      = get_category_link( $category );
						?>
			<li class="breadcrumb--item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
				<a class="breadcrumb--link" href="<?php echo esc_url( $url ); ?>" itemprop="url">
					<span itemprop="title"><?php echo esc_html( $category->name ); ?></span>
				</a>
			</li>
			<?php endif; ?>
			<li class="breadcrumb--item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
				<a class="breadcrumb--link" href="<?php echo esc_url( get_permalink() ); ?>" itemprop="url">
					<span itemprop="title"><?php echo esc_html( get_the_title() ); ?></span>
				</a>
			</li>
			<?php endif; ?>
			<?php
			$paged = get_query_var( 'paged' );

			if ( $paged ) :
				$paged_url = add_query_arg( 'paged', $paged, $url );
				?>
			<li class="breadcrumb--item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
				<a class="breadcrumb--link" href="<?php echo esc_url( $paged_url ); ?>" itemprop="url">
					<span itemprop="title"><?php echo esc_html( sprintf( __( 'Page %s' ), $paged ) ); ?></span>
				</a>
			</li>
			<?php endif; ?>
		</ol>
	</div>
</div>
