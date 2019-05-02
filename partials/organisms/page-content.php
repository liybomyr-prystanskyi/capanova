<section class="content-line content-line--first">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php $the_content = get_the_content();
                if(!empty($the_content)): ?>
                    <div class="title-and-text list-info">
                        <?php the_content(); ?>
                    </div>
                <?php  endif; ?>
            </div>
            <div class="devider"></div>
        </div>
    </div>
</section>