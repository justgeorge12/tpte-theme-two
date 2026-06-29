<?php
/**
 * Template part: a single announcement row on the archive.
 *
 * Thumbnail-less list row: date, title (links straight to the PDF), an optional short
 * description (native excerpt) and a download button. The PDF comes from the
 * _announcement_pdf_id meta; if none is attached the button is omitted.
 *
 * @package tpte
 */

$pdf_id  = (int) get_post_meta( get_the_ID(), '_announcement_pdf_id', true );
$pdf_url = $pdf_id ? wp_get_attachment_url( $pdf_id ) : '';
$link    = $pdf_url ? $pdf_url : get_permalink();
?>
<div class="tp-postbox-item tp-announcement-item p-relative mb-30">
	<div class="tp-postbox-content">
		<div class="tp-blog-stories-tag-wrap d-flex">
			<span><?php echo esc_html( get_the_date( 'd F, Y' ) ); ?></span>
		</div>
		<h3 class="tp-postbox-item-list-title">
			<a href="<?php echo esc_url( $link ); ?>"<?php echo $pdf_url ? ' target="_blank" rel="noopener"' : ''; ?>><?php the_title(); ?></a>
		</h3>
		<?php if ( has_excerpt() ) : ?>
			<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 30, ' [...]' ) ); ?></p>
		<?php endif; ?>
		<?php if ( $pdf_url ) : ?>
<!--			<div class="tp-announcement-download">-->
<!--				<a class="tp-btn" href="--><?php //echo esc_url( $pdf_url ); ?><!--" download target="_blank" rel="noopener">-->
<!--					<i class="fa-solid fa-file-pdf"></i> --><?php //esc_html_e( 'Λήψη PDF', 'tpte' ); ?>
<!--				</a>-->
<!--			</div>-->
		<?php endif; ?>
	</div>
</div>
