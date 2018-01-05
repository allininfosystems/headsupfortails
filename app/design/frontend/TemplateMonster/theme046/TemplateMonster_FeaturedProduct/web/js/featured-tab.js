/**
 * Copyright © 2015. All rights reserved.
 */

define([
    'jquery',
    'matchMedia',
    'tabs'
], function($, mediaCheck){
    "use strict";

    $.widget('TemplateMonster.featuredTab', $.mage.tabs, {


        options: {
            mobile: {
                "openedState": "active",
                "collapsible": true,
                "animate": 200,
                "active": 0,
            },
            desktop: {
                "openedState": "active",
                "collapsible": false,
                "animate": false,
                "active": 0
            },
        },
        tabsBlock: false,

        _create: function() {
            var self = this;
            mediaCheck({
                media: '(max-width: 767px)',
                entry: function () {
                    self._destroyTab();
                    self._createTab('mobile');
                },
                exit: function () {
                    self._destroyTab();
                    self._createTab('desktop');
                }
            });
        },

        _createTab: function (device) {
            var self = this;
            var isGallery =  $('.gallery-placeholder', self.element);

            if(isGallery.length) {
                isGallery.last().on('fotorama:ready', function () {
                    self._initTab(device);
                });
            } else {
                self._initTab(device);
            }

        },

        _initTab: function (device) {
            this.tabsBlock = this.element.tabs(this.options[device]);
        },

        _destroyTab: function () {
            if(this.tabsBlock) {
                this.tabsBlock.tabs("destroy");
                $('[data-role="content"]', this.element).show();
            }
        }
        
    });

    return $.TemplateMonster.featuredTab;

});
