<section class="content-line">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <?php if(get_field('text', 'option'))
                    echo '<div class="send-title-and-text send-title-and-text--less-margins">'.get_field("text", "option").'</div>'; ?>
            </div>
            <div class="col-12 col-lg-6">
                <div class="send-block">
                    <?php echo get_field("agree", "option"); ?>
                </div>
            </div>
        </div>
    </div>
</section>