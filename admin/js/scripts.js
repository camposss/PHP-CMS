$(document).ready(function(){
    ClassicEditor
    .create( document.querySelector( '#post_content_body' ) )
    .catch( error => {
        console.error( error );
    } );




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