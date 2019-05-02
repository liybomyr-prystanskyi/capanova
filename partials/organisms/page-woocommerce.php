<section class="content-line content-line--first">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php $the_content = get_the_content();
                if(!empty($the_content)): ?>
                    <?php the_content(); ?>
                <?php  endif; ?>
            </div>
            <div class="devider"></div>
        </div>
    </div>
</section>