jQuery(document).ready(function(){
    sliderBlockInit();

    if (window.acf) {
        window.acf.addAction('render_block_preview/type=slider', acfRenderSliderBlock )
    }
});

function acfRenderSliderBlock(block) {
    let el = block.find('.slick-slider')[0];
    if (!el) return;
    // Because React will reuse DOM elements where possible, the previously initialised slider might still be active, check for that before init to prevent errors.
    if (el.slick) {
        jQuery(el).slick('unslick');
    }
    jQuery(el).slick({
        dots: true
    });
}

function sliderBlockInit() {
    // This handles the slider on the front end.
    jQuery('.slick-slider').slick({
        dots: true
    });
}