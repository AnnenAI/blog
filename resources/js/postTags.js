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


$(document).ready(function(){

    $('#inputedTagCheck').click(function(){
        addTag($('#searchTag').val())
    });

    function addTag(tag){
        let _token = $('meta[name="csrf-token"]').attr('content');
        let url=$('a[name="url"]').attr('href');
        $.ajax({
            "url":url,
            "dataType":"JSON",
            "type":"POST",
            "data":{
                "_method":"POST",
                "_token": _token,
                "tag":tag
            }
          })
            .done(function (response) {
                  if (response.exists){
                      $('#selectedTags').append(
                        `<a href="#" name="${response.tag.name}" id="${response.tag.id}">
                         #${response.tag.name}
                         </a>`
                      );
                  }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            });
      }
});
