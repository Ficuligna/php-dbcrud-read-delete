function handle(ref){
  var target = $(ref).html();
  var template = Handlebars.compile(target);
  return template;
}

function get_paganti(){
  $.ajax({
    url: "get_paganti.php",
    method: "GET",
    success: function(data){
      for (var row of data) {
        $(".container_paganti").append(handle("#pagante-template")(row));
      }
    },error: function(err){
      console.log(err);
    }
  })
}

function delete_paganti(){
$(".container_paganti").on("click",".delete",function(){
  var idparent = $(this).parent();
  $.ajax({
    url: "delete_paganti.php",
    data: {
      id: idparent.data().id
    },
    method: "POST",
    success: function(){
      idparent.remove();
    },error: function(er){
      console.log(er);
    }
  })
})
}
function init(){
  get_paganti()
  delete_paganti()
}
$(document).ready(init);
