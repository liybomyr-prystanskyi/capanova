<?php
/**
 * Description: this template for Page Not Found
 */
get_header();?>

<main class="bg-palms bg-palms--adaptive-home">
    <section class="main-404">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 h-auto">
                    <h1> 404 - Seite nicht gefunden ...</h1>
                    <p>Entschuldige bitte, aber wir können die Seite nach der du gesucht hast leider nicht finden.<br />
                        Falls der Fehler bei uns lag, werden wir ihn schnellstens beheben. Versuche es in der Zwischenzeit über eine der folgenden Optionen:</p>
                    <div class="mt-5">
                        <a href="<?php echo get_home_url(); ?>" class="btn btn--default">Zur Startseite</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
