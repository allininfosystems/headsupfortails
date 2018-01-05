/**
 * Copyright © 2015. All rights reserved.
 */

define([
    'jquery',
    'featuredOwlCarousel'
], function($){
    "use strict";

    $.widget('TemplateMonster.featuredCarousel', {


        options: {
            margin: 0,
            nav:true,
            navText: [],
            dots: false,
            autoplay: false,
            responsive : {
                0 : {
                    items: 1
                },
                450 : {
                    items: 2
                },
                600 : {
                    items: 2
                },
                767 : {
                    items: 3
                },
                979 : {
                    items: 4
                },
                1199 : {
                    items: 5
                },
                1399 : {
                    items: 4
                }
            },
            inSidebar: false,
            sidebarOptions: {
                0 : { items: 1},
                450 : { items: 1},
                600 : { items: 1},
                767 : { items: 1},
                979 : { items: 1},
                1199 : { items: 1}
            },
            prevCssClass: '',
            nextCssClass: '',
            defaultPrevCssClass: 'fa-angle-left',
            defaultNextCssClass: 'fa-angle-right'
        },

        _create: function() {
            var self = this;
            this.options.navigation = Boolean(this.options.navigation);
            this.options.pagination = Boolean(this.options.pagination);

            var onInitialized = {
                onInitialized: function () {
                    $('.owl-prev', self.element).addClass(this.options.defaultPrevCssClass+' '+this.options.prevCssClass);
                    $('.owl-next', self.element).addClass(this.options.defaultNextCssClass+' '+this.options.nextCssClass);
                    $('.owl-item.active', self.element).first().addClass('product-border-left-none');
                    $('.owl-item.active', self.element).last().addClass('product-border-right-none');
                }
            };

            var onTranslated = {
                onTranslated: function () {
                    $('.owl-item', self.element).removeClass('product-border-left-none');
                    $('.owl-item.active', self.element).first().addClass('product-border-left-none');
                    $('.owl-item', self.element).removeClass('product-border-right-none');
                    $('.owl-item.active', self.element).last().addClass('product-border-right-none');
                }
            };

            if(this.options.inSidebar) {
                this.options.responsive = $.extend(this.options.responsive, this.options.sidebarOptions)
            }

            var options = $.extend(this.options, onInitialized);
            options = $.extend(options, onTranslated);

            this.element.owlCarousel(options);

        },

        
    });

    return $.TemplateMonster.featuredCarousel;

});
