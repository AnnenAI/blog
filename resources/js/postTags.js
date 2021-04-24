$(document).ready(function(){
  $("#searchTag").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    var $filtered = $("#allTags > button").filter(function() {
      $(this).toggle( $(this).text().toLowerCase().indexOf(value) > -1 );
    });
    let hasMatches=$('#hasMatches').length;
    if($("#allTags").children("button:visible").length == 0 && !hasMatches) {
      $('#allTags').append('<p name="hasMatches" id="hasMatches">Does not exists? Create new!</p>');
    } else if($("#allTags").children("button:visible").length != 0){
      $("#hasMatches").remove();
    }
  });
});

$(document).ready(function() {
    $(document).on('click','.btn-warning, .btn-info',function(event) {
        let tag_id=event.target.id;
        let tag_name=event.target.name;
        let div=$(`[name=${tag_name}]`).parent().attr('id');
        event.target.remove();
        if( div=='allTags')
          $('#selectedTags').append(
            `<button class="btn btn-warning mb-1 mt-1 mr-1 p-1" type="button" name="${tag_name}" id="${tag_id}">
              #${tag_name}
            </button>`);
        else
          $('#allTags').append(
            `<button class="btn btn-info mb-1 mt-1 mr-1 p-1" type="button" name="${tag_name}" id="${tag_id}">
              #${tag_name}
            </button>`);
    });
});

$(document).ready(function() {
  $('#addPostForm').submit(function(){
    let tags=document.querySelectorAll('#selectedTags > button')
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
        let tag=$('#searchTag').val()
        if(tag){
          addTag(tag)
        }
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
                        `<button class="btn btn-warning mb-1 mt-1 mr-1 p-1" type="button"
                          name="${response.tag.name}" id="${response.tag.id}">
                          #${response.tag.name}</button>`
                      );
                      $("#searchTag").val('').keyup().focus();

                  }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            });
      }
});
