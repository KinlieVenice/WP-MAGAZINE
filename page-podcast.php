<?php get_header()?>

<section class="mb-10">
        <div class="container">
          <div class="title-wrapper pt-3 min-h-[90px] lg:min-h-[260px]">
            <h1 class="">Podcast</h1>
          </div>
          <div class="space-y-10 md:mt-4 podcast-grid">

    <?php $podcast = new WP_Query(array (
            'post_type' => 'podcasts',
            'posts_per_page' => 3,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1
        ))
    ?>
    <?php $counter = 1; if($podcast->have_posts()) : while($podcast->have_posts()) : $podcast->the_post()?>
            <div
              class="podcast-griditem grid lg:grid-cols-[.5fr_1fr] gap-10 py-10 border-b border-dark last:border-none"
              >
              <div class="flex items-center gap-10">
                <p class="hidden text-4xl font-generalSemiBold lg:block">0<?php echo $counter++;?></p>

                <div class="relative mb-5 w-[320px] mx-auto">
                  <img
                    src="<?php echo get_field('thumbnail')?>"
                    alt=""
                    class="object-cover h-[320px] w-[320px]"
                  />
                  <h3
                    class="absolute text-4xl text-white uppercase article-header top-3 left-3"
                  >
                    Fyrre <span class="block text-lg">podcast</span>
                  </h3>
                  <p
                    class="absolute text-2xl text-white bottom-3 left-3 font-generalSemiBold"
                  >
                    EP 05
                  </p>
                  <div class="absolute right-3 bottom-3">
                    <svg class="icon-lg" role="image">
                      <use
                        xlink:href="<?php echo get_template_directory_uri()?>/img/sprite.svg#icon-podcast-arrow"
                      ></use>
                    </svg>
                  </div>
                </div>
              </div>
              <div
                class="flex flex-col items-center gap-5 lg:gap-5 lg:flex-row md:justify-center lg:justify-start"
              >
                <h3
                  class="!mb-0 text-center article-header basis-1/3 lg:basis-1/2 md:text-left"
                >
                  <?php the_title() ?>
                </h3>
                <ul
                  class="flex flex-col self-center gap-2 text-center md:self-center sm:flex-row md:gap-10 lg:gap-5 md:items-center"
                >
                  <li
                    class="flex justify-center gap-3 whitespace-nowrap lg:justify-start"
                  >
                    <span class="font-generalSemiBold">Date:</span> <?php echo get_the_date('j, F Y')?>
                  </li>
                  <li
                    class="flex justify-center gap-3 whitespace-nowrap lg:justify-start"
                  >
                    <span class="font-generalSemiBold">Duration:</span> <?php echo get_field('duration')?>
                  </li>
                  <li>
                    <a href="<?php the_permalink()?>" class="link-arrow right"
                      >Listen
                      <svg class="icon-sm" role="image">
                        <use
                          xlink:href="<?php echo get_template_directory_uri()?>/img/sprite.svg#icon-arrow-right"
                        ></use>
                      </svg>
                    </a>
                  </li>
                </ul>
              </div>
            </div>

    <?php endwhile;
    else:
        echo "no blogs";
     endif;
      wp_reset_postdata();
    ?>
                <div class="pagination">
                <?php
                    $big = 999999999; // need an unlikely integer
                    echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $podcast->max_num_pages,
                    'show_all' => true,
                    'prev_next' => True,
                    'prev_text' => __('<svg class="icon-sm" role="image">
                    <use xlink:href="'. get_template_directory_uri() .'/img/sprite.svg#icon-chevron-left"></use>
                  </svg>'),
                    'next_text' => __('<svg class="icon-sm" role="image">
                    <use xlink:href="'. get_template_directory_uri() .'/img/sprite.svg#icon-chevron-right"></use>
                  </svg>'),
                    ));
                ?>
                </div>
          </div>
        </div>
</section>
<?php get_footer()?>