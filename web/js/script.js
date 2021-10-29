$(function(){
    'use strict';

    $("#myModal").on("show.bs.modal", function(e) {
        if(e.relatedTarget)//при нажатии на ссылку
        {
            var link = $(e.relatedTarget);
            $(this).find(".modal-content").load(link.attr("href"));
        }
    });

    $("#myModal").on("hidden.bs.modal", function(){
        $(this).find(".modal-content").html("");
    });

});