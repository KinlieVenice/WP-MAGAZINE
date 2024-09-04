<?php get_header()?>

<section>
      <div class="container">
        <div class="flex items-center justify-between my-5">
          <a
            href="<?php echo site_url('/podcast')?>"
            class="flex items-center gap-2 mb-5 uppercase hover:underline group md:mb-0 font-generalSemiBold"
          >
            <div
              class="transition-all -translate-x-1 opacity-0 group-hover:opacity-100 group-hover:translate-x-0"
            >
              <svg class="icon-sm" role="image">
                <use xlink:href="<?php echo get_template_directory_uri()?>/img/sprite.svg#icon-arrow-left"></use>
              </svg>
            </div>
            <span
              class="transition-transform -translate-x-[1.6rem] group-hover:translate-x-0"
              >Go Back</span
            >
          </a>

          <h4>PODCAST</h4>
        </div>
      </div>
</section>

<article class="single-article">
      <div class="single-wrapper max-w-[1000px] mx-auto w-full">
        <div class="grid grid-cols-[300px_1fr] gap-20 my-20">
          <aside>
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
                class="absolute mb-0 text-white te1t-2xl bottom-2 left-3 font-generalSemiBold"
              >
                <?php the_field('episode')?>
              </p>
              <div class="absolute right-3 bottom-3">
                <svg class="icon-lg" role="image">
                  <use xlink:href="<?php echo get_template_directory_uri()?>img/sprite.svg#icon-podcast-arrow"></use>
                </svg>
              </div>
            </div>
            <div
              class="flex items-center justify-between pb-10 my-10 border-b border-dark"
            >
              <h5 class="mb-0">Listen On</h5>
              <ul class="flex gap-4">
                <li>
                  <a href="<?php the_field('spotify')?>">
                    <svg class="icon-sm" role="image">
                      <use xlink:href="<?php echo get_template_directory_uri()?>/img/sprite.svg#icon-spotify"></use>
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="<?php the_field('twitter')?>">
                    <svg class="icon-sm" role="image">
                      <use xlink:href="<?php echo get_template_directory_uri()?>/img/sprite.svg#icon-twitter"></use>
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="<?php the_field('instagram')?>"
                    ><svg class="icon-sm" role="image">
                      <use xlink:href="<?php echo get_template_directory_uri()?>/img/sprite.svg#icon-instagram"></use>
                    </svg>
                  </a>
                </li>
              </ul>
            </div>

            <ul class="flex justify-between mb-2">
              <li class="font-generalSemiBold">Date:</li>
              <li><?php echo get_the_date('j, F Y')?></li>
            </ul>

            <ul class="flex justify-between mb-2">
              <li class="font-generalSemiBold">Read:</li>
              <li><?php echo get_field('duration')?></li>
            </ul>
          </aside>
          <main>
            <h2 class="!text-header !leading-[1] !uppercase">
              <?php the_title() ?>
            </h2>
            <?php the_content()?>
          </main>
        </div>
      </div>
</article>

<section class="mb-20 latest">
      <div class="container">
        <div
          class="flex items-center justify-between py-10 pb-20 border-t border-dark"
        >
          <h2 class="uppercase">Latest Episodes</h2>
          <a href="<?php echo site_url('/podcast')?>" class="link-arrow right"
            >All Episodes
            <svg class="icon-sm" role="image">
              <use xlink:href="<?php echo get_template_directory_uri()?>/img/sprite.svg#icon-arrow-right"></use>
            </svg>
          </a>
        </div>

        <div class="grid overflow-hidden border md:grid-cols-3 border-dark">
                <?php $podcast = new WP_Query(array  (
                    'post_type' => 'podcasts',
                    'posts_per_page' => 3,
                    'post__not_in' => array (get_the_ID()),
                    'orderby' => 'rand'
                ))?>  
                <?php if($podcast->have_posts()) : while($podcast->have_posts()) : $podcast->the_post()?>
            <div class="p-10 grid-item">
                <div class="relative mb-5">
                <img
                    src="<?php echo get_field('thumbnail')?>"
                    alt=""
                    class="object-cover w-full h-full"
                />
                <h3 class="absolute text-4xl text-white uppercase top-10 left-10">
                    Fyrre <span class="block text-lg">podcast</span>
                </h3>
                <p
                    class="absolute text-2xl text-white bottom-10 left-10 font-generalSemiBold"
                >
                    <?php the_field('episode')?>
                </p>
                <div class="absolute right-10 bottom-10">
                    <svg class="icon-lg" role="image">
                    <use xlink:href="<?php echo get_template_directory_uri()?>/img/sprite.svg#icon-podcast-arrow"></use>
                    </svg>
                </div>
                </div>

                <h3 class="article-header">
                <?php the_title() ?>
                </h3>

                <div class="items-center justify-between md:flex">
                <ul class="items-center gap-8 mb-5 md:mb-0 md:flex">
                    <li>
                    <span class="font-generalSemiBold">Date:</span> <?php echo get_the_date('j, F Y')?>
                    </li>
                    <li>
                    <span class="font-generalSemiBold">Duration:</span> <?php echo get_field('duration')?>
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
            </div>
      </div>
</section>



<?php get_footer()?>