(function ($) {
"use strict";
 
    var UnikPostLayoutGlobal = function ($scope, $) {

        $scope.find('body').each(function () {

            var settings = $(this).data('unikpostlayout');

            $('[data-background]').each(function() {
                $(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
            });

        });

    };


    $(window).on('elementor/frontend/init', function () {

        if (elementorFrontend.isEditMode()) {

            elementorFrontend.hooks.addAction('frontend/element_ready/global', UnikPostLayoutGlobal);

        }
        else {

            elementorFrontend.hooks.addAction('frontend/element_ready/global', UnikPostLayoutGlobal);

        }
    });

console.log('Main Js loaded')
})(jQuery);
