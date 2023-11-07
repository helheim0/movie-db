<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shape
 * @since Shape 1.0
 */
 
get_header();


if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- Start the pagination functions before the loop. -->
    <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
    <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
    <!-- End the pagination functions before the loop. -->

  <!-- Verificăm dacă postarea este în categoria 3. -->
  <!-- Dacă da, div-ul va primi clasa CSS "post-cat-three". -->
  <!-- În caz contrar, div-ul va primi clasa "post". -->

  <?php if ( in_category( '3' ) ) : ?>
  <div class="post-cat-three">
  <?php else : ?>
  <div class="post">
  <?php endif; ?>


  <!-- Afișăm Titlul postării sub formă de link spre pagina postării. -->
 <!-- Permalink este link-ul spre postare, funcția îl determină automat. -->

  <h2>
 <a 
 href="<?php the_permalink(); ?>" 
 rel="bookmark" 
 title="Permanent Link to <?php the_title_attribute(); ?>"
 >
 <?php the_title(); ?>
 </a>
 </h2>


  <!-- Afișăm data (November 16th, 2009 format) -->
  <!-- și link spre alte postări ale autorului. -->

  <small><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></small>


  <!-- Afișăm conținutul (textul) postării într-un div. -->

  <div class="entry">
  <?php the_content(); ?>
  </div>


  <!-- Afișăm categoriile din care face parte postarea, separate prin virgulă. -->

  <p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
  </div> <!-- închidem primul div (cel din IF-ul pentru categoria 3) -->


  <!-- Oprim Loop-ul (dar mai avem și un "else:" mai jos). -->

<?php endwhile; else : ?>


  <!-- Primul "if" a verificat dacă există postări pentru a fi afișate. -->
  <!-- Acest "else" indică ce să se afișeze dacă nu a fost găsită nici-o postare. -->
  <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>


<!-- Aici CHIAR oprim Loop-ul. -->
<?php endif; 

get_sidebar();
get_footer(); ?>