 
 ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );


$(document).ready(function(){
$('#checkallboxes').click(function(event){
  if(this.checked){
  	$('.checkboxes').each(function(){
  		this.checked = true;
  	})
  }else{
  	$('.checkboxes').each(function(){
  		this.checked = false;
  	})
  }
});



});