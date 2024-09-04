<?php get_header()?>

<section>
      <div class="container">
        <div class="flex items-center justify-between my-5">
          <a
            href="<?php echo site_url('/author')?>"
            class="flex items-center gap-2 mb-5 uppercase hover:underline group md:mb-0 font-generalSemiBold"
          >
            <div
              class="transition-all -translate-x-1 opacity-0 group-hover:opacity-100 group-hover:translate-x-0"
            >
              <svg class="icon-sm" role="image">
                <use xlink:href="./img/sprite.svg#icon-arrow-left"></use>
              </svg>
            </div>
            <span
              class="transition-transform -translate-x-7 group-hover:translate-x-0"
              >Go Back</span
            >
          </a>

          <h4>AUTHOR</h4>
        </div>
      </div>
</section>

<article class="single">
      <div class="container">
        <div class="single-wrapper max-w-[850px] mx-auto w-full">
          <div class="grid md:grid-cols-[300px_1fr] gap-20 my-20">
            <aside>
              <div class="img-wrap">
                <img
                  src="<?php echo get_field('thumbnail')['url']?>"
                  alt=""
                  class="size-[210px] object-cover rounded-full mx-auto"
                />

                <div
                  class="flex justify-between pt-10 mt-10 border-t border-dark"
                >
                  <h4>Follow</h4>
                  <ul class="flex gap-3">
                    <li>
                      <a href="<?php echo get_field('twitter')?>">
                        <svg class="icon-sm" role="image">
                          <use xlink:href="<?php echo get_template_directory_uri()?>/img/sprite.svg#icon-twitter"></use>
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo get_field('youtube')?>">
                        <svg class="icon-sm" role="image">
                          <use xlink:href="<?php echo get_template_directory_uri()?>/img/sprite.svg#icon-youtube"></use>
                        </svg>
                      </a>
                    </li>

                    <li>
                      <a href="<?php echo get_field('instagram')?>">
                        <svg class="icon-sm" role="image">
                          <use
                            xlink:href="<?php echo get_template_directory_uri()?>/img/sprite.svg#icon-instagram"
                          ></use>
                        </svg>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </aside>
            <main>
              <h2 class="mb-10 article-header">
                <?php the_title()?>
              </h2>
              <?php the_content()?>
            </main>
          </div>
        </div>
      </div>
</article>

<section class="mb-20 latest">
      <div class="container">
        <div class="py-10 pb-20 border-t border-dark">
          <h2 class="uppercase">Articles By <?php the_title()?></h2>
        </div>

        <div class="grid overflow-hidden border md:grid-cols-2 border-dark">
          
            <?php $magazines = get_field('magazines')?>   
            <?php if($magazines) : ?>
                <?php foreach($magazines as $magazine) : setup_postdata( $magazine );
                
                $thumbnail = get_field('thumbnail' , $magazine->ID);
                $title = get_the_title($magazine->ID);
                $duration = get_field('duration' , $magazine->ID);
                $date = get_the_date('j, F Y' , $magazine->ID)
                ?>
        <div class="p-10 grid-item">
            <div class="relative flex flex-col gap-10 mb-5 md:flex-row">
              <img
                src="<?php echo $thumbnail?>"
                alt=""
                class="object-cover w-[150px] h-[150px] mx-auto md:mr-auto"
                width="150px"
                height="150px"
              />
              <div>
                <h4><?php echo $title ?></h4>
                <div class="items-center justify-between md:flex">
                  <ul class="items-center gap-8 mb-5 md:mb-0 md:flex">
                    <li>
                      <span class="font-generalSemiBold">Date:</span> <?php echo $date ?>
                    </li>
                    <li>
                      <span class="font-generalSemiBold">Read:</span> <?php echo $duration ?>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
              <?php endforeach;
            endif; ?>
        </div>
      

      </div>
</section>

<?php get_footer()?>