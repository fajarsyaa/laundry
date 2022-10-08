(function ($) {
    'use strict';
    $(document).ready(function () {
        $('.datatable').DataTable({
            //DataTable Options
        });
        
        
        $('.datatable-height').DataTable({
            scrollY:        '50vh',
            scrollCollapse: true,
            paging:         false
        });
        $('.datatable-multi').DataTable({
            //DataTable Options
        });
        $('.datatable-multi tbody').on( 'click', 'tr', function () {
            $(this).toggleClass('bg-gray-400');
        } );


        
    });

})(window.jQuery);