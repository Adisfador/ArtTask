
// Ajax func
function analitic(url, $this) {
    $.ajax({
        url: url,
        type: "get",

    })
        .done(function (data) {
            $this.html(data);
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            alert("server not responding")
        })
}

// Ajax use

// like
$("[data-tag]").on("click", function (event) {
    event.preventDefault();
    var $this = $(this),
        blockId = $(this).data('tag'),
        url = "/likes?id=" + blockId;
    analitic(url, $('[data-tag="' + blockId + '"] .likes'));
    $this.toggleClass("tag-active");

});

// view
function views() {
    var blockId = $("[data-views]").data('views'),
        url = "/views?id=" + blockId;
    analitic(url, $('[data-views="' + blockId + '"] .views'));
}
if ($("[data-views]").length) {
    setTimeout(views, 5000);
}


// comments
$("#btn").on("click", function (event) {
    event.preventDefault();
        var theme=$("#theme").val(),
        text=$("#text").val(),
        id=$("#id").val(),
        slug=$("#slug").val(),
        url = "/comments?theme=" + theme+"&text="+text+"&slug="+slug+"&article_id="+id;
        analitic(url, $('#form'));

});

// form
$('#btn').prop('disabled', true);
$('#text').on('keyup', function () {
	if ($.trim($('#theme').val()).length > 2 && $.trim(($('textarea').val())).length > 3) {
		$('#btn').prop('disabled', false);
	}
	else {
		$('#btn').prop('disabled', true);
	}
});

// footer
var contactsH = $("#footer").offset().top,
  scrollOffset = $(window).height(),
  footerheight = $("#footer").height();

if (scrollOffset > contactsH + footerheight) {
  $("#footer").toggleClass("footer-down");
}
