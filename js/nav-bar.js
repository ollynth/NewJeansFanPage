$(function(){
    var url = window.location.href; 

    $("#sub-header a").each(function() {
        if(url == (this.href)) { 
            $(this).closest("li").addClass("active");
        }
    });
});