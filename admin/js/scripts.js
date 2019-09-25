 
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


// loader for admin panel

// var loader = "<div id='load-screen'><div id='loading'></div></div>";
// $('#body').append(loader);
// $('#load-screen').delay(700).fadeOut(600, function(){
//   $(this).remove();
// });






});