<?php if(get_field('field_das_spricht') or get_field('field_das_spricht')) { ?>
    <section class="content-line">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-tabs">
                        <nav>
                            <div class="main-tabs__block nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="main-tabs__block__btn  nav-item nav-link active" id="nav-first-tab"
                                       data-toggle="tab" href="#nav-first" role="tab" aria-controls="nav-first-tab"
                                       aria-selected="false"><?php _e('Anwendung','capanova'); ?></a>
                                <?php if(get_field('field_das_spricht')) { ?>
                                <a class="main-tabs__block__btn  nav-item nav-link" id="nav-home-tab"
                                   data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
                                   aria-selected="true"><?php _e('Das spricht für','capanova'); ?> <?php the_title(); ?></a>
                                <?php } ?>
                                <?php if(get_field('field_inhaltsstoffe')) { ?>
                                <a class="main-tabs__block__btn  nav-item nav-link" id="nav-profile-tab"
                                   data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile"
                                   aria-selected="false"><?php _e('Inhaltsstoffe','capanova'); ?></a>
                                <?php } ?>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-first" role="tabpanel" aria-labelledby="nav-first">
                                <div class="row">
                                    <div class="col-12 specifics-list">
                                        <?php the_field('field_anwendung'); ?>
                                    </div>
                                </div>
                            </div>
                            <?php if(get_field('field_das_spricht')) { ?>
                                <div class="tab-pane fade" id="nav-home" role="tabpanel"
                                     aria-labelledby="nav-home-tab">
                                    <div class="row">
                                        <div class="col-12 col-lg-12">
                                            <div class="specifics-list">
                                                <?php the_field('field_das_spricht'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if(get_field('field_inhaltsstoffe')) { ?>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                     aria-labelledby="nav-profile-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="specifics-list">
                                                <?php the_field('field_inhaltsstoffe'); ?>
                                            </div>
<!--                                            <div class="ingredients-block">-->
<!--                                                <a href="--><?php //echo get_page_link(38); ?><!--" class="btn btn--default">--><?php //_e('Zurück zur Übersicht','capanova'); ?><!--</a>-->
<!--                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="devider"></div>
        </div>
    </section>
<?php } ?>