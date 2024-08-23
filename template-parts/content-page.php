<?php
$titleSection = get_field('title_section');
$subtitleSection = get_field('subtitle_section');
$descriptionSection = get_field('description_section');
$imageSection = get_field('image_section');
$titleSectionLeft = get_field('title_section_left');
$subtitleSectionLeft = get_field('subtitle_section_left');
$descriptionSectionLeft = get_field('description_section_left');
$imageSectionLeft = get_field('image_section_left');
$ctaSection = get_field('cta_section');
$articlePost = get_field('articles_post');
$blogTitle = get_field('title_section_blog');
$list = get_field('blogs');
$titleNewsletter = get_field('title_newsletter');
$descriptionNewsletter = get_field('description_newsletter');

if (empty($list)) {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC',
    );
} else {
    $args = array(
        'post_type' => 'post',
        'post__in' => $list,
        'orderby' => 'post__in',
        'posts_per_page' => -1,
    );
}

$blog_posts = new WP_Query($args);
?>
    <section class="hero">
        <div class="hero__wrapper">
            <div class="hero__wrapper-info">
                <?php if ($subtitleSection): ?>
                    <span class="hero__wrapper-info-header_title"><?php echo $subtitleSection ?></span>
                <?php endif ?>

                <?php if ($titleSection): ?>
                    <h1 class="hero__wrapper-info-title"><?php echo $titleSection ?></h1>
                <?php endif ?>

                <?php if ($descriptionSection): ?>
                    <p class="hero__wrapper-info-subtitle"><?php echo $descriptionSection ?></p>
                <?php endif ?>
            </div>

            <div class="hero__wrapper-image">
                <?php if ($imageSection): ?>
                    <img src="<?php echo $imageSection ?>" alt="Image section">
                <?php endif ?>
            </div>
        </div>
    </section>
<?php if ($articlePost): ?>
    <section class="features">
        <div class="features__wrapper">
            <?php foreach ($articlePost as $article): ?>
                <?php $icon = get_field('article_icon', $article->ID); ?>
                <div class="features__wrapper-item">
                    <?php if ($icon): ?>
                        <div class="features__wrapper-item-icon">
                            <img src="<?php echo $icon ?>" alt="icon image">
                        </div>
                    <?php endif ?>

                    <?php if ($article->post_title): ?>
                        <h2 class="features__wrapper-item-title"><?php echo $article->post_title; ?></h2>
                    <?php endif ?>

                    <?php if ($article->post_content): ?>
                        <p class="features__wrapper-item-description"><?php echo $article->post_content; ?></p>
                    <?php endif ?>

                    <a class="features__wrapper-item-cta" href="<?php echo get_permalink($article->ID); ?>">Read
                        Article</a>
                </div>
            <?php endforeach ?>
        </div>
    </section>
<?php endif; ?>
<?php if ($blogTitle || $list): ?>
    <section class="blog-list">
        <?php if ($blogTitle): ?>
            <h2 class="blog-list__title"><?php echo $blogTitle ?></h2>
        <?php endif ?>
        <div class="blog-list__wrapper">
            <?php if ($blog_posts->have_posts()) : ?>
                <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                    <div class="blog-list__wrapper-item">
                        <?php $permalink = get_permalink() ?>
                        <?php if (has_post_thumbnail()): ?>
                            <div class="blog-list__wrapper-item-image">
                                <a href="<?php echo $permalink ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="feature_image">
                                </a>
                            </div>
                        <?php endif ?>
                        <div class="blog-list__wrapper-item-info">
                            <?php
                            $title = get_the_title();
                            $description = get_the_content();
                            $category = get_the_category()[0]->name;
                            $date = get_the_date();
                            $comments = get_comments_number();
                            $author_id = get_the_author_meta('ID');
                            $author_name = get_the_author_meta('display_name', $author_id);
                            $author_avatar = get_avatar_url($author_id);
                            ?>

                            <?php if ($category): ?>
                                <span class="blog-list__wrapper-item-info-category">
                                <?php echo $category ?>
                            </span>
                            <?php endif ?>

                            <?php if ($title): ?>
                                <a href="<?php echo $permalink ?>">
                                    <h2 class="blog-list__wrapper-item-info-title"><?php echo $title; ?></h2>
                                </a>
                            <?php endif ?>

                            <div class="blog-list__wrapper-item-info-meta">
                                <?php if ($date): ?>
                                    <div class="blog-list__wrapper-item-info-meta-date">Added:<?php echo $date ?></div>
                                <?php endif ?>

                                <?php if ($comments): ?>
                                    <div class="blog-list__wrapper-item-info-meta-comments">
                                        <img src="<?php echo get_template_directory_uri() . '/assets/icons/comment.svg' ?>"
                                             alt="">
                                        <?php echo $comments ?></div>
                                <?php endif ?>
                            </div>

                            <?php if ($description): ?>
                                <div class="blog-list__wrapper-item-info-excerpt"><?php echo $description; ?></div>
                            <?php endif ?>
                            <div class="blog-list__wrapper-item-info-author">
                                <img src="<?php echo $author_avatar ?>" alt="">
                                <span><?php echo $author_name ?></span>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>No posts found.</p>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

    <section class="about">
        <div class="about__wrapper">
            <?php if ($imageSectionLeft): ?>
                <img src="<?php echo $imageSectionLeft ?>" alt="Image section"
                     class="about__wrapper-image">
            <?php endif ?>

            <div class="about__wrapper-info">
                <?php if ($subtitleSectionLeft): ?>
                    <span class="about__wrapper-info-header">
                    <?php echo $subtitleSectionLeft ?>
                </span>
                <?php endif ?>

                <?php if ($titleSectionLeft): ?>
                    <h2 class="about__wrapper-info-title">
                        <?php echo $titleSectionLeft ?>
                    </h2>
                <?php endif ?>

                <?php if ($descriptionSectionLeft): ?>
                    <p class="about__wrapper-info-description">
                        <?php echo $descriptionSectionLeft ?>
                    </p>
                <?php endif ?>

                <?php if ($ctaSection): ?>
                    <a href="<?php echo $ctaSection['url'] ?>"
                       class="about__wrapper-info-cta"><?php echo $ctaSection['title'] ?></a>
                <?php endif ?>
            </div>
        </div>
    </section>

<?php if ($titleNewsletter || $descriptionNewsletter): ?>

    <div class="newsletter">
        <div class="newsletter__wrapper">
            <?php if($titleNewsletter):?>
                <h2 class="newsletter__wrapper-title">
                    <?php echo $titleNewsletter?>
                </h2>
            <?php endif?>

            <?php if($descriptionNewsletter):?>
                <p class="newsletter__wrapper-subtitle">
                    <?php echo $descriptionNewsletter?>
                </p>
            <?php endif?>

            <div class="newsletter__wrapper-input_wrapper">
                <input type="email" required placeholder="Your Email" class="newsletter__wrapper-input_wrapper-input">
                <a class="newsletter__wrapper-input_wrapper-button" href="#">
                   Subscribe
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
the_content();
?>