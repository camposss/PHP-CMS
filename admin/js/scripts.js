$(document).ready(function(){
    ClassicEditor
    .create( document.querySelector( '#post_content_body' ) )
    .catch( error => {
        console.error( error );
    } );



    var div_box= "<div id = 'load-screen'><div id='loading'></div></div>"
    $("body").prepend(div_box);
    $("#load-screen").delay(500).fadeOut(600, function(){
        $(this).remove();
    })
});

$('#selectAllBoxes').click(function(event){
    if(this.checked){
        // console.log('we clicked the all click button');
        $('.checkBoxes').each(function(){
            this.checked= true;
        })
    }else{
        $('.checkBoxes').each(function(){
            this.checked= false;
        })
    }
});

