
//Loading bar library plugin
(function(e){var t={position:"bottom",height:"5px",col_1:"#159756",col_2:"#da4733",col_3:"#3b78e7",col_4:"#fdba2c",fadeIn:200,fadeOut:200};e.materialPreloader=function(n){var r=e.extend({},t,n);$template="<div id='materialPreloader' class='load-bar' style='height:"+r.height+";display:none;"+r.position+":0px'><div class='load-bar-container'><div class='load-bar-base base1' style='background:"+r.col_1+"'><div class='color red' style='background:"+r.col_2+"'></div><div class='color blue' style='background:"+r.col_3+"'></div><div class='color yellow' style='background:"+r.col_4+"'></div><div class='color green' style='background:"+r.col_1+"'></div></div></div> <div class='load-bar-container'><div class='load-bar-base base2' style='background:"+r.col_1+"'><div class='color red' style='background:"+r.col_2+"'></div><div class='color blue' style='background:"+r.col_3+"'></div><div class='color yellow' style='background:"+r.col_4+"'></div> <div class='color green' style='background:"+r.col_1+"'></div> </div> </div> </div>";e("body").prepend($template);this.on=function(){e("#materialPreloader").fadeIn(r.fadeIn)};this.off=function(){e("#materialPreloader").fadeOut(r.fadeOut)}}})(jQuery)

$(document).ready(function() {

    setTimeout(function() {
        $("button.btn").click(function(e) {
            preloader.on();

            KR.event.handler.listen("fireError", function(data) {
                var errorMessage = data.data.message;
                var errorCode = data.data.code;

                Materialize.toast("Error Code "+errorCode+': '+errorMessage, 2500);
                preloader.off();

            });


        });

    }, 0);


    preloader = new $.materialPreloader({
        position: 'top',
        height: '5px',
        col_1: '#159756',
        col_2: '#da4733',
        col_3: '#3b78e7',
        col_4: '#fdba2c',
        fadeIn: 25,
        fadeOut: 25
    });
});
