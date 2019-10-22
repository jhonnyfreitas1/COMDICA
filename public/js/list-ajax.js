function starting()
    {
        $(".listAJAX").on('click', function(event)
            {
                event.preventDefault();
    
                if ($(this).hasClass("active")){
                    // console.log("ok");
                    return
                }

                $('a').removeClass('active');
                $(this).addClass('active');
    
                var url =  $(this).attr('url');
                
                getData(url,true);
                return false;
        });
       
            // window.addEventListener('popstate', function(e){
            //     if(e.state)
            //         oldUrl = window.location.pathname.split("/");
            //         oldUrl = "/"+oldUrl[1];
                    
            //         getData(oldUrl,true);
            // });
    }  
function getData(url, state){

    // window.history.pushState({ url:url }, "", url);
    
    $.ajax(
    {
        url: url,
        type: "get",
        datatype: "html"
    }).done(function(data){
        $("#postErickson").empty();
        $("#postErickson").html(data);
        starting();
    
    }).fail(function(jqXHR, ajaxOptions, thrownError){
          alert('No response from server');
    });
}

$(document).ready(function (){
    starting();
})