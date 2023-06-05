jQuery(document).ready(function(){
    sliderBlockInit();

    if (window.acf) {
        window.acf.addAction('render_block_preview/type=slider', acfRenderSliderBlock )
    }
});

function acfRenderSliderBlock(block) {
    console.log("Firing slider");
    let el = block.find('.slick-slider')[0];
    console.log(el);
    if (!el) return;
    console.log("Checking for reuse");
    // Because React will reuse DOM elements where possible, the previously initialised slider might still be active, check for that before init to prevent errors.
    if (el.slick) {
        console.log("unslicking");
        jQuery(el).slick('unslick');
    }
    console.log("initing slick");
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