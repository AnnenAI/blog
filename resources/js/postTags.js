$(document).ready(function(){
  $("#searchTag").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#allTags *").filter(function() {
      $(this).toggle( $(this).text().toLowerCase().indexOf(value) > -1 );
    });
  });
});

$(document).ready(function() {
    $(document).on('click','a',function(event) {
        let tag_id=event.target.id;
        let tag_name=event.target.name;
        let div=$(`[name=${tag_name}]`).parent().attr('id');
        event.target.remove();
        if( div=='allTags')
          $('#selectedTags').append(`<a href="#" name="${tag_name}" id="${tag_id}"> #${tag_name}</a>`);
        else
          $('#allTags').append(`<a href="#" name="${tag_name}" id="${tag_id}"> #${tag_name}</a>`);
    });
});

$(document).ready(function() {
  $('#addPostForm').submit(function(){
    let tags=document.querySelectorAll('#selectedTags > a')
    $.each(tags, function(i,tag){
        $('<input />').attr('type', 'hidden')
          .attr('name', 'tag_id[]')
          .attr('value', tag.id)
          .appendTo('#addPostForm');
      });
      return true;
  });
});
