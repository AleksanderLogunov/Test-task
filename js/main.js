$(document).ready(function (){
    $(".address").suggestions({
        token: "ee7513074795a91fedd389fbbef5aeb3dbc8b824",
        type: "ADDRESS",
        function(suggestion) {
            console.log(suggestion);
        }
    });
});
