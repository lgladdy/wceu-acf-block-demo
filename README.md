# WordCamp Europe ACF Blocks Demo Slider Block

This is a demo ACF block as a plugin which contains it's own fields and utilises the ACF JS API to initialise a third party jQuery library.

### Folder Structure

- /assets/*
    - This contains the block specific js and css files, along with the the `.asset.php` file which contains the dependencies and version data for the JS file, as defined by [WPDefinedAsset](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#wpdefinedasset).
    - Our `slider.js` file hooks into the `render_block_preview/type=slider` ACF JS action to ensure we initialise the slick library correctly at the right time - we also handle destroying and reinitialising slick whenever the slide content changes in the admin.
- /fields/*
    - This contains one file containing our field definitions. This is based on a field group exported from ACF's admin pages, but with the location rules removed as we add them to ensure they apply to this block in the `acf-slider-block.php` file in the root.
- /slick/*
    - This is the third party slick library from [Ken Wheeler](https://github.com/kenwheeler/slick).
- /acf-slider-block.php
    - This is the core plugin file which registers our block, and adds the hook to `acf/include_fields` to load our field JSON. This also registers `slick` as a script, so we can reference it as a dependency in our `assets/slider.js` file (via `assets/slider.asset.php`).
- /block.json
    - This is the core block.json file which contains the block definition, ACF specific options, and supported features.
    - As this block uses a third party library, and doesn't support `<InnerBlocks />` we also disable JSX support to bring better compatibility with slick's reinitialisation.
- /slider-template.php
    - This is the PHP template which renders the fields and all associated HTML on both the admin and front-end. A specific `$is_preview` switch ensures we only output our debug text in the admin views.