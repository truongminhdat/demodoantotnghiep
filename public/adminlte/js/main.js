function  actionDelete(event){
  event.preventDefault();
  alert('Clicked')
}
$(function (){
  $(document).on('click','. action_delete',actionDelete);
});
